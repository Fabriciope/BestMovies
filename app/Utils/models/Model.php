<?php
namespace App\Utils\models;

class Model{
    protected $db;

    /**
     * Metodo construtor responsável por colocar a conexão com o banco de dados no atributo $db
     *
     * @param \PDO $conn
     */
    public function __construct(\PDO $conn){
        $this->db= $conn;
    }

    /**
     * Metodo responsável por definir os valores dos atributos da classe
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, $value){
        $this->$name= $value;
    }

    /**
     * Metodo responsável por retornar alguem atributo da classe
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name){
        return $this->$name;
    }
}