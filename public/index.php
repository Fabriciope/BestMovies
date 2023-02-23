<?php
require_once __DIR__ . "./../vendor/autoload.php";

new App\Http\Router;

echo '<pre>';
print_r($_SERVER);
echo '</pre>';
echo 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']);


if(file_exists('http://localhost/css/layout1.css')){
    echo 'existe';
}else{
    echo 'pqp mlk burro';
    echo __DIR__;
}