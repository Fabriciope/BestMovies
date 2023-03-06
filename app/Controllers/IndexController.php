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
        $recentMovies = $movies->retrieveRecentMovies();

        $this->view->recentMovies = $recentMovies;
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
