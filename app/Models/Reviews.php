<?php
namespace App\Models;

use App\Utils\models\Model;

class Reviews extends Model
{
    protected $id;
    protected $id_user;
    protected $id_movie;
    protected $review;
    protected $rating;


    public function retrieveMovieReviews()
    {
        $query = 'SELECT *
                  FROM reviews
                  WHERE id_movie = :id_movie';
        
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id_movie', $this->__get('id_movie'));
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Método responsável por verificar se o usuário já fez um comentário naquele filme.
     *
     * @return bool
     */
    public function checkComment(int $movieUserID):bool
    {
        $query = 'SELECT *
                  FROM reviews
                  WHERE id_movie = :id_movie AND id_user = :id_user';

        $statement = $this->db->prepare($query);
        $statement->bindValue(':id_movie', $this->__get('id_movie'));
        $statement->bindValue(':id_user', $this->__get('id_user'));
        $statement->execute();

        if ($statement->rowCount() > 0 || $this->__get('id_user') === $movieUserID) {
            return true;
            exit;
        } else {
            return false;
        }

    }

    /**
     * Método responsável por verificar se todos os dados do registro de uma nova avaliação estão corretos.
     *
     * @return array
     */
    public function checkAssessmentRecord()
    {
        $msgError = [];

        if (!$this->__get('id_movie')) {
            $msgError[] = 'Ocorreu algum erro ao tentar avaliar este filme, tente novamente mais tarde.';
        }

        if (!$this->__get('review')) {
            $msgError[] = 'Insira um comentário antes de enviar';
        }

        if (!$this->__get('rating')) {
            $msgError[] = 'Insira a nota do filme antes de enviar';
        }

        return $msgError;
    }

    public function assessmentRecord()
    {
        $query = 'INSERT INTO reviews (id_user, id_movie, rating, review)
                               VALUES (:id_user, :id_movie, :rating, :review)';
        
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id_user', $this->__get('id_user'));
        $statement->bindValue(':id_movie', $this->__get('id_movie'));
        $statement->bindValue(':rating', $this->__get('rating'));
        $statement->bindValue(':review', trim($this->__get('review')));
        $statement->execute();
    }
}