<?php
namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

class ReviewsController extends Action
{
    
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
            // header('location: /home?' . $movieID . $checkMovie);
        }


        $reviews = Container::getModel('Reviews');
        $reviews->__set('id_user', $_SESSION['userID'] ?? '');
        $reviews->__set('id_movie', $movieID);
        


        $movieData = $movie->recoverMovie();
        $movieUserID = (int) $movieData['id_user'];

        $reviewsWithoutUser = $reviews->retrieveMovieReviews();
        $this->view->movieReviews = $reviewsWithoutUser;

        $checkComment = $reviews->checkComment($movieUserID);
        $this->view->checkComment = $checkComment ? true : false;

        $this->view->movieData = $movieData;

        $reviewsWithUser = [];
        $user = Container::getModel('Users');
        foreach ($reviewsWithoutUser as $review) {

            $user->__set('id', $review['id_user']);
            $userData = $user->retrieveUser();

            // $reviews->user = $userData;
            $review['user'] = $userData;

            // echo '<pre>';
            // print_r($review);
            // echo '</pre>';
            $reviewsWithUser[] = $review;
        }

        // echo '<pre>';
        // print_r($reviewsWithUser);
        // echo '</pre>';
        $this->view->movieReviews = $reviewsWithUser;
        $this->render('movie/movie', 'layout1');
    }

    public function registerNewAssessments()
    {

        $this->validateUser();

        $reviews = Container::getModel('Reviews');

        $reviews->__set('id_user', $_SESSION['userID']);
        $reviews->__set('id_movie', filter_input(INPUT_POST, "id_movie"));
        $reviews->__set('review', filter_input(INPUT_POST, "comment"));
        $reviews->__set('rating', filter_input(INPUT_POST, "rating", FILTER_VALIDATE_INT));

        $checkNewAssessment = $reviews->checkAssessmentRecord();

        if (count($checkNewAssessment) > 0){
            $this->view->msgErrorNewAssessment = $checkNewAssessment[0];

            $this->pageMovie();
        }

        $reviews->assessmentRecord();
        $this->pageMovie();
    }
}