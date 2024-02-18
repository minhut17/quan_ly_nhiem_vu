<?php

namespace App\Controllers;

session_start();

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Core\helper;
use App\Core\Mail;
use App\Models\User;
use App\Models\Database;
use PDO;

class HomeController extends BaseController
{

    private $_renderBase;
    protected $_connection;
    protected $_helper;


    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->_connection = new Database();
        $this->_helper = new helper();
    }

    function HomeController()
    {
        $this->Login();
    }
    public function Login()
    {


        if (isset($_SESSION['user'])) {
            header('location:' . ROOT_URL . '?url=HomeController/homePage');
        } else {
            $this->load->render('componest/login');
        }

    }

    public function LoginUser()
    {


        if (isset($_POST['submitLogin'])) {
            $email = $_POST['email'];
            $pwd = $_POST['password'];
            if($email=='' ||$pwd ==""){
                $error = new helper;
                $error->showError('bạn không được bỏ trống','danger');
                header('location:' . ROOT_URL . '?url=HomeController/Login');
                return;

            }
            // Kết nối đến cơ sở dữ liệu (giả sử bạn đã có đối tượng $db)

            $stmt = $this->_connection->pdo()->prepare("SELECT * FROM users WHERE user_email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!empty($user)) {
                // var_dump($user['user_password']);
                $checkpwd = password_verify($pwd, $user['user_password']);
                if ($checkpwd == false) {
                    $stmt = null;
                   
                    $error = new helper;
                    $error->showError('Email hoặc passworl không khớp','danger');
                    header('location:' . ROOT_URL . '?url=HomeController/Login');
                    return;

                } else {
                    $_SESSION['user'] = $user;
                    // $this->_helper->setMsg('Đăng nhập thành công ', 'success');
                    header('location:' . ROOT_URL . '?url=HomeController/homePage');
                    // return $this->_helper;


                }
            } else {
                // $this->_helper->setMsg('mật khẩu hoặc passworl không đúng', 'error');
                $error = new helper;
                $error->showError('Email hoặc passworl không khớp','danger');
                header('location:' . ROOT_URL . '?url=HomeController/Login');
            }

        }

    }
    public function logout()
    {


        unset($_SESSION['user']);
        $error = new helper;
        $error->showError('Đăng Xuất Thành Công','success');
        header('location:' . ROOT_URL . '?url=HomeController/Login');
    }

    function homePage()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $data = [
            'mes' => $this->_helper->display()

        ];

        if(isset($_SESSION['user'])){
            $this->_renderBase->renderHeader();
            $this->_renderBase->renderSidebar();
    
            // $this->load->render('layouts/client/slider');
            $this->load->render('layouts/pageHome', $data);
            $this->_renderBase->renderFooter();

        }else{
               $error = new helper;
                $error->showError('Bạn chưa Đăng Nhập','warning');
                header('location:' . ROOT_URL . '?url=HomeController/Login');
        }

       
    }

    // function detail($id)
    // {
    //     $data = [
    //         'action' => ROOT_URL . "CategoryController/edit/$id",
    //         "products" => [
    //             [
    //                 "id" => 1,
    //                 "name" => "Sản phẩm"
    //             ]
    //         ]
    //     ];

    //     // dữ liệu ở đây lấy từ repositories hoặc model
    //     $this->load->render('layouts/client/home_product', $data);
    // }
    function register()
    {
        if (isset($_POST['submitRerister'])) {
            
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password1'];
          
            $password2 = $_POST['password2'];
            $pwhash = password_hash($password, PASSWORD_DEFAULT);

            
            $stmt = $this->_connection->pdo()->prepare("SELECT * FROM users WHERE user_email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);


            if($username==""||$email==""||$password==""||$password2==""){
                $error = new helper;
                $error->showError('bạn không được bỏ trống','danger');
                header('location:' . ROOT_URL . '?url=HomeController/register');
                exit;

            }elseif($password < 3 ||$password2 <3){
                $error = new helper;
                $error->showError('mật khẩu phải lớn hơn 3','danger');
                header('location:' . ROOT_URL . '?url=HomeController/register');
                exit;

            }
            elseif($password !==$password2 ){
                $error = new helper;
                $error->showError('mật khẩu không khớp','danger');
                header('location:' . ROOT_URL . '?url=HomeController/register');
                exit;

            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error = new helper;
                $error->showError('Email không đúng định dạng','danger');
                header('location:' . ROOT_URL . '?url=HomeController/register');
                exit;

            }elseif(!empty($user)){
                $error = new helper;
                $error->showError('Email đã tồn tại','danger');
                header('location:' . ROOT_URL . '?url=HomeController/register');
                exit;

            }else{
                $data = [
                    'user_name' => $_POST['username'],
                    'user_email' => $_POST['email'],
                    'user_password' => $pwhash
                ];
    
    
                $_user = new user();
                $_user->create($data);
                header('location:'.ROOT_URL.'?url=HomeController/login');
    
            }


            

        }

        
        $this->load->render('componest/register');
    }
    public function Error()
    {
        $this->load->render('componest/404');
    }
    public function forgotPass()
    {
    
        if (isset($_POST['forgotPwd'])) {
            $user_email = $_POST['email'];
           
         
            if($user_email==""){
                $error = new helper;
                $error->showError('Email chưa được nhập','danger');
                header('location:' . ROOT_URL . '?url=HomeController/forgotPass');
                 return;
            }if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
                $error = new helper;
                $error->showError('Email Không Hợp Lệ','danger');
                header('location:' . ROOT_URL . '?url=HomeController/forgotPass');
                 return;
            }
            
            $user = new user();
            $result = $user->checkmail($user_email);

            if ($result){
                $token_hash = $user->getOTP($user_email);
                $senderName = "Minh Nhựt";
                $senderEmail = "nhutlmpc05605@fpt.edu.vn";
                $senderEmailPassword = "zczb ehwq dnik eoyq";
                $recieverEmail = $_POST['email'];
                $subject = "Thay đổi mật khẩu";
                $body = "Mã OTP của bạn là: " . $token_hash;

                $mailer = new Mail($senderName, $senderEmail, $senderEmailPassword);
                
                $mailer->sendMail($recieverEmail, $subject, $body);
                header('location:' . ROOT_URL . '?url=HomeController/resetPwd');

            } else {
                $error = new helper;
                $error->showError('Email không tồn tại','danger');
                 header('location:' . ROOT_URL . '?url=HomeController/forgotPass');
                 return;
            
             }
     
    }
  
    $this->load->render('componest/forgotPwd');
   
    }
    public function resetPwd()
    {  
         $user = new user();
        if(isset($_POST['resetPwd'])){
            $pass=$_POST['pass1'];
            $otp=$_POST['otp'];
            if($_POST['pass1']!=$_POST['pass2']){
                $error = new helper;
                $error->showError('mật khẩu không khớp','warning');

            }else{
               $result = $user->resetPass($pass,$otp);
               if($result){
                header('location:' . ROOT_URL . '?url=HomeController/login');
               }else{
                $error = new helper;
                $error->showError('OTP không hợp lại hoặc đã hết hạn ','warning');
               }

            }
        }

       
        $this->load->render('componest/resetPwd');
    }
}
