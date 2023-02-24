<?php
namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

// define('URL', 'http://' . $_SERVER['SERVER_NAME']);




// tirar o indice de sucesso da section entrar pois não será nescessário utiliza-lo

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

    public function pageEntrarRegistrar(){
        $content= Action::render('home/entrar-registrar', [
            'msgSuccessE' => '',
            'msgErrorE' => '',
            'msgSuccessR' => '',
            'msgErrorR' => '',
            'teste'=> 'fabricio'
        ]);
        return Action::getLayout('Entrar/Registrar', $content, 'layout1',);
    }

    public function registerUser(){

        $content= Action::render('home/entrar-registrar', [
            'msgSuccessE' => '',
            'msgErrorE' => '',
            'msgSuccessR' => 'dddd',
            'msgErrorR' => 'ddssd',
        ]);
        return Action::getLayout('Entrar/Registrar', $content, 'layout1');
    }
}