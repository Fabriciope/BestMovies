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
        $this->render('user/register-movie', 'layout1');
    }

    /**
     * Método responsável por instânciar o model Movies e chamar o método que faz o registro de um novo filme no banco de dados.
     *
     * @return void
     */
    public function registerMovie()
    {
        session_start();

        $movie= Container::getModel('Movies');

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
            $movie->__set('image', $_FILES['movieFile']['name']);
            $movie->__set('length', "$hours horas e $minutes minutos");

            $movie->registerMovie($_FILES['movieFile']['tmp_name']);

            header('location: /page-my-movies');

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
        $this->render('user/my-movies', 'layout1');
    }
}