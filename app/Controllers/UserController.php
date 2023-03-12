<?php

namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

class UserController extends Action
{
    /**
     * Método responsável por retornar a página de perfil do usuário como todos os dados necessários já renderizados.
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

        $this->view->userData = $userData;

        $this->render('user/profile', 'layout1');
    }

    /**
     * Método reponsável por instânciar o model Users e chamar o método que atualiza os dados de nome e sobrenome do usuário.
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

        $verificationErrorMessage = $user->checkFirstNameAndLastName();

        if (count($verificationErrorMessage) > 0) {
            $this->view->msgUpdateNameError= $verificationErrorMessage[0];
            $this->pageProfile();
        } else {
            $update = $user->updateFirstNameAndLastName($_SESSION['username']);
            $_SESSION['username'] = trim($user->__get('name'));
            $this->view->msgUpdateNameSuccess = 'Seu nome e sobrenome foram alterados com sucesso!';
            // header('location: /perfil');
            $this->pageProfile();
        }

        header('location: /perfil');
    }

    /**
     * Método responsável por alterar a senha do usuário.
     *
     * @return void
     */
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

            $updateImage = $user->updateProfileImage($_FILES['profile-image']['type'], $_FILES['profile-image']['tmp_name'], $oldImage);
            
            switch ($updateImage) {
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

    /**
     * Método responsável por excluir a imagem de perfil do usuário.
     *
     * @return void
     */
    public function deleteProfileImage()
    {
        session_start();

        $user= Container::getModel('Users');

        $user->__set('id', $_SESSION['userID']);
        $user->__set('name', $_SESSION['username']);

        $userData = $user->retrieveUserData($_SESSION['userID'], $_SESSION['username']);
        $currentImage = $userData['image'];

        $user->deleteProfileImage($currentImage);

        $this->view->msgDeleteProfileImageSuccess = 'Imagem excluída com secusso!';
        $this->pageProfile();
    }

    /**
     * Método responsável por alterar a texto da biográfio do usuário.
     *
     * @return void
     */
    public function updateAboutYou()
    {
        session_start();
        // echo filter_input(INPUT_POST, "aboutYou");
        $user= Container::getModel('Users');
        $user->__set('id', $_SESSION['userID']);
        $user->__set('name', $_SESSION['username']);
        $user->__set('bio', filter_input(INPUT_POST, "aboutYou"));

        $user->updateAboutYou();

        $this->view->msgUpdateAboutYouSuccess = 'bio alterada com sucesso.';
        $this->pageProfile();
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

    public function pageProfileUser()
    {
        session_start();
        
        $userID = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        $user = Container::getModel('Users');
        $user->__set('id', $userID);
        $userData = $user->retrieveUser();

        if (!$userID || empty($userData)) {
            header('location: /home');
        }

        $movie = Container::getModel('Movies');

        $userMovies = $movie->recoverUserMovies($userID);

        $reviews = Container::getModel('Reviews');
        $userMoviesWithRating = [];
        foreach ($userMovies as $movie) {
            if ($reviews->calculateRatings($movie['id']) === false) {
                $movie['rating'] = 'Não avaliado';
            } else {
                $movie['rating'] = number_format($reviews->calculateRatings($movie['id']),2,'.') ;
            }
            $userMoviesWithRating[] = $movie;
        }

        $this->view->userMovies = $userMoviesWithRating;
        $this->view->userData = $userData;
        $this->render('user/profile-user', 'layout1');

        // echo '<pre>';
        // print_r($userData);
        // echo '</pre>';
        // echo '<pre><br><br>';
        // print_r($userMovies);
        // echo '</pre>';
    }
}
