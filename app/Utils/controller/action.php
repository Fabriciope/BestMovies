<?php

namespace App\Utils\controller;


abstract class Action
{
    protected $view;

    /**
     * Método construtor responsável por instânciar um objeto vazio para ser usado nas views.
     */
    public function __construct()
    {
        $this->view = new \stdClass();
    }

    /**
     * Método reponsável por retornar alguma página ou um layout, de acordo com os parâmetros passados.
     *
     * @param string $page
     * @param string $layout
     * @return void
     */
    public function render(string $page, string $layout)
    {
        $this->view->page = $page;
        if (file_exists(__DIR__ . './../../Views/' . $layout . '.php')) {

            require_once __DIR__ . './../../Views/' . $layout . '.php';
        } else {

            $this->getContentView();
            // Retornar a home
            echo 'mds mn to';
            echo $file;
        }
    }

    /**
     * Método responsável por retornar o o conteúdo de alguma view.
     *
     * @return void
     */
    protected function getContentView()
    {
        require_once __DIR__ . './../../Views/' . $this->view->page . '.php';
    }

    /**
     * Método responsável por verificar se o usuário esta logado ou não, se sim, ele irá continuar na página que solicitou, senão será direcionado para a página principal(home).
     *
     * @return void
     */
    public static function validateUser()
    {
        @session_start();
        if (!isset($_SESSION['userID']) || empty($_SESSION['userID']) || !isset($_SESSION['username']) || empty($_SESSION['username'])) {
            header('location: /home');
        }
    }
}
