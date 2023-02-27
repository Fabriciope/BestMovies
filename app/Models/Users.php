<?php

namespace App\Models;

use App\Utils\models\Model;

class Users extends Model
{
    protected $id;
    protected $name;
    protected $lastName;
    protected $email;
    protected $password;
    protected $image;
    protected $bio;

    /**
     * Método que faz a validação dos dados antes de serem registrados.
     *
     * @param string $passwordCS
     * @return array
     */
    public function checkUserData($passwordCS)
    {
        $msgError = [];

        if (!$this->__get('name')) {
            $msgError[] = 'Digite o seu nome';
        }
        if (!$this->__get('lastName')) {
            $msgError[] = 'Digite o seu sobrenome';
        }
        if (!$this->__get('email')) {
            $msgError[] = 'Digite seu email corretamente';
        }
        if (!$this->__get('password')) {
            $msgError[] = 'Digite sua senha corretamente';
        }
        if ($this->__get('password') != $passwordCS) {
            $msgError[] = 'A confirmação das senhas estão incorretas';
        }

        $query = 'SELECT * FROM users WHERE email = :email';

        $statement = $this->db->prepare($query);
        $statement->bindValue(':email', $this->__get('email'));
        $statement->execute();

        $registeredEmail = $statement->fetchAll();

        if (count($registeredEmail) > 0) {
            $msgError[] = 'Este email já está registrado';
        }

        return $msgError;
    }

    /**
     * Método responsável por fazer o registro do usuário no banco de dados.
     *
     * @return void
     */
    public function registerUser()
    {

        $query = 'INSERT INTO users (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)';

        $statement = $this->db->prepare($query);
        $statement->bindValue(':name', ucfirst(trim($this->__get('name'))));
        $statement->bindValue(':lastname', ucfirst(trim($this->__get('lastName'))));
        $statement->bindValue(':email', trim($this->__get('email')));
        $statement->bindValue(':password', password_hash(trim($this->__get('password')), PASSWORD_DEFAULT));

        if (!$statement->execute()) {
            echo 'Erro ao inserir um novo registro no banco de dados';
            echo '<pre>';
            print_r($statement->errorInfo());
            echo '</pre>';
            die();
        }
    }

    /**
     * Método responsável por fazer a autenticação do usuário com os dados vindo do POST, e retornar um array que indicará o estado da autenticação.
     *
     * @return mixed
     */
    public function authenticateUser()
    {
        $query = 'SELECT * FROM users WHERE email = :email';

        $statement = $this->db->prepare($query);
        $statement->bindValue(':email', trim($this->__get('email')));

        if (!$statement->execute()) {
            echo 'Erro ao autenticar o usuário';
            echo '<pre>';
            print_r($statement->errorInfo());
            echo '</pre>';
            die();
        }

        $userData = (array) $statement->fetchAll(\PDO::FETCH_ASSOC);

        if(count($userData) == 0){
            $userValidation[]= 'Email não registrado';
        }

        if (!password_verify(trim($this->__get('password')), @$userData[0]['password'])) {
            $userValidation[]= 'Senha inválida';
        }else{
            $userValidation['userData']= $userData[0];
        }

        return $userValidation;
    }

    /**
     * Método responsável por recuperar as informações do usuário logado pela session.
     *
     * @param string $userID
     * @param string $username
     * @return array
     */
    public function retrieveUserData($userID, $username)
    {
        $query = 'SELECT * FROM users WHERE id = :id AND name = :name';

        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $userID);
        $statement->bindValue(':name', $username);
        $statement->execute();
        return (array) $statement->fetch(\PDO::FETCH_ASSOC);
    }
}
