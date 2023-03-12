<?php

namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

class ReviewsController extends Action
{

    /**
     * Método responsável por retornar a página do filme com todos as avaliações e os dados do filme.
     *
     * @return void
     */
    public function pageMovie()
    {
        @session_start();

        $movieID = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        $movie = Container::getModel('Movies');
        $movie->__set('id', $movieID);

        $checkMovie = $movie->checkIfMovieExists();
        if (!$movieID || !$checkMovie) {
            echo $movieID;
            echo $checkMovie;
            header('location: /home?');
        }

        $reviews = Container::getModel('Reviews');
        $reviews->__set('id_user', $_SESSION['userID'] ?? '');
        $reviews->__set('id_movie', $movieID);

        $movieData = $movie->recoverMovie();

        $movieUserID = (int) $movieData['id_user'];
        $checkComment = $reviews->checkComment($movieUserID);
        $this->view->checkComment = $checkComment ? true : false;


        $movieReviews = $reviews->retrieveMovieReviews();

        //forma alternativa de se recuperar as avaliações dos filmes com os dados do usuarios.
        // $reviewsWithoutUser = $reviews->retrieveMovieReviews();

        // $reviewsWithUser = [];
        // $user = Container::getModel('Users');
        // foreach ($reviewsWithoutUser as $review) {

        //     $user->__set('id', $review['id_user']);
        //     $userData = $user->retrieveUser();

        //     $review['user'] = $userData;
        //     $reviewsWithUser[] = $review;
        // }

        // echo '<pre>';
        // print_r($movieReviews);
        // echo '</pre>';

        $this->view->movieReviews = $movieReviews;

        $this->view->movieData = $movieData;
        $this->view->movieData['rating'] = $reviews->calculateRatings($movieID) ? number_format($reviews->CalculateRatings($movieID),2,'.') : 'Não avaliado';
        $this->render('movie/movie', 'layout1');
    }

    /**
     * Método responsável por definir os dados para fazer o registro de uma nova avaliação.
     *
     * @return void
     */
    public function registerNewAssessments()
    {
        $this->validateUser();

        $reviews = Container::getModel('Reviews');

        $reviews->__set('id_user', $_SESSION['userID']);
        $reviews->__set('id_movie', filter_input(INPUT_POST, "id_movie"));
        $reviews->__set('review', filter_input(INPUT_POST, "comment"));
        $reviews->__set('rating', filter_input(INPUT_POST, "rating", FILTER_VALIDATE_INT));

        $checkNewAssessment = $reviews->checkAssessmentRecord();
        $checkComment = $reviews->checkComment(filter_input(INPUT_POST, "id_movie"));
        if (count($checkNewAssessment) > 0 || $checkComment) {
            $this->view->msgErrorNewAssessment = $checkNewAssessment[0] ?? '';
            $this->view->evaluationErrorData = [
                'inputRating' => $_POST['rating'],
                'inputComment' => $_POST['comment']
            ];
            $this->pageMovie();
            exit;
        }
        $reviews->assessmentRecord();
        $this->pageMovie();
    }
}
