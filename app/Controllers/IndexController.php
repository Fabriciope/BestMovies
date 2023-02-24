<?php
namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

// define('URL', 'http://' . $_SERVER['SERVER_NAME']);

class IndexController{


    public function home(){
        $users= Container::getModel('Users');
        $text= $users->retornar();
        $content= Action::render('home/index', [
            'nome' => 'fabricio',
            'teste' => $text
        ]);
        return Action::getLayout('layout 111', $content, 'layout1');
    }
}