<?php

namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;


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
                $movie['rating'] = 0;
            } else {
                $movie['rating'] = number_format($reviews->calculateRatings($movie['id']), 1, '.');
            }
            $allMovies['Novos'][] = $movie;
        }

        $bestMovies = [];
        foreach ($allMovies['Novos'] ?? [] as $movie) {

            $category = $movie['category'];
            $allMovies[$category][] = $movie;
        }

        foreach ($allMovies as $category => $movies) {
            uasort($movies, function ($a, $b){
                if ($a['rating'] === $b['rating']) return 0;
                return $a['rating'] < $b['rating'] ? 1 : -1;
             });
             $bestMovies[$category] = $movies[array_key_first($movies)];
             $imageName = strtolower(str_replace(' ', '-', $category));
             $bestMovies[$category]['imageBanner'] = 'images/banners/banner-' . $imageName . '.png';
             if ($bestMovies[$category]['rating'] === 0 || $category === 'Novos'){
                unset($bestMovies[$category]);
             }
        }
        $reorderAllMovies = [
            'novos' => $allMovies['Novos'],
            'ação' => $allMovies['Ação'],
            'drama' => $allMovies['Drama'],
            'fantasia' => $allMovies['Fantasia'],
            'aventura' => $allMovies['Aventura'],
            'suspense' => $allMovies['Suspense'],
            'romance' => $allMovies['Romance'],
            'ficção científica' => $allMovies['Ficção científica'],
            'terror' => $allMovies['Terror'],
            ];
        $this->view->bestMovies = $bestMovies;
        $this->view->allMovies = $reorderAllMovies;
        $this->render('home/index', 'layout');
    }

    public function search()
    {
        session_start();

        $movies = Container::getModel('Movies');
        $movies->__set('title', filter_input(INPUT_GET, "search"));

        $foundMovies = $movies->search();

        if (count($foundMovies) === 0 || !filter_input(INPUT_GET, "search")) {
            $this->view->notFound = 'Não encontramos nenhum filme para esta busca, ';
            $this->view->search = $_GET['search'];
            $this->render('movie/search', 'layout');
        }

        $reviews = Container::getModel('Reviews');
        $moviesSearchedWithNote = [];
        foreach ($foundMovies as $movie) {

            if ($reviews->calculateRatings($movie['id']) === false) {
                $movie['rating'] = 'Não avaliado';
            } else {
                $movie['rating'] = number_format($reviews->calculateRatings($movie['id']), 1, '.');
            }
            $moviesSearchedWithNote[] = $movie;
        }

        $this->view->search = $_GET['search'];
        $this->view->foundMovies = $moviesSearchedWithNote;
        $this->render('movie/search', 'layout');
    }

    /**
     * Método responsável por redirecionar para a página de entrar/registrar.
     *
     * @return void
     */
    public function pageEnterRegister()
    {
        session_start();
        if (isset($_SESSION['userID']) || !empty($_SESSION['userID']) || isset($_SESSION['username']) || !empty($_SESSION['username'])) {
            header('location: /profile');
        }
        $this->render('home/enter-register', 'layout');
    }

    public function pageAboutUs()
    {
        session_start();
        $this->render('home/about-us', 'layout');
    }
}
