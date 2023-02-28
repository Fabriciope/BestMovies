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
        $routes['page_entrar_registrar'] = array(
            'route' => '/entrar-registrar',
            'controller' => 'IndexController',
            'action' => 'pageEnterRegister',
        );
        $routes['register'] = array(
            'route' => '/registrar',
            'controller' => 'AuthController',
            'action' => 'registerUser',
        );
        $routes['page_profile'] = array(
            'route' => '/perfil',
            'controller' => 'UserController',
            'action' => 'pageProfile',
        );
        $routes['authenticate_user'] = array(
            'route' => '/authenticate-user',
            'controller' => 'AuthController',
            'action' => 'authenticateUser',
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
        $this->setRoutes($routes);
    }
}
