<?php
namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

// define('URL', 'http://' . $_SERVER['SERVER_NAME']);

class IndexController{


    public function pageHome(){
        $users= Container::getModel('Users');
        $text= $users->retornar();
        $content= Action::render('home/index', [
            'nome' => 'fabricio',
            'teste' => $text
        ]);
        return Action::getLayout('BestMovies', $content, 'layout1');
    }

    public function pageEntrarCadastrar(){
        $content= Action::render('home/entrar-cadastrar', [
            'teste'=> 'fabricio'
        ]);
        return Action::getLayout('Entrar/Cadastrar', $content, 'layout1');
    }
}