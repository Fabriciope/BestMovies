<?php

namespace App\Utils\controller;


abstract class Action
{
    protected $view;

    public function __construct()
    {
        $this->view = new \stdClass();
    }


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

    protected function getContentView()
    {
        require_once __DIR__ . './../../Views/' . $this->view->page . '.php';
    }



    public static function validateUser()
    {
        session_start();
        if (!isset($_SESSION['userID']) || empty($_SESSION['userID']) || !isset($_SESSION['username']) || empty($_SESSION['username'])) {
            header('location: /home');
        }
    }
}
