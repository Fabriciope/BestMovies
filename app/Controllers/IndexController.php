<?php
namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

// define('URL', 'http://' . $_SERVER['SERVER_NAME']);




// tirar o indice de sucesso da section entrar pois não será nescessário utiliza-lo

class IndexController{


    public function pageHome(){
        $users= Container::getModel('Users');
        $content= Action::render('home/index', [
            'nome' => 'fabricio',
        ]);
        return Action::getLayout('BestMovies', $content, 'layout1');
    }

    public function pageEntrarRegistrar(){
        $content= Action::render('home/entrar-registrar', [
            'inputName' => '',
            'inputLastName' => '',
            'inputEmailRegister' => '',
            'inputPasswordRegister' => '',
            'inputPasswordCS' => '',
            'msgErrorE' => '',
            'msgSuccessR' => '',
            'msgErrorR' => '',
            'teste'=> 'fabricio'
        ]);
        return Action::getLayout('Entrar/Registrar', $content, 'layout1',);
    }

    /**
     * Método responsável por fazer a validação dos dados enviados por POST, retornando uma resposta visual do status da validação para o usuário, e em seguida registrar o usuário no banco de dados, e depois redirecionar para a pagina 'entrar-registrar'
     *
     * @return string
     */
    public function registerUser(){
        $user= Container::getModel('Users');
        $user->__set('name', filter_input(INPUT_POST, "name"));
        $user->__set('lastName', filter_input(INPUT_POST, "lastName"));
        $user->__set('email', filter_input(INPUT_POST, "emailRegister", FILTER_VALIDATE_EMAIL));
        $user->__set('password', filter_input(INPUT_POST, "passwordRegister"));
        $verificationErrorMessage= $user->recordCheck(filter_input(INPUT_POST, "passwordCS"));

        $msgSuccessR= '';
        $msgErrorR= '';
        if(count($verificationErrorMessage) > 0){
            $msgErrorR= $verificationErrorMessage[0];
        }else{
            //Antes de fazer o registro do usuário, fazer a conversão da senha para password_hash()
            // $user->registerUser();
            $msgSuccessR= 'Parabéns! Você foi registrado com seucesso.';
        }
        $content= Action::render('home/entrar-registrar', [
            'inputName' => $_POST['name'],
            'inputLastName' => $_POST['lastName'],
            'inputEmailRegister' => $_POST['emailRegister'],
            'inputPasswordRegister' => $_POST['passwordRegister'],
            'inputPasswordCS' => $_POST['passwordCS'],
            'msgErrorE' => '',
            'msgSuccessR' => $msgSuccessR,
            'msgErrorR' => $msgErrorR,
        ]);
        return Action::getLayout('Entrar/Registrar', $content, 'layout1');
    }
}