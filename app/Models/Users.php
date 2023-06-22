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
     * Mètodo responsável por retornar os dados de uma determinado usuário.
     *
     * @return array
     */
    public function retrieveUser()
    {
        try {
            $query = 'SELECT *
                      FROM users
                      WHERE id = :id';
    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();
    
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    /**
     * Método que faz a validação dos dados antes de serem registrados.
     *
     * @param string $passwordCS
     * @return array
     */
    public function checkUserData($passwordCS)
    {
        $msgError = [];

        if (!$this->name) {
            $msgError[] = 'Digite o seu nome';
        }
        if (!$this->lastName) {
            $msgError[] = 'Digite o seu sobrenome';
        }
        if (!$this->email) {
            $msgError[] = 'Digite seu email corretamente';
        }
        if (!$this->password) {
            $msgError[] = 'Digite sua senha corretamente';
        }
        if ($this->password != $passwordCS) {
            $msgError[] = 'A confirmação das senhas estão incorretas';
        }

        $query = 'SELECT *
                  FROM users
                  WHERE email = :email';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();

        $registeredEmail = $stmt->fetchAll();

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
        try {
            $query = 'INSERT INTO users  (name, lastname, email, password) 
                                  VALUES (:name, :lastname, :email, :password)';
        
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':name', ucfirst(trim($this->name)));
            $stmt->bindValue(':lastname', ucfirst(trim($this->lastName)));
            $stmt->bindValue(':email', trim($this->email));
            $stmt->bindValue(':password', password_hash(trim($this->password), PASSWORD_DEFAULT));
            $stmt->execute();
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    /**
     * Método responsável por fazer a autenticação do usuário com os dados vindo do POST, e retornar um array que indicará o estado da autenticação.
     *
     * @return array
     */
    public function authenticateUser()
    {
        try {
            $query = 'SELECT *
                      FROM users
                      WHERE email = :email';
    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':email', trim($this->email));
            $stmt->execute();
    
            $userData = (array) $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
            if (count($userData) == 0) {
                $userValidation[] = 'Email não registrado';
            }
    
            if (@!password_verify(trim($this->password), @$userData[0]['password'])) {
                $userValidation[] = 'Senha inválida';
            } else {
                $userValidation['userData'] = $userData[0];
            }
    
            return $userValidation;
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
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
        try {
            $query = 'SELECT *
                      FROM users
                      WHERE id = :id AND name = :name';
    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $userID);
            $stmt->bindValue(':name', $username);
            $stmt->execute();
            return (array) $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    public function checkFirstNameAndLastName()
    {
        $msgError = [];

        if (!$this->name) {
            $msgError[] = 'Digite um nome.';
        }

        if (!$this->lastName) {
            $msgError[] = 'Digite um sobrenome.';
        }
        return $msgError;
    }

    /**
     * Método responsável por fazer a atualização dos dados do usuário no banco de dados.
     *
     * @param string $username
     * @return void
     */
    public function updateFirstNameAndLastName(string $username)
    {
        try {
            $query = 'UPDATE users
                    SET name = :newName,
                        lastname = :newLastName
                    WHERE id = :id AND name = :name';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':newName', ucfirst(trim($this->name)));
            $stmt->bindValue(':newLastName', trim($this->lastName));
            $stmt->bindValue(':id', $this->id);
            $stmt->bindValue(':name', $username);
            $stmt->execute();
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    /**
     * Método responsável por fazer a validação dos dados antes de fazer a alteração da senha.
     *
     * @param string $newPasswordCS  
     * @return array
     */
    public function checkUpdatePassword($newPasswordCS)
    {
        $msgError = [];

        if (!$this->password) {
            $msgError[] = 'Insira sua nova senha.';
        }

        if (!$newPasswordCS) {
            $msgError[] = 'Confirme sua senha.';
        }

        if ($this->password != $newPasswordCS) {
            $msgError[] = 'A confirmação das senhas estão incorretas.';
        }

        return $msgError;
    }

    /**
     * Método responsável por fazer a alteração da senha do usuário no banco de dados.
     *
     * @return void
     */
    public function updatePassword()
    {
        try {
            $query = 'UPDATE users
                     SET password = :newPassword
                     WHERE id = :id AND name = :name';
    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':newPassword', password_hash($this->password, PASSWORD_DEFAULT));
            $stmt->bindValue(':id', $this->id);
            $stmt->bindValue(':name', $this->name);
            $stmt->execute();
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    /**
     * Método responsável por inserir ou alterar a imagem de perfil do usuário.
     *
     * @param string $fileType
     * @param string $temporaryName
     * @param string $oldImage
     * @return string
     */
    public function updateProfileImage($fileType, $temporaryName, $oldImage)
    {
        try {
            $allowedFiles = ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG'];
            $allowedFileTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            $fileExtension = pathInfo($this->image, PATHINFO_EXTENSION);
    
            if (in_array($fileExtension, $allowedFiles) && in_array($fileType, $allowedFileTypes)) {
                $imageName = 'images/users/' . bin2hex(random_bytes(5)) . $this->image;
    
                $query = 'UPDATE users 
                          SET image = :image 
                          WHERE id = :id AND name = :name';
    
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':id', $this->id);
                $stmt->bindValue(':name', $this->name);
                $stmt->bindValue(':image', $imageName);
                $stmt->execute();
    
                @unlink(__DIR__ . './../../public/' . $oldImage);
                move_uploaded_file($temporaryName, $imageName);
                
                return 'success';
                exit;
            } else {
                return 'unsupportedFile';
                exit;
            }
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
    }

    /**
     * Método responsável por excluir a imagem de perfil do usuário no banco de dados e deixa-lá como null.
     *
     * @param string $currentImage
     * @return void
     */
    public function deleteProfileImage($currentImage)
    {
        try {
            $query = 'UPDATE users
                    SET image = null
                    WHERE id = :id AND name = :name ';
    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $this->id);
            $stmt->bindValue(':name', $this->name);
            $stmt->execute();
    
            @unlink(__DIR__ . './../../public/' . $currentImage);
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
        
    }

    /**
     * Método responsável fazer a alteração do texto de biografia do usuário no banco de dados.
     *
     * @return void
     */
    public function updateAboutYou()
    {
        try {
            $query = 'UPDATE users
                      SET bio = :newBio
                      WHERE id = :id AND name = :name';
    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':newBio', ucfirst(trim($this->bio)));
            $stmt->bindValue(':id', $this->id);
            $stmt->bindValue(':name', $this->name);
            $stmt->execute();
        } catch (\PDOException $exception) {
            header("Location: http://localhost:8000/");
        }
        
    }
}
