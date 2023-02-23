<?php
namespace App\Utils\init;


abstract class Bootstrap{
    private $routes;

    abstract protected function initRoutes();

    public function __construct(){
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    public function getRoutes(){
        return $this->routes;
    }
    public function setRoutes(array $routes){
        $this->routes= $routes;
    }

    public function getUrl(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function run($url){
        foreach($this->getRoutes() as $route){
            if($url == $route['route']){
                $class= '\\App\\Controllers\\' . ucfirst($route['controller']);
                $controller= new $class;
                $action= $route['action'];
                echo $controller->$action();
            }

        }
    }
    


}