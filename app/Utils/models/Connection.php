<?php

namespace App\Utils\models;

class Connection
{

    /**
     * Método responsável por retornar a conexão com o banco de dados.
     *
     * @return \PDO
     */
    public static function getDB()
    {
        $host = 'localhost';
        $port = 3306;
        $dbName = 'bestmovies';
        $user = 'root';
        $pass = 'blablabla';
        try {
            $conn = new \PDO("mysql:host=$host;port=$port;dbname=$dbName;charset=utf8", $user, $pass);
            return $conn;
            // Habilitar erros PDO
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        } catch (\PDOException $e) {
            echo 'erro ao conectar com o banco de dados.Erro: ' . $e->getMessage();
        }
    }
}
