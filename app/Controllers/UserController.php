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

        $this->view->msgUpdateError= $this->view->msgUpdateError ?? '';
        $this->view->msgUpdateSuccess= $this->view->msgUpdateSuccess ?? '';

        $this->view->userData = $userData;

        $this->render('user/profile', 'layout1');
    }

    public function updateNameLastName()
    {
        session_start();
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre><br>';
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre>';
        $user = Container::getModel('Users');
        $user->__set('id', $_SESSION['userID']);
        $user->__set('name', $_POST['newName']);
        $user->__set('lastName', $_POST['newLastName']);

        $update = $user->updateUserData($_SESSION['username']);

        if ($update === 'faiiled') {
            $this->view->msgUpdateError = 'Ocorreu algum erro ao atualizar seus dados, tente novamente mais tarde.';
            $this->pageProfile();
        } elseif ($update === 'success') {
            $_SESSION['username'] = trim($user->__get('name'));
            $this->view->msgUpdateSuccess = 'Seu nome e sobrenome foram alterados com sucesso!';
            // header('location: /perfil');
            $this->pageProfile();
        }

        header('location: /perfil');
    }

    /**
     * Método responsável por fazer o logout(sair) do usuário e depois direciona-lo para a página principal(home);
     *
     * @return void
     */
    public function logout()
    {
        session_start();
        session_destroy();
        header('location: /home');
    }
}
