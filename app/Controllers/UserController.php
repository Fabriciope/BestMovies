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

        //file or directory names.
        $this->view->imageFileName= isset($userData['image']) ? substr($userData['image'], 23) : 'nome do arquivo.png';
        $this->view->imageDirectoryName= $userData['image'] ?? 'images/users/perfil.png';

        //msg's update name or last name.
        $this->view->msgUpdateNameError = $this->view->msgUpdateNameError ?? '';
        $this->view->msgUpdateNameSuccess = $this->view->msgUpdateNameSuccess ?? '';

        //msg's update password.
        $this->view->msgUpdatePasswordError = $this->view->msgUpdatePasswordError ?? '';
        $this->view->msgUpdatePasswordSuccess = $this->view->msgUpdatePasswordSuccess ?? '';

        //msg's update profile image.
        $this->view->msgUpdateImageError = $this->view->msgUpdateImageError ?? '';
        $this->view->msgUpdateImageSuccess = $this->view->msgUpdateImageSuccess ?? '';

        //msg's delete profile image.
        $this->view->msgDeleteProfileImageError = $this->view->msgDeleteProfileImageError ?? '';
        $this->view->msgDeleteProfileImageSuccess = $this->view->msgDeleteProfileImageSuccess ?? '';

        $this->view->userData = $userData;

        $this->render('user/profile', 'layout1');
    }

    /**
     * Método reponsável por alterar os dados de nome e sobrenome do usuário.
     *
     * @return void
     */
    public function updateNameLastName()
    {
        session_start();
        $user = Container::getModel('Users');
        $user->__set('id', $_SESSION['userID']);
        $user->__set('name', filter_input(INPUT_POST, "newName"));
        $user->__set('lastName', filter_input(INPUT_POST, "newLastName"));

        $verificationErrorMessage = $user->checkUserUpdateData();

        if (count($verificationErrorMessage) > 0) {
            $this->view->msgUpdateNameError= $verificationErrorMessage[0];
            $this->pageProfile();
        } else {
            $update = $user->updateUserData($_SESSION['username']);
            if ($update === 'faiiled') {
                $this->view->msgUpdateNameError = 'Ocorreu algum erro ao atualizar seus dados, tente novamente mais tarde.';
                $this->pageProfile();
            } elseif ($update === 'success') {
                $_SESSION['username'] = trim($user->__get('name'));
                $this->view->msgUpdateNameSuccess = 'Seu nome e sobrenome foram alterados com sucesso!';
                // header('location: /perfil');
                $this->pageProfile();
            }
        }

        header('location: /perfil');
    }

    public function updatePassword()
    {
        session_start();

        $user= Container::getModel('Users');

        

        $user->__set('id', $_SESSION['userID']);
        $user->__set('name', $_SESSION['username']);
        $user->__set('password', filter_input(INPUT_POST, "newPassword"));

        $verificationErrorMessage = $user->checkUpdatePassword(filter_input(INPUT_POST, "newPasswordCS"));

        if (count($verificationErrorMessage) > 0) {
            $this->view->msgUpdatePasswordError = $verificationErrorMessage[0];
            $this->pageProfile();
        } else {
            $this->view->msgUpdatePasswordSuccess = 'Senha alterada com sucesso.';
            $user->updatePassword();
            $this->pageProfile();
        }

    }

    /**
     * Método responsável por alterar a imagem de perfil do usuário.
     *
     * @return void
     */
    public function updateProfileImage()
    {
        if (isset($_FILES['profile-image']) && !empty($_FILES['profile-image']['tmp_name'])) {

            session_start();

            $user = Container::getModel('Users');

            $oldImage= $user->retrieveUserData($_SESSION['userID'], $_SESSION['username'])['image'];
            $user->__set('id', $_SESSION['userID']);
            $user->__set('name', $_SESSION['username']);
            $user->__set('image', $_FILES['profile-image']['name']);

            // $validateImage = $user->validateImage($_FILES['profile-image']['tmp_name']);
            // echo $validateImage;

            $updateImage = $user->updateProfileImage($_FILES['profile-image']['type'], $_FILES['profile-image']['tmp_name'], $oldImage);
            
            switch ($updateImage) {
                case 'executionFailure':
                    $this->view->msgUpdateImageError = 'Error ao inserir sua imagem!';
                    $this->pageProfile();
                    break;
                case 'unsupportedFile':
                    $this->view->msgUpdateImageError = 'Escolha uma imagem .jpeg, .jpg ou .png';
                    $this->pageProfile();
                    break;
                case 'success':
                    $this->view->imageDirectoryName= $user->__get('image');
                    $this->view->msgUpdateImageSuccess = 'Sua imagem foi inserida com sucesso!';
                    $this->pageProfile();
                    break;
            }
        } else {
            $this->view->msgUpdateImageError = 'Insira uma imagem antes de enviar.';
            $this->pageProfile();
        }
    }

    public function deleteProfileImage()
    {
        session_start();

        $user= Container::getModel('Users');

        $user->__set('id', $_SESSION['userID']);
        $user->__set('name', $_SESSION['username']);

        $userData = $user->retrieveUserData($_SESSION['userID'], $_SESSION['username']);
        $currentImage = $userData['image'];

        $deleteImage = $user->deleteProfileImage($currentImage);

        if ($deleteImage === 'executionFailure') {
            $this->view->msgDeleteProfileImageError = 'Erro ao tentar excluir sua imagem, tente novamente mais tarde!';
            $this->pageProfile();
        } elseif($deleteImage === 'success') {
            $this->view->msgDeleteProfileImageSuccess = 'Imagem excluída com secusso!';
            $this->pageProfile();
        }
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
