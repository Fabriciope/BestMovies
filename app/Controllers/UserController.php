<?php

namespace App\Controllers;

use App\Utils\controller\Action;
use App\Utils\models\Container;

class UserController extends Action
{

    public function pageProfile()
    {
        Action::validateUser();

        $user = Container::getModel('Users');
        $userData = $user->retrieveUserData($_SESSION['userID'], $_SESSION['username']);

        $this->view->teste= 'acho que deu certo agr';
        
        $this->render('user/profile', 'layout1');
    }
}
