<?php

namespace App\Utils\models;

use App\Utils\models\Connection;

class Container
{

    /**
     * Método responsável por instanciar algum model e fazer a conexão com o banco de dados.
     *
     * @param string $model
     * @return obj
     */
    public static function getModel(string $model)
    {
        $class = "\\App\\Models\\" . ucfirst($model);
        $conn = Connection::getDB();
        return new $class($conn);
    }
}
