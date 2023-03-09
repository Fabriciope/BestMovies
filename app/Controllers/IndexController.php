<?php

namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

// define('URL', 'http://' . $_SERVER['SERVER_NAME']);

class IndexController extends Action
{
    /**
     * Método responsável por redirecionar para a página principal (home).
     *
     * @return void
     */
    public function pageHome()
    {
        session_start();
        $movies = Container::getModel('movies');
        $moviesWithoutRating = $movies->retrieveAllMovies();

        $reviews = Container::getModel('Reviews');

        $allMovies = [];

        foreach ($moviesWithoutRating as $movie) {

            if ($reviews->calculateRatings($movie['id']) === false) {
                $movie['rating'] = 'Não avaliado';
            } else {
                $movie['rating'] = $reviews->calculateRatings($movie['id']);
            }
            $allMovies['recentMovies'][] = $movie;
        }

        $arrayRatingsAction = [];
        $arrayRatingsAdventure = [];
        $bestMovies = [];
        foreach ($allMovies['recentMovies'] as $movie) {

            switch ($movie['category']) {
                case 'Ação':
                    $arrayRatingsAction[] = $movie['rating'];
                    $allMovies['actionMovies'][] = $movie;
                    echo 'categoria: ' . $movie['title'] . '-' . $movie['rating'] . '<br>';
                    break;
                case 'Aventura':
                    $arrayRatingsAdventure[] = $movie['rating'];
                    $allMovies['adventureMovies'][] = $movie;
                    break;
                case 'Drama':
                    $allMovies['dramaMovies'][] = $movie;
                    break;
                case 'Fantasia':
                    $allMovies['fantasyMovies'][] = $movie;
                    break;
                case 'Ficção científica':
                    $allMovies['scienceFictionMovies'][] = $movie;
                    break;
                case 'Romance':
                    $allMovies['romanceMovies'][] = $movie;
                    break;
                case 'Terror':
                    $allMovies['horrorMovies'][] = $movie;
                    break;
                case 'Suspense':
                    $allMovies['thrillers'][] = $movie;
                    break;
            }
            foreach ($arrayRatingsAction as $key) {
                if ($key === 'Não avaliado') {
                    $wrongKey = array_search('Não avaliado', $arrayRatingsAction);
                    unset($arrayRatingsAction[$wrongKey]);
                }
            }
        }

        $bestActionMovie = array_search(max($arrayRatingsAction), $allMovies['actionMovies']);
        $bestMovies['action'] = $allMovies['actionMovies'][$bestActionMovie];
        echo '<pre>';
        print_r($bestMovies);
        echo '</pre><br>';
        // echo $stringRatingsAction . '<br>';
        echo '<pre>';
        print_r($arrayRatingsAction);
        echo '</pre><br>';
        $this->view->bestMovies = $bestMovies;
        $this->view->allMovies = $allMovies;

        echo '<pre>';
        print_r($bestMovies);
        echo '</pre><br>';
        echo '<pre>';
        print_r($allMovies);
        echo '</pre><br>';

        // $this->render('home/index','layout1');
    }

    public function search()
    {
        session_start();

        $movies = Container::getModel('Movies');
        $movies->__set('title', filter_input(INPUT_POST, "search"));

        $foundMovies = $movies->search();

        if (count($foundMovies) === 0 || !filter_input(INPUT_POST, "search")) {
            $this->view->notFound = 'Não encontramos nenhum filme para esta busca, ';
            $this->view->search = $_POST['search'];
            $this->render('movie/search', 'layout1');
        }

        $reviews = Container::getModel('Reviews');
        $moviesSearchedWithNote = [];
        foreach ($foundMovies as $movie) {

            if ($reviews->calculateRatings($movie['id']) === false) {
                $movie['rating'] = 'Não avaliado';
            } else {
                $movie['rating'] = $reviews->calculateRatings($movie['id']);
            }
            $moviesSearchedWithNote[] = $movie;
        }

        $this->view->search = $_POST['search'];
        $this->view->foundMovies = $moviesSearchedWithNote;
        $this->render('movie/search', 'layout1');
    }

    /**
     * Método responsável por redirecionar para a página de entrar/registrar.
     *
     * @return void
     */
    public function pageEnterRegister()
    {
        $this->view->data = [
            'inputEmailEnter' => '',
            'inputPasswordEnter' => '',
            'inputName' => '',
            'inputLastName' => '',
            'inputEmailRegister' => '',
            'inputPasswordRegister' => '',
            'inputPasswordCS' => '',
        ];
        $this->view->msg = [
            'msgErrorE' => '',
            'msgErrorR' => '',
        ];
        $this->render('home/enter-register', 'layout1');
    }
}
