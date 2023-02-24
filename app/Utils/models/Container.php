<?php
namespace App\Utils\models;

use App\Utils\models\Connection;

class Container{
    
    public static function getModel($model){
        $class= "\\App\\Models\\" . ucfirst($model);
        $conn= Connection::getDB();
        return new $class($conn);
    }
}