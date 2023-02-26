<?php

namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

// define('URL', 'http://' . $_SERVER['SERVER_NAME']);




// tirar o indice de sucesso da section entrar pois não será nescessário utiliza-lo

class IndexController extends Action
{



    public function pageHome()
    {
        
        $this->render('home/index','layout1');
    }

    public function pageEnterRegister()
    {

        $this->view->userData = [
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
