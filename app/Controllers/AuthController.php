<?php

namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

class AuthController extends Action
{
    
    public function registerUser()
    {
        $user = Container::getModel('Users');
        $user->__set('name', filter_input(INPUT_POST, "name"));
        $user->__set('lastName', filter_input(INPUT_POST, "lastName"));
        $user->__set('email', filter_input(INPUT_POST, "emailRegister", FILTER_VALIDATE_EMAIL));
        $user->__set('password', filter_input(INPUT_POST, "passwordRegister"));
        $verificationErrorMessage = $user->checkUserData(filter_input(INPUT_POST, "passwordCS"));

        $msgErrorR = '';
        if (count($verificationErrorMessage) > 0) {

            $msgErrorR = $verificationErrorMessage[0];

            $this->view->userData= [
                'inputName' => $_POST['name'] ?? '',
                'inputLastName' => $_POST['lastName'] ?? '',
                'inputEmailRegister' => $_POST['emailRegister'] ?? '',
                'inputPasswordRegister' => $_POST['passwordRegister'] ?? '',
                'inputPasswordCS' => $_POST['passwordCS'] ?? '',
                'msgErrorE' => '',
                'msgErrorR' => $msgErrorR,
            ];
            $this->view->msg= [
                'msgErrorE' => '',
                'msgErrorR' => $msgErrorR,
            ];

            $this->render('home/enter-register','layout1');
        } else {

            $user->registerUser();
            $userData = $user->authenticateUser();
            session_start();
            $_SESSION['userID'] = $userData['id'];
            $_SESSION['username'] = $userData['name'];
            header('location: /perfil?sc');
        }
    }
}
