<?php

namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

class MoviesController extends Action
{
    /**
     * Método responsável por retornar a página que faz o registro de um novo filme.
     *
     * @return void
     */
    public function pageRegisterMovie()
    {
        $this->validateUser();
        $this->render('user/register-movie', 'layout');
    }

    /**
     * Método responsável por instânciar o model Movies e chamar o método que faz o registro de um novo filme no banco de dados.
     *
     * @return void
     */
    public function registerMovie()
    {
        $this->validateUser();

        $movie = Container::getModel('Movies');

        $movie->__set('title', filter_input(INPUT_POST, "title"));
        $movie->__set('description', filter_input(INPUT_POST, "description"));
        $movie->__set('trailer', $_POST['trailer']);
        $movie->__set('category', filter_input(INPUT_POST, "category"));
        $movie->__set('userID', $_SESSION['userID']);

        $hours = filter_input(INPUT_POST, "hours", FILTER_VALIDATE_INT);
        $minutes = filter_input(INPUT_POST, "minutes", FILTER_VALIDATE_INT);

        $verificationErrorMessage = $movie->checkMovieRegistrationData($hours, $minutes, $_FILES);

        if (count($verificationErrorMessage) > 0) {
            $this->view->msgErrorRegisterMovie = $verificationErrorMessage[0];
            $this->view->movieData = [
                'inputTitle' => $_POST['title'] ?? '',
                'inputHours' => $_POST['hours'] ?? '',
                'inputMinutes' => $_POST['minutes'] ?? '',
                'inputCategory' => $_POST['category'] ?? '',
                'inputTrailer' => $_POST['trailer'] ?? '',
                'inputDescription' => $_POST['description'] ?? ''
            ];
            // echo 'estamos no erro';
            // print_r($verificationErrorMessage);
            $this->pageRegisterMovie();
        } else {
            $movie->__set('userID', $_SESSION['userID']);
            $movie->__set('length', "$hours horas e $minutes minutos");

            $movie->registerMovie($_FILES['movieFile']['tmp_name']);

            header('location: /my-movies');
        }
    }

     /**
     * Método responsável por retornar a página dos filmes dos usuários.
     *
     * @return void
     */
    public function pageMyMovies()
    {
        $this->validateUser();

        $movie = Container::getModel('Movies');
        $unratedUseMovies = $movie->recoverUserMovies($_SESSION['userID']);

        $reviews = Container::getModel('Reviews');
        $userMovies = [];
        foreach ($unratedUseMovies as $movie) {
            if ($reviews->calculateRatings($movie['id']) === false){
                $movie['rating'] = 'Não avaliado';
            } else {
                $movie['rating'] = number_format($reviews->calculateRatings($movie['id']),2,'.');
            }
            $userMovies[] = $movie;
        }
        $this->view->userMovies = $userMovies;

        $this->render('user/my-movies', 'layout');
    }

    public function pageEditMovie()
    {
        $this->validateUser();

        $movie = Container::getModel('Movies');
        $movie->__set('id', filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT));
        $movie->__set('id_user', $_SESSION['userID']);
         
        $checkMovie = $movie->checkMovie();

        if (!$checkMovie) {
            header('location: /my-movies');
        }


        $movieData =  $movie->recoverMovie();
        $this->view->movieData = $movieData;
        $this->render('movie/edit-movie', 'layout');
    }

    public function editMovie()
    {
        $this->validateUser();

        $movie = Container::getModel('Movies');

        $movie->__set('id', filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT));
        $movie->__set('title', filter_input(INPUT_POST, "title"));
        $movie->__set('description', filter_input(INPUT_POST, "description"));
        $movie->__set('trailer', $_POST['trailer']);
        $movie->__set('category', filter_input(INPUT_POST, "category"));

        $hours = filter_input(INPUT_POST, "hours", FILTER_VALIDATE_INT);
        $minutes = filter_input(INPUT_POST, "minutes", FILTER_VALIDATE_INT);

        $checkData = $movie->checkMovieUpdateData($hours, $minutes,$_FILES);

        $movieData = $movie->recoverMovie();

        if (count($checkData) > 0) {
            $this->view->msgErrorEditMovie = $checkData[0];
            $this->view->movieData = $movieData;
            $this->render('movie/edit-movie', 'layout');
        }
        $movie->__set('length', "$hours horas e $minutes minutos");
        
        $movie->editMovie($movieData['image'], $_FILES['movieEditFile']['tmp_name']);
        $this->view->msgSeccessUpdateMovie = 'Filme editado com sucesso.';
        $this->pageEditMovie();

    }

    public function destroyMovie()
    {
        session_start();
        $movie = Container::getModel('movies');
        $movie->__set('id', filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT));
        $movie->__set('id_user', $_SESSION['username']);

        $checkMovie = $movie->checkMovie();

        if (!$checkMovie) {
            header('location: /my-movies');
        }
        $movieData = $movie->recoverMovie();
        $movie->destroyMovie($movieData['image']);
        header('location: /my-movies');
    }

}
