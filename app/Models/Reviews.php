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


    /**
     * Método responsável por retornar as avaliações de um determinado filme.
     *
     * @return array
     */
    public function retrieveMovieReviews()
    {
        $query = 'SELECT u.id, u.name, u.lastname, u.image, r.rating, r.review, r.id_movie
                  FROM reviews as r
                  LEFT JOIN users as u ON (r.id_user = u.id)
                  WHERE r.id_movie = :id_movie';
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_movie', $this->__get('id_movie'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Método responsável por calcular a nota de um determinado filme.
     *
     * @param string $movieID
     * @return mixed
     */
    public function calculateRatings($movieID)
    {
        $query = 'SELECT rating
                  FROM reviews
                  WHERE id_movie = :id_movie';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_movie', $movieID);
        $stmt->execute();

        $reviews = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            $rating = 0;

            foreach ($reviews as $review) {
                $rating += $review['rating'];
            }
            $rating = $rating / count($reviews);
        } else {
            $rating = false;
        }

        return $rating;
    }

    /**
     * Método responsável por verificar se o usuário já fez um comentário naquele filme.
     *
     * @return mixed
     */
    public function userComment()
    {
        $query = 'SELECT *
                  FROM reviews
                  WHERE id_movie = :id_movie AND id_user = :id_user';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_movie', $this->__get('id_movie'));
        $stmt->bindValue(':id_user', $this->__get('id_user'));
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
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

        if (!$this->__get('rating') || empty($this->__get('rating'))) {
            $msgError[] = 'Insira a nota do filme antes de enviar';
        }

        if (!$this->__get('review') || empty($this->__get('review'))) {
            $msgError[] = 'Insira um comentário antes de enviar';
        }

        return $msgError;
    }

    /**
     * Método responsável por fazer o registro de uma nova avaliação.
     *
     * @return void
     */
    public function assessmentRecord()
    {
        $query = 'INSERT INTO reviews (id_user, id_movie, rating, review)
                               VALUES (:id_user, :id_movie, :rating, :review)';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_user', $this->__get('id_user'));
        $stmt->bindValue(':id_movie', $this->__get('id_movie'));
        $stmt->bindValue(':rating', $this->__get('rating'));
        $stmt->bindValue(':review', trim($this->__get('review')));
        $stmt->execute();
    }

    public function checkIdToDelete()
    {
        $query = 'SELECT *
                  FROM reviews
                  WHERE id = :id AND id_user = :id_user';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':id_user', $this->__get('id_user'));
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
            exit;
        } else{
            return false;
        }
    }

    public function deleteReview()
    {
        $query = 'DELETE FROM reviews
                  WHERE id = :reviewID';
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':reviewID', $this->__get('id'));
        $stmt->execute();
    }
}