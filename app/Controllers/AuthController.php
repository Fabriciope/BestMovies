<?php

namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

class AuthController extends Action
{
    /**
     * Método responsável por fazer todas as validações dos dados enviados pelo usuário, e caso esses dados estejam corretos, fará o registro no banco de dados, caso contrário, irá direciona-lo para a página de entrar/registrar, retornando a devida mensagem de erro para o usuário.
     *
     * @return void
     */
    public function registerUser()
    {
        $user = Container::getModel('Users');

        $user->name =  filter_input(INPUT_POST, "name");
        $user->lastName =  filter_input(INPUT_POST, "lastName");
        $user->email =  filter_input(INPUT_POST, "emailRegister", FILTER_VALIDATE_EMAIL);
        $user->password =  filter_input(INPUT_POST, "passwordRegister");

        $verificationErrorMessage = $user->checkUserData(filter_input(INPUT_POST, "passwordCS"));

        if (count($verificationErrorMessage) > 0) {

            $this->view->data = [
                'inputName' => $_POST['name'] ?? '',
                'inputLastName' => $_POST['lastName'] ?? '',
                'inputEmailRegister' => $_POST['emailRegister'] ?? '',
                'inputPasswordRegister' => $_POST['passwordRegister'] ?? '',
                'inputPasswordCS' => $_POST['passwordCS'] ?? '',
            ];
            $this->view->msg = [
                'msgErrorR' => $verificationErrorMessage[0] ?? '',
            ];

            $this->render('home/enter-register', 'layout');
        } else {

            $user->registerUser();

            $userValidation = $user->authenticateUser();

            session_start();

            $_SESSION['userID'] = $userValidation['userData']['id'];
            $_SESSION['username'] = $userValidation['userData']['name'];

            header('location: /profile');
        }
    }

    /**
     * Método responsável por fazer a autenticação do usuário, e dependendo dos dados enviados, caso estejam corretos, ele irá para a página de perfil, senão irá voltar para a página entrar/registrar com a devida mensagem de erro.
     *
     * @return void
     */
    public function authenticateUser()
    {
        $user = Container::getModel('Users');

        $user->email =  filter_input(INPUT_POST, "emailEnter", FILTER_VALIDATE_EMAIL);
        $user->password =  filter_input(INPUT_POST, "passwordEnter");

        $userValidation =  $user->authenticateUser();

        if (!isset($userValidation['userData'])) {
            $this->view->data = [
                'inputEmailEnter' => $_POST['emailEnter'] ?? '',
                'inputPasswordEnter' => $_POST['passwordEnter'] ?? '',
            ];
            $this->view->msg = [
                'msgErrorE' => $userValidation[0] ?? '',
            ];
            $this->render('home/enter-register', 'layout');
        } else {

            session_start();
            $_SESSION['userID'] = $userValidation['userData']['id'];
            $_SESSION['username'] = $userValidation['userData']['name'];
            header('location: /profile');
        }
    }
}
