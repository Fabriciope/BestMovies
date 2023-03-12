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
                $movie['rating'] = number_format($reviews->calculateRatings($movie['id']), 2, '.');
            }
            $allMovies['novos'][] = $movie;
        }

        $arrayRatingsAction = [];
        $arrayRatingsAdventure = [];
        $arrayRatingsDrama = [];
        $arrayRatingsFantasy = [];
        $arrayRatingsScienceFiction = [];
        $arrayRatingsRomance = [];
        $arrayRatingsHorror = [];
        $bestMovies = [];
        $arrayRatingsThrillers = [];
        //Refatorar esse foreach para as models.
        foreach ($allMovies['novos'] ?? [] as $movie) {

            switch ($movie['category']) {
                case 'Ação':
                    $arrayRatingsAction[] = $movie['rating'];
                    $allMovies['ação'][] = $movie;

                    foreach ($arrayRatingsAction as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsAction);
                            unset($arrayRatingsAction[$wrongKey]);
                        }
                        foreach ($allMovies['ação'] as $actionMovie) {
                            if (!empty($arrayRatingsAction)) {
                                if (array_search(max($arrayRatingsAction), $actionMovie)) {
                                    $bestMovies['ação'] = $actionMovie;
                                    $bestMovies['ação']['imageBanner'] = 'images/banners/banner-films-action.png';
                                }
                            }
                        }
                    }
                    break;
                case 'Aventura':
                    $arrayRatingsAdventure[] = $movie['rating'];
                    $allMovies['aventura'][] = $movie;

                    foreach ($arrayRatingsAdventure as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsAdventure);
                            unset($arrayRatingsAdventure[$wrongKey]);
                        }
                        foreach ($allMovies['aventura'] as $adventureMovie) {
                            if (!empty($arrayRatingsAdventure)) {
                                if (array_search(max($arrayRatingsAdventure), $adventureMovie)) {
                                    $bestMovies['aventura'] = $adventureMovie;
                                    $bestMovies['aventura']['imageBanner'] = 'images/banners/banner-films-adventure.png';
                                }
                            }
                        }
                    }
                    break;
                case 'Drama':
                    $arrayRatingsDrama[] = $movie['rating'];
                    $allMovies['drama'][] = $movie;

                    foreach ($arrayRatingsDrama as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsDrama);
                            unset($arrayRatingsDrama[$wrongKey]);
                        }
                        foreach ($allMovies['drama'] as $dramaMovie) {
                            if (!empty($arrayRatingsDrama)) {
                                if (array_search(max($arrayRatingsDrama), $dramaMovie)) {
                                    $bestMovies['drama'] = $dramaMovie;
                                    $bestMovies['drama']['imageBanner'] = 'images/banners/banner-films-drama.png';
                                }
                            }
                        }
                    }
                    break;
                case 'Fantasia':
                    $arrayRatingsFantasy[] = $movie['rating'];
                    $allMovies['fantasia'][] = $movie;
                    foreach ($arrayRatingsFantasy as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsFantasy);
                            unset($arrayRatingsFantasy[$wrongKey]);
                        }
                        foreach ($allMovies['fantasia'] as $fantasyMovie) {
                            if (!empty($arrayRatingsFantasy)) {
                                if (array_search(max($arrayRatingsFantasy), $fantasyMovie)) {
                                    $bestMovies['fantasia'] = $fantasyMovie;
                                    $bestMovies['fantasia']['imageBanner'] = 'images/banners/banner-films-fantasy.png';
                                }
                            }
                        }
                    }
                    break;
                case 'Ficção científica':
                    $arrayRatingsScienceFiction[] = $movie['rating'];
                    $allMovies['ficção científica'][] = $movie;

                    foreach ($arrayRatingsScienceFiction as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsScienceFiction);
                            unset($arrayRatingsScienceFiction[$wrongKey]);
                        }
                        foreach ($allMovies['ficção científica'] as $scienceFictionMovie) {
                            if (!empty($arrayRatingsScienceFiction)) {
                                if (array_search(max($arrayRatingsScienceFiction), $scienceFictionMovie)) {
                                    $bestMovies['ficção científica'] = $scienceFictionMovie;
                                    $bestMovies['ficção científica']['imageBanner'] = 'images/banners/banner-films-science-fiction.png';
                                }
                            }
                        }
                    }
                    break;
                case 'Romance':
                    $arrayRatingsRomance[] = $movie['rating'];
                    $allMovies['romance'][] = $movie;

                    foreach ($arrayRatingsScienceFiction as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsScienceFiction);
                            unset($arrayRatingsScienceFiction[$wrongKey]);
                        }
                        foreach ($allMovies['romance'] as $romanceMovie) {
                            if (!empty($arrayRatingsRomance)) {
                                if (array_search(max($arrayRatingsRomance), $romanceMovie)) {
                                    $bestMovies['romance'] = $romanceMovie;
                                    $bestMovies['romance']['imageBanner'] = 'images/banners/banner-films-romance.png';
                                }
                            }
                        }
                    }
                    break;
                case 'Terror':
                    $arrayRatingHorror[] = $movie['rating'];
                    $allMovies['terror'][] = $movie;

                    foreach ($arrayRatingsHorror as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsHorror);
                            unset($arrayRatingsHorror[$wrongKey]);
                        }
                        foreach ($allMovies['terror'] as $horrorMovie) {
                            if (!empty($arrayRatingsHorror)) {
                                if (array_search(max($arrayRatingsHorror), $horrorMovie)) {
                                    $bestMovies['terror'] = $horrorMovie;
                                    $bestMovies['terror']['imageBanner'] = 'images/banners/banner-films-horror.png';
                                }
                            }
                        }
                    }
                    break;
                case 'Suspense':
                    $arrayRatingThrillers[] = $movie['rating'];
                    $allMovies['suspense'][] = $movie;

                    foreach ($arrayRatingsThrillers as $key) {
                        if ($key === 'Não avaliado') {
                            $wrongKey = array_search('Não avaliado', $arrayRatingsThrillers);
                            unset($arrayRatingsThrillers[$wrongKey]);
                        }
                        foreach ($allMovies['suspense'] as $thrillersMovie) {
                            if (!empty($arrayRatingsThrillers)) {
                                if (array_search(max($arrayRatingsThrillers), $thrillersMovie)) {
                                    $bestMovies['suspense'] = $thrillersMovie;
                                    $bestMovies['suspense']['imageBanner'] = 'images/banners/banner-films-thrillers.png';
                                }
                            }
                        }
                    }
                    break;
            }
        }
        $reorderAllMovies = [
            'novos' => $allMovies['novos'],
            'ação' => $allMovies['ação'],
            'drama' => $allMovies['drama'],
            'fantasia' => $allMovies['fantasia'],
            'aventura' => $allMovies['aventura'],
            'suspense' => $allMovies['suspense'],
            'romance' => $allMovies['romance'],
            'ficção científica' => $allMovies['ficção científica'],
            'terror' => $allMovies['terror'],


        ];
        $this->view->bestMovies = $bestMovies;
        $this->view->allMovies = $reorderAllMovies;

        // echo '<pre>';
        // print_r($arrayRatingsRomance);
        // echo '</pre>';
        // echo '<pre>';
        // print_r($bestMovies);
        // echo '</pre>';
        $this->render('home/index', 'layout1');
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
                $movie['rating'] = number_format($reviews->calculateRatings($movie['id']), 2, '.');
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
