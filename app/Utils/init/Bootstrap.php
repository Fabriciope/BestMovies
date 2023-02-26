<?php

namespace App\Utils\init;


abstract class Bootstrap
{
    private $routes;

    abstract protected function initRoutes();

    /**
     * Método construtor que é o "coração" da aplicação, ele é responsável por iniciar as rotas do sistema e fazer a instância de algum controller de acordo com a rota atual, e depois "chamar" o método desse controller.
     */
    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    /**
     * Método responsável por retornar o atributo que contém o array das rotas.
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Método responsável por definir as rotas do sistema.
     *
     * @param array $routes
     * @return void
     */
    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Método responsável por retornar o path da url atual.
     *
     * @return string
     */
    public function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * Método responsável por fazer a instanciação de algum controller de acordo com a rota(url=path), e depois "rodar" um método específico daquele controller.
     *
     * @param sting $url
     * @return void
     */
    public function run($url)
    {
        foreach ($this->getRoutes() as $route) {
            if ($url == $route['route']) {
                $class = '\\App\\Controllers\\' . ucfirst($route['controller']);
                $controller = new $class;
                $action = $route['action'];
                $controller->$action();
            }
        }
    }
}
