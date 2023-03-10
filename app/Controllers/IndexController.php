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
                $movie['rating'] = number_format($reviews->calculateRatings($movie['id']),2,'.');
            }
            $allMovies['recentMovies'][] = $movie;
        }

        $arrayRatingsAction = [];
        $arrayRatingsAdventure = [];
        $arrayRatingsDrama = [];
        $arrayRatingsFantasy= [];
        $arrayRatingsScienceFiction = [];
        $arrayRatingsRomance = [];
        $arrayRatingsHorror = [];
        $bestMovies = [];
        $arrayRatingsThrillers = [];
        //Refatorar esse foreach para as models.
        foreach ($allMovies['recentMovies'] ?? [] as $movie) {

            switch ($movie['category']) {
                case 'Ação':
                    $arrayRatingsAction[] = $movie['rating'];
                    $allMovies['actionMovies'][] = $movie;
                    
                    foreach ($arrayRatingsAction as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsAction);
                            unset($arrayRatingsAction[$wrongKey]);
                        }
                        foreach ($allMovies['actionMovies'] as $actionMovie) {
                            if (!empty($arrayRatingsAction)) {
                                if (array_search(max($arrayRatingsAction), $actionMovie)) {
                                    $bestMovies['action'] = $actionMovie;
                                }
                            }
                        }
                    }
                    break;
                case 'Aventura':
                    $arrayRatingsAdventure[] = $movie['rating'];
                    $allMovies['adventureMovies'][] = $movie;
                    
                    foreach ($arrayRatingsAdventure as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsAdventure);
                            unset($arrayRatingsAdventure[$wrongKey]);
                        }
                        foreach ($allMovies['adventureMovies'] as $adventureMovie) {
                            if (!empty($arrayRatingsAdventure)) {
                                if (array_search(max($arrayRatingsAdventure), $adventureMovie)) {
                                    $bestMovies['adventure'] = $adventureMovie;
                                }
                            }
                        }
                    }
                    break;
                case 'Drama':
                    $arrayRatingsDrama[] = $movie['rating'];
                    $allMovies['dramaMovies'][] = $movie;
                    
                    foreach ($arrayRatingsDrama as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsDrama);
                            unset($arrayRatingsDrama[$wrongKey]);
                        }
                        foreach ($allMovies['dramaMovies'] as $dramaMovie) {
                            if (!empty($arrayRatingsDrama)) {
                                if (array_search(max($arrayRatingsDrama), $dramaMovie)) {
                                    $bestMovies['drama'] = $dramaMovie;
                                }
                            }
                        }
                    }
                    break;
                case 'Fantasia':
                    $arrayRatingsFantasy[] = $movie['rating'];
                    $allMovies['fantasyMovies'][] = $movie;
                    foreach ($arrayRatingsFantasy as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsFantasy);
                            unset($arrayRatingsFantasy[$wrongKey]);
                        }
                        foreach ($allMovies['fantasyMovies'] as $fantasyMovie) {
                            if (!empty($arrayRatingsFantasy)) {
                                if (array_search(max($arrayRatingsFantasy), $fantasyMovie)) {
                                    $bestMovies['fantasy'] = $fantasyMovie;
                                }
                            }
                        }
                    }
                    break;
                case 'Ficção científica':
                    $arrayRatingsScienceFiction[] = $movie['rating'];
                    $allMovies['scienceFictionMovies'][] = $movie;
                    
                    foreach ($arrayRatingsScienceFiction as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsScienceFiction);
                            unset($arrayRatingsScienceFiction[$wrongKey]);
                        }
                        foreach ($allMovies['scienceFictionMovies'] as $scienceFictionMovie) {
                            if (!empty($arrayRatingsScienceFiction)) {
                                if (array_search(max($arrayRatingsScienceFiction), $scienceFictionMovie)) {
                                    $bestMovies['scienceFiction'] = $scienceFictionMovie;
                                }
                            }
                        }
                    }
                    break;
                case 'Romance':
                    $arrayRatingsRomance[] = $movie['rating'];
                    $allMovies['romanceMovies'][] = $movie;
                    
                    foreach ($arrayRatingsScienceFiction as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsScienceFiction);
                            unset($arrayRatingsScienceFiction[$wrongKey]);
                        }
                        foreach ($allMovies['romance'] as $romanceMovie) {
                            if (!empty($arrayRatingsRomance)) {
                                if (array_search(max($arrayRatingsRomance), $romanceMovie)) {
                                    $bestMovies['romance'] = $romanceMovie;
                                }
                            }
                        }
                    }
                    break;
                case 'Terror':
                    $arrayRatingHorror[] = $movie['rating'];
                    $allMovies['horrorMovies'][] = $movie;
                    
                    foreach ($arrayRatingsHorror as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsHorror);
                            unset($arrayRatingsHorror[$wrongKey]);
                        }
                        foreach ($allMovies['horror'] as $horrorMovie) {
                            if (!empty($arrayRatingsHorror)) {
                                if (array_search(max($arrayRatingsHorror), $horrorMovie)) {
                                    $bestMovies['horror'] = $horrorMovie;
                                }
                            }
                        }
                    }
                    break;
                case 'Suspense':
                    $arrayRatingThrillers[] = $movie['rating'];
                    $allMovies['thrillersMovies'][] = $movie;
                    
                    foreach ($arrayRatingsThrillers as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsThrillers);
                            unset($arrayRatingsThrillers[$wrongKey]);
                        }
                        foreach ($allMovies['thrillers'] as $thrillersMovie) {
                            if (!empty($arrayRatingsThrillers)) {
                                if (array_search(max($arrayRatingsThrillers), $thrillersMovie)) {
                                    $bestMovies['thrillers'] = $thrillersMovie;
                                }
                            }
                        }
                    }
                    break;
            }
        }

        $this->view->bestMovies = $bestMovies;
        $this->view->allMovies = $allMovies;
        $this->render('home/index','layout1');
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
                $movie['rating'] = number_format($reviews->calculateRatings($movie['id']),2,'.') ;
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
