<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Core\helper;
use App\Models\Task;
use App\Models\User;
use App\Models\Category;

class UserController extends BaseController
{

    private $_renderBase;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
    }


    public function userInfo()
    {  
        $user = new User();
        $id = $_SESSION['user']['id'] ?? "";
       
        $data=$user->getOne('id',$id);
     
      
        if(isset($_POST['btn_edit_info'])){
           
             $user_name = $_POST['user_name'];
             $user_phone = $_POST['user_phone'];
             $user_address = $_POST['user_address'];
            //  $user_email = $_POST['user_email'];
            //  $users = $user->LoginEmail($user_email);
  
            if(!preg_match('/^(0[0-9]{9})$/', $user_phone)){
                $error = new helper;
                $error->showError('Số điện thoại không hợp lệ', 'danger');
                header('location:' . ROOT_URL . '?url=UserController/userInfo');
            }elseif($user_phone==""||$user_name==""||$user_address=="")
            {   
                $error = new helper;
                $error->showError('không được để trống các trường', 'danger');
                header('location:' . ROOT_URL . '?url=UserController/userInfo');

            }
            else{
                $data = [
                    'user_name' => $user_name,
                    'user_address' => $user_address,
                    'user_phone' => $user_phone,
                   
                ]; 
               $result= $user->updateUser($id,$data);
                if ($result) {
                   
                    header('location:' . ROOT_URL . '?url=UserController/userInfo');
                    
                } else {
                    echo ('khong cập nhật');
                }
               

            }
                     
          }
           
        
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderSidebar();
        $this->load->render('layouts/PageUserInfo',$data);
        $this->_renderBase->renderFooter();
    }
  


}