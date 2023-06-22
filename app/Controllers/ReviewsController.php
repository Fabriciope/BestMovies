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
        $movie->id = $movieID;

        if (!$movieID || !$movie->checkIfMovieExists()) {
            header('location: /home?');
        }

        $reviews = Container::getModel('Reviews');
        $reviews->id_user = $_SESSION['userID'] ?? '';
        $reviews->id_movie = $movieID;

        $movieData = $movie->recoverMovie();

        $userComment = $reviews->userComment();
        if ( is_array($userComment)) {
            $userComment['username'] = $_SESSION['username'];
        }
        $this->view->userComment = $userComment;

        $checkComment = $reviews->__get('id_user') === (int) $movieData['id_user'];
        $this->view->checkComment = $checkComment;

        $movieReviews = $reviews->retrieveMovieReviews();
        $this->view->movieReviews = $movieReviews;

        $this->view->movieData = $movieData;
        $this->view->movieData['rating'] = $reviews->calculateRatings($movieID) ? number_format($reviews->calculateRatings($movieID),1,'.') : 'Não avaliado';

        $this->render('movie/movie', 'layout');
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

        $reviews->id_user = $_SESSION['userID'];
        $reviews->id_movie = filter_input(INPUT_POST, "id_movie");
        $reviews->review = filter_input(INPUT_POST, "comment");
        $reviews->rating = filter_input(INPUT_POST, "rating", FILTER_VALIDATE_INT);

        $checkNewAssessment = $reviews->checkAssessmentRecord();
        $userComment = $reviews->userComment(filter_input(INPUT_POST, "id_movie"));
        if (count($checkNewAssessment) > 0 || $userComment) {
            $this->view->msgErrorNewAssessment = $checkNewAssessment[0] ?? '';
            $this->view->evaluationErrorData = [
                'inputRating' => $_POST['rating'] ?? '',
                'inputComment' => $_POST['comment'] ?? ''
            ];
            $this->pageMovie();
            exit;
        }
        $reviews->assessmentRecord();
        $this->pageMovie();
    }

    public function deleteReview()
    {
        session_start();

        $reviews = Container::getModel('Reviews');
        $reviews->id = filter_input(INPUT_POST, "reviewID", FILTER_VALIDATE_INT);
        $reviews->id_user = $_SESSION['userID'];

        if (!$reviews->checkIdToDelete()) {
            header('location: /movie?id=' . $_GET['id']);
            exit;
        }
         
        $reviews->deleteReview();
        header('location: /movie?id=' . $_GET['id']);
    }
}
