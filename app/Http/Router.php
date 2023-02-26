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
        $this->setRoutes($routes);
    }
}
