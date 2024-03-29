<?php

namespace App\Models;

use App\Utils\models\model;

class Movies extends model
{
    protected $id;
    protected $title;
    protected $description;
    protected $image;
    protected $trailer;
    protected $category;
    protected $length;
    protected $userID;


    /**
     * Método responsável por retornar os filmes adicionados recentemente.
     *
     * @return array
     */
    public function retrieveAllMovies()
    {
        try {
            $query = 'SELECT * 
            FROM movies
            ORDER BY id desc';

            $stmt = $this->db->query($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    public function search()
    {
        try {
            $query = 'SELECT *
                      FROM movies
                      WHERE title LIKE :title';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':title', '%' . $this->title . '%');
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    /**
     * Método responsável por verificar se o id enviado por get existe ou não.
     *
     * @return boolean
     */
    public function checkIfMovieExists()
    {
        try {
            $query = 'SELECT *
                      FROM movies
                      WHERE id = :id';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                return false;
                exit;
            } else {
                return true;
                exit;
            }
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    /**
     * Método responsável por retornar os dados de um único filme.
     *
     * @return array
     */
    public function recoverMovie()
    {
        try {
            $query = 'SELECT *
                      FROM movies
                      WHERE id = :id';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    /**
     * Método responsável por retornar todos os filmes que o usuário já registrou.
     *
     * @param int $userID
     * @return array
     */
    public function recoverUserMovies($userID)
    {
        try {
            $query = 'SELECT *
                      FROM movies
                      WHERE id_user = :id_user
                      ORDER BY id DESC';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_user', $userID);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    /**
     * Método responsável por verificar os dados antes de fazer o registro de um novo filme.
     *
     * @param int $hours
     * @param int $minute
     * @param array $files
     * @return array
     */
    public function checkMovieRegistrationData($hours, $minute, $files): array
    {
        $msgError = [];
        $query  = 'SELECT *
                   FROM movies
                   WHERE title = :registredMovie';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':registredMovie', $this->title);
        $stmt->execute();

        if (count($stmt->fetchAll()) > 0) {
            $msgError[] = 'Este filme já foi registrado';
        }
        if (!$this->title) {
            $msgError[] = 'Insira um título.';
        }
        if (!$this->description) {
            $msgError[] = 'Insira uma descrição a este filme.';
        }
        if (empty($hours) && empty($minute)) {
            $msgError[] = 'Insira a duração do filme.';
        }
        if (!$this->category || $this->category == 'Selecione uma categoria') {
            $msgError[] = 'Selecione uma categoria.';
        }

        //Check trailer link.
        if (!empty($this->trailer)) {

            $trailerUrl = $this->trailer;
            $validateTrailerUrl = filter_var($trailerUrl, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);

            if (!$validateTrailerUrl) {

                $msgError[] = 'Insira um link válido do youTube';
            } else {
                // $msgError[] = substr($validateTrailerUrl, 0, 32);
                $youtubeDefaultUrl = 'https://www.youtube.com/embed/';
                $editedUrl = substr($validateTrailerUrl, 0, 30);
                if ($editedUrl !== $youtubeDefaultUrl) {
                    $msgError[] = 'Insira um link do youTube';
                }
            }
        }

        //Check image file.
        if (isset($files['movieFile']) && !empty($files['movieFile']['tmp_name'])) {
            $allowedFiles = ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG'];
            $allowedFileTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            @$fileExtension = pathInfo($this->image, PATHINFO_EXTENSION);
            if (!in_array($fileExtension, $allowedFiles) && !in_array($files['movieFile']['type'], $allowedFileTypes)) {
                $msgError[] = 'Insira uma imagem do tipo .jpeg, .jpg ou .png.';
            }

            list($width, $height) = getimagesize($files['movieFile']['tmp_name']);

            if ($width >= $height) {
                $msgError[] = 'Insira uma imagens com as recomendações desejadas';
            }

            $emptyField = strpos($files['movieFile']['name'], ' ');
            if ($emptyField) {

                $currentImage = $files['movieFile']['name'];
                $newImage = str_replace(' ', '', $currentImage);
                $this->__set('image', $newImage);
            } else {
                $this->__set('image', $_FILES['movieFile']['name']);
            }
        } else {
            $msgError[] = 'Insira uma imagem para este filme.';
        }
        return $msgError;
    }

    /**
     * Método responsável por fazer o registro de um novo filme no banco de dados.
     *
     * @param string $temporaryName
     * @return void
     */
    public function registerMovie($temporaryName)
    {
        try {
            $imageName = 'images/movies/' . bin2hex(random_bytes(5)) . $this->image;

            $query = 'INSERT INTO movies (title, description, image, trailer, category, length, id_user)
                                  VALUES (:title, :description, :image, :trailer, :category, :length, :id_user)';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':title', trim($this->title));
            $stmt->bindValue(':description', trim(ucfirst($this->description)));
            $stmt->bindValue(':image', $imageName);
            $stmt->bindValue(':trailer', $this->trailer);
            $stmt->bindValue(':category', $this->category);
            $stmt->bindValue(':length', $this->length);
            $stmt->bindValue(':id_user', $this->userID);
            $stmt->execute();

            move_uploaded_file($temporaryName, $imageName);
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    public function checkMovie()
    {
        try {
            $query = 'SELECT id_user
                      FROM movies
                      WHERE id = :id AND id_user = :id_user';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $this->id);
            $stmt->bindValue(':id_user', $this->id_user);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
                exit;
            } else {
                return false;
            }
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    public function checkMovieUpdateData($hours, $minute, $files)
    {
        $msgError = [];

        if (!$this->title) {
            $msgError[] = 'Insira um título.';
        }
        if (!$this->description) {
            $msgError[] = 'Insira uma descrição a este filme.';
        }
        if (empty($hours) && empty($minute)) {
            $msgError[] = 'Insira a duração do filme.';
        }
        if (!$this->category || $this->category == 'Selecione uma categoria') {
            $msgError[] = 'Selecione uma categoria.';
        }

        if (!empty($this->trailer)) {

            $trailerUrl = $this->trailer;
            $validateTrailerUrl = filter_var($trailerUrl, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);

            if (!$validateTrailerUrl) {

                $msgError[] = 'Insira um link válido do youTube';
            } else {
                // $msgError[] = substr($validateTrailerUrl, 0, 32);
                $youtubeDefaultUrl = 'https://www.youtube.com/embed/';
                $editedUrl = substr($validateTrailerUrl, 0, 30);
                if ($editedUrl !== $youtubeDefaultUrl) {
                    $msgError[] = 'Insira um link do youTube';
                }
            }
        }
        if (isset($files['movieEditFile']) && !empty($files['movieEditFile']['tmp_name'])) {
            $allowedFiles = ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG'];
            $allowedFileTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            $fileExtension = pathInfo($this->image, PATHINFO_EXTENSION);
            if (!in_array($fileExtension, $allowedFiles) && !in_array($files['movieEditFile']['type'], $allowedFileTypes)) {
                $msgError[] = 'Insira uma imagem do tipo .jpeg, .jpg ou .png.';
            }

            list($width, $height) = getimagesize($files['movieEditFile']['tmp_name']);

            if ($width >= $height) {
                // echo 'largura:' . $width . ' ' . 'altura:'. $height;
                $msgError[] = 'Insira uma imagens com as recomendações desejadas';
            }

            $emptyField = strpos($files['movieEditFile']['name'], ' ');
            if ($emptyField) {

                $currentImage = $files['movieEditFile']['name'];
                $newName = str_replace(' ', '', $currentImage);
                $this->__set('image', 'images/movies/' . bin2hex(random_bytes(5)) . $newName);
            } else {

                $this->__set('image', 'images/movies/' . bin2hex(random_bytes(5)) . $_FILES['movieEditFile']['name']);
            }
        }

        return $msgError;
    }

    public function editMovie($oldImage, $temporaryName)
    {
        try {
            $query = 'UPDATE movies
                      SET title = :title,
                          description = :description,
                          image = :image,
                          trailer = :trailer,
                          category = :category,
                          length = :length
                      WHERE id = :id';

            $newImage = !empty($this->image) ? $this->image : $oldImage;
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', trim($this->id));
            $stmt->bindValue(':title', trim($this->title));
            $stmt->bindValue(':description', trim(ucfirst($this->description)));
            $stmt->bindValue(':image', $newImage);
            $stmt->bindValue(':trailer', $this->trailer);
            $stmt->bindValue(':category', $this->category);
            $stmt->bindValue(':length', $this->length);
            $stmt->execute();

            if (!empty($this->image)) {
                unlink(__DIR__ . './../../public/' . $oldImage);
                move_uploaded_file($temporaryName, $this->image);
            }
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    /**
     * Mètodo responsável por deletar um filme.
     *
     * @return void
     */
    public function destroyMovie($image)
    {
        try {
            $query = 'DELETE FROM reviews
                      WHERE id_movie = :id;
                    
                      DELETE FROM movies
                      WHERE id = :id    ';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();
            unlink(__DIR__ . './../../public/' . $image);
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }
}
