<?php
namespace App\Http;

use App\Utils\Init\Bootstrap;

class Router extends Bootstrap{

     public function initRoutes(){
        $index= null;
        if($this->getUrl() == '/' || $this->getUrl() == '/home'){
            $index = $this->getUrl();
        }
        $routes['page_home'] = array(
            'route' => $index,
            'controller' => 'IndexController',
            'action' => 'pageHome',
        ); 
        $routes['page_entrar_registrar'] = array(
            'route' => '/entrar-registrar',
            'controller' => 'IndexController',
            'action' => 'pageEntrarRegistrar',
        ); 
        $routes['registrar'] = array(
            'route' => '/registrar',
            'controller' => 'IndexController',
            'action' => 'registerUser',
        ); 
        $this->setRoutes($routes);
    }
}