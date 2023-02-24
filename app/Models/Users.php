<?php
namespace App\Models;

use App\Utils\models\Model;

class Users extends Model{
    protected $id;
    protected $name;
    protected $lastname;
    protected $email;
    protected $password;
    protected $image;
    protected $bio;
    
    public function retornar(){
        return 'é serio mfffffffn';
    }
}