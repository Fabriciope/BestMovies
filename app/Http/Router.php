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
            'action' => 'home',
        ); 
        $this->setRoutes($routes);
    }
}