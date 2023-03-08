<?php

namespace App\Http;

use App\Utils\Init\Bootstrap;

class Router extends Bootstrap
{

    /**
     * Método responsável por fazer a inicialização das rotas do sistema.
     *
     * @return void
     */
    public function initRoutes()
    {
        $index = $this->getUrl() == '/' || $this->getUrl() == '/home' ? $this->getUrl() : null;
        $routes['page_home'] = array(
            'route' => $index,
            'controller' => 'IndexController',
            'action' => 'pageHome',
        );

        //PAGE ENTER_REGISTER
        $routes['page_entrar_registrar'] = array(
            'route' => '/enter-register',
            'controller' => 'IndexController',
            'action' => 'pageEnterRegister',
        );
        $routes['register'] = array(
            'route' => '/register',
            'controller' => 'AuthController',
            'action' => 'registerUser',
        );
        $routes['authenticate_user'] = array(
            'route' => '/authenticate-user',
            'controller' => 'AuthController',
            'action' => 'authenticateUser',
        );

        //PAGE PROFILE
        $routes['page_profile'] = array(
            'route' => '/profile',
            'controller' => 'UserController',
            'action' => 'pageProfile',
        );
        $routes['logout'] = array(
            'route' => '/logout',
            'controller' => 'UserController',
            'action' => 'logout',
        );
        $routes['update-name-lastName'] = array(
            'route' => '/update-name-lastName',
            'controller' => 'UserController',
            'action' => 'updateNameLastName',
        );
        $routes['update-profile-image'] = array(
            'route' => '/update-profile-image',
            'controller' => 'UserController',
            'action' => 'updateProfileImage',
        );
        $routes['delete-profile-image'] = array(
            'route' => '/delete-profile-image',
            'controller' => 'UserController',
            'action' => 'deleteProfileImage',
        );
        $routes['update-password'] = array(
            'route' => '/update-password',
            'controller' => 'UserController',
            'action' => 'updatePassword',
        );
        $routes['update-about-you'] = array(
            'route' => '/update-about-you',
            'controller' => 'UserController',
            'action' => 'updateAboutYou',
        );


        $routes['page_register_movie'] = array(
            'route' => '/page-register-movie',
            'controller' => 'MoviesController',
            'action' => 'pageRegisterMovie',
        );
        $routes['register_movie'] = array(
            'route' => '/register-movie',
            'controller' => 'MoviesController',
            'action' => 'registerMovie',
        );
        $routes['page-my-movies'] = array(
            'route' => '/my-movies',
            'controller' => 'MoviesController',
            'action' => 'pageMyMovies',
        );
        $routes['page-movie'] = array(
            'route' => '/movie',
            'controller' => 'ReviewsController',
            'action' => 'pageMovie',
        );


        $routes['destroy-movie'] = array(
            'route' => '/destroy-movie',
            'controller' => 'MoviesController',
            'action' => 'destroyMovie',
        );
        $routes['page-edit-movie'] = array(
            'route' => '/page-edit-movie',
            'controller' => 'MoviesController',
            'action' => 'pageEditMovie',
        );
        $routes['edit-movie'] = array(
            'route' => '/edit-movie',
            'controller' => 'MoviesController',
            'action' => 'editMovie',
        );


        $routes['page-profile-user'] = array(
            'route' => '/profile-user',
            'controller' => 'UserController',
            'action' => 'pageProfileUser',
        );


        $routes['register-new-assessments'] = array(
            'route' => '/register-new-assessments',
            'controller' => 'ReviewsController',
            'action' => 'registerNewAssessments',
        );
        $this->setRoutes($routes);
    }
}
