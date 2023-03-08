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
    public function retrieveRecentMovies()
    {
        $query = 'SELECT * 
                  FROM movies
                  ORDER BY id desc';
                //LIMIT 19
        
        $statement = $this->db->query($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Método responsável por verificar se o id enviado por get existe ou não.
     *
     * @return boolean
     */
    public function checkIfMovieExists()
    {
        $query = 'SELECT *
                  FROM movies
                  WHERE id = :id';

        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $this->__get('id'));
        $statement->execute();
        
        if ($statement->rowCount() == 0) {
            return false;
            exit;
        } else {
            return true;
            exit;
        }
    }


    /**
     * Método responsável por retornar os dados de um único filme.
     *
     * @return array
     */
    public function recoverMovie()
    {
        $query = 'SELECT *
                  FROM movies
                  WHERE id = :id';
        $statement= $this->db->prepare($query);
        $statement->bindValue(':id', $this->__get('id'));
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Método responsável por retornar todos os filmes que o usuário já registrou.
     *
     * @param int $userID
     * @return array
     */
    public function recoverUserMovies($userID)
    {
        $query = 'SELECT *
                  FROM movies
                  WHERE id_user = :id_user
                  ORDER BY id DESC';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id_user', $userID);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Método responsável por verificar os dados antes de fazer o registro de u novo filme.
     *
     * @param int $hours
     * @param int $minute
     * @param array $files
     * @return array
     */
    public function checkMovieRegistrationData($hours, $minute, $files):array
    {
        $msgError = [];
        $query  = 'SELECT *
                   FROM movies
                   WHERE title = :registredMovie';
        
        $statement = $this->db->prepare($query);
        $statement->bindValue(':registredMovie', $this->__get('title'));
        $statement->execute();

        if (count($statement->fetchAll()) > 0) {
            $msgError[] = 'Este filme já foi registrado';
        }
        if(!$this->__get('title')) {
            $msgError[] = 'Insira um título.';
        }
        if (!$this->__get('description')) {
            $msgError[] = 'Insira uma descrição a este filme.';
        }
        if (empty($hours) && empty($minute)) {
            $msgError[] = 'Insira a duração do filme.';
        }
        if (!$this->__get('category') || $this->__get('category') == 'Selecione uma categoria') {
            $msgError[] = 'Selecione uma categoria.';
        }

        //Check trailer link.
        if (!empty($this->__get('trailer'))) {

            $trailerUrl = $this->__get('trailer');
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
        if (!isset($files['movieFile']) || empty($files['movieFile']['tmp_name'])) {
            $msgError[] = 'Insira uma imagem para este filme.';
        } else {

            $allowedFiles = ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG'];
            $allowedFileTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            $fileExtension = pathInfo($this->__get('image'), PATHINFO_EXTENSION);
            if (!in_array($fileExtension, $allowedFiles) && !in_array($files['movieFile']['type'], $allowedFileTypes)) {
                $msgError[] = 'Insira uma imagem do tipo .jpeg, .jpg ou .png.';
            }
    
            list($width, $height) = getimagesize($files['movieFile']['tmp_name']);
            
            if ($width >= $height) {
                // echo 'largura:' . $width . ' ' . 'altura:'. $height;
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

        }
        return $msgError;
    }

    /**
     * Método responsável por fazer o registro de um novo filme no banco de dados.
     *
     * @param string $temporaryName
     * @return string
     */
    public function registerMovie($temporaryName)
    {
        $imageName = 'images/movies/' . bin2hex(random_bytes(5)) . $this->__get('image');

        $query = 'INSERT INTO movies (title, description, image, trailer, category, length, id_user)
                              VALUES (:title, :description, :image, :trailer, :category, :length, :id_user)';

        $statement= $this->db->prepare($query);
        $statement->bindValue(':title', trim($this->__get('title')));
        $statement->bindValue(':description', trim(ucfirst($this->__get('description'))));
        $statement->bindValue(':image', $imageName);
        $statement->bindValue(':trailer', $this->__get('trailer'));
        $statement->bindValue(':category', $this->__get('category'));
        $statement->bindValue(':length', $this->__get('length'));
        $statement->bindValue(':id_user', $this->__get('userID'));
        $statement->execute();

        move_uploaded_file($temporaryName, $imageName);

        return 'success';
    }

    public function checkMovie()
    {
        $query = 'SELECT id_user
                  FROM movies
                  WHERE id = :id AND id_user = :id_user';

        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $this->__get('id'));
        $statement->bindValue(':id_user', $this->__get('id_user'));
        $statement->execute();

        if ($statement->rowCount() > 0) {
            return true;
            exit;
        } else {
            return false;
        }
    }

    public function editMovie()
    {
        $query = 'UPDATE ';
    }

    /**
     * Mètodo responsável por deletar um filme.
     *
     * @return void
     */
    public function destroyMovie()
    {
        $query = 'DELETE FROM movies
                  WHERE id = :id';
        
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $this->__get('id'));
        $statement->execute();
    }
}