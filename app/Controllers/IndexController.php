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
        $moviesWithoutRating = $movies->retrieveRecentMovies();

        $reviews = Container::getModel('Reviews');

        $allMovies = [];

        foreach ($moviesWithoutRating as $movie) {

            if ($reviews->calculateRatings($movie['id']) === false){
                $movie['rating'] = 'Não avaliado';
            } else {
                $movie['rating'] = $reviews->calculateRatings($movie['id']);
            }
            $allMovies['recentMovies'][] = $movie;

            switch($movie['category']) {
                case 'Ação':
                    $allMovies['actionMovies'] []= $movie;
                 break;

                case 'Aventura':
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
        }
        
        $this->view->allMovies = $allMovies;

        $this->render('home/index','layout1');
    }

    /**
     * Método responsável por redirecionar para a página de entrar/registrar.
     *
     * @return void
     */
    public function pageEnterRegister()
    {
        $this->view->data = [
            'inputEmailEnter'=> '',
            'inputPasswordEnter'=> '',
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
