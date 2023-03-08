<?php
namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

class ReviewsController extends Action
{
    
    public function pageMovie()
    {
        session_start();
        
        $movieID = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        $movie = Container::getModel('Movies');
        $movie->__set('id', $movieID);

        $checkMovie = $movie->checkIfMovieExists();
        if (!$movieID || !$checkMovie) {
            header('location: /home');
        }

        $movieData = $movie->recoverMovie();
        $movieUserID = (int) $movieData['id_user'];

        $reviews = Container::getModel('Reviews');
        $reviews->__set('id_user', $_SESSION['userID'] ?? '');
        $reviews->__set('id_movie', $movieID);



        $checkComment = $reviews->checkComment($movieUserID);

        $this->view->checkComment = $checkComment ? true : false;

        // $belongsToTheUse = $movie->belongsToTheUse();
        // $this->view->$this->view->belongsToTheUse = $belongsToTheUse;

        

        echo $checkComment;
        $this->view->movieData = $movieData;
        $this->render('movie/movie', 'layout1');
    }

    public function registerNewAssessments()
    {

        session_start();

        $reviews = Container::getModel('Reviews');

        $reviews->__set('id_user', $_SESSION['userID']);
        $reviews->__Set('id_movie', filter_input(INPUT_POST, "id_movie"));
        $reviews->__set('review', filter_input(INPUT_POST, "comment"));
        $reviews->__set('rating', filter_input(INPUT_POST, "rating", FILTER_VALIDATE_INT));


        $checkNewAssessment = $reviews->checkAssessmentRecord();

        if (count($checkNewAssessment) > 0){
            $this->view->msgErrorNewAssessments = $checkNewAssessment[0];

            header('location: /movie?id=' . $reviews->__get('id_movie'));
        }


    }
}