<?php

namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

class UserController extends Action
{
    /**
     * Método responsável por retornar a página de perfil do usuário.
     *
     * @return void
     */
    public function pageProfile()
    {
        Action::validateUser();

        $user = Container::getModel('Users');
        $userData = $user->retrieveUserData($_SESSION['userID'], $_SESSION['username']);

        // $this->view->userData= $userData;
        
        $this->render('user/profile', 'layout1');
    }

    /**
     * Método responsável por fazer o logout(sair) do usuário e depois direciona-lo para a página principal(home);
     *
     * @return void
     */
    public function logout(){
        session_start();
        session_destroy();
        header('location: /home');
    }
}
