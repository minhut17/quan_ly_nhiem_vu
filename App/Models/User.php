<?php
namespace App\Models;
use \PDO;


class User extends BaseModel{

    
    function __construct(){
        parent::__construct();
    }

    protected $table = 'users';

    
    public function getAllUser()
    {
        return $this->getAll();
    }
    public function getOneUser($id)
    {
        return $this->getOne('id',$id);
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deleteUser($id)
    {
        return $this->delete($id);
    }


    public function createUser($data){
        return $this->create($data);
    }
    public function checkmail($user_email)
    {
    //    return $this->checkmailn($user_email);
    return $this->getOne('user_email',$user_email);
    }
    public function getOTP($user_email){
        return $this->getOTPn($user_email);
        
    }
    public function resetPass($pass,$otp){
        return $this->resetPassn($pass,$otp);
    }
    public function checkEmail($email){
        return $this->getOne('user_email', $email);
       
}
}