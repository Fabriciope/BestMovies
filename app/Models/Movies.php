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


    public function retrieveRecentMovies()
    {
        $query = 'SELECT * 
                  FROM movies
                  ORDER BY id desc
                  LIMIT 12';
        
        $statement = $this->db->query($query);
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

        if (!empty($this->__get('trailer'))) {

            $trailerUrl = $this->__get('trailer');
            $validateTrailerUrl = filter_var($trailerUrl, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
            
            if (!$validateTrailerUrl) {

                $msgError[] = 'Insira um link válido do youTube';

            } else {
                // $msgError[] = substr($validateTrailerUrl, 0, 32);
                $youtubeDefaultUrl = 'https://www.youtube.com/embed/';
                $editedUrl = substr($validateTrailerUrl, 0, 32);
                if ($editedUrl !== $youtubeDefaultUrl) {
                    $msgError[] = 'Insira um link do youTube';
                }
            }
        }

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
        exit;
        
    }
}