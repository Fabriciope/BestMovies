<?php
namespace App\Models;

use App\Utils\models\Model;

class Users extends Model{
    protected $id;
    protected $name;
    protected $lastName;
    protected $email;
    protected $password;
    protected $image;
    protected $bio;
    
    /**
     * Método que faz a validação dos dados antes de serem registrados
     *
     * @param string $passwordCS
     * @return array
     */
    public function recordCheck($passwordCS){
        $msgError= [];
        if(!$this->__get('name')){
            $msgError[]= 'Digite seu nome corretamente' ;
        }
        if(!$this->__get('lastName')){
            $msgError[]= 'Digite seu sobrenome corretamente' ;
        }
        if(!$this->__get('email')){
            $msgError[]= 'Digite seu email corretamente' ;
        }
        if(!$this->__get('password')){
            $msgError[]= 'Digite sua senha corretamente' ;
        }
        if($this->__get('password') != $passwordCS){
            $msgError[]= 'Confirme sua senha corretamente' ;
        }

        $query= 'SELECT * FROM users WHERE email = :email';
        $statement= $this->db->prepare($query);
        $statement->bindValue(':email', $this->__get('email'));
        $statement->execute();
        $registeredEmail= $statement->fetchAll();

        if(count($registeredEmail) > 0){
            $msgError[]= 'Este email já está registrado';
        }
        return (array) $msgError;
    }
}