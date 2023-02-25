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
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        $name= filter_input(INPUT_POST, "name");
        $lastName= filter_input(INPUT_POST, "lastName");
        $email= filter_input(INPUT_POST, "emailRegistrar", FILTER_VALIDATE_EMAIL);
        $password= password_hash(filter_input(INPUT_POST, "passwordRegistrar"), PASSWORD_DEFAULT);
        $passwordCS= filter_input(INPUT_POST, "passwordCS");
        $recordCheck= $name && $lastName && $email && $password && $passwordCS && password_verify($passwordCS, $password) ? true :false;
        if($email){
            echo 'verificado';
        }else{
            echo 'nao verificado invalido';
        }
        
        $content= Action::render('home/entrar-registrar', [
            'msgSuccessE' => '',
            'msgErrorE' => '',
            'msgSuccessR' => 'dddd',
            'msgErrorR' => 'ddssd',
        ]);
        return Action::getLayout('Entrar/Registrar', $content, 'layout1');
    }
}