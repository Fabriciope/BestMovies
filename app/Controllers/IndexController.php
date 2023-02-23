<?php
namespace App\Controllers;

use App\Utils\controller\Action;

define('URL', 'http://' . $_SERVER['SERVER_NAME']);

class IndexController{


    public function home(){
        $content= Action::render('home/index', [
            'nome' => 'fabricio',
            'url' => URL
        ]);
        return Action::getLayout('layout 111', $content, 'layout1');
    }
}