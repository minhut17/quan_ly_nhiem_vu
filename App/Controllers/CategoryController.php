<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Core\helper;
use App\Models\Category;

class CategoryController extends BaseController
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

    function index()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model

        $category = new Category();
        $data = $category->getAllCategory();

        // $this->_renderBase->renderHeader();
        // $this->load->render('layouts/client/slider');
        $this->load->render('admin/category/index', $data);
        // $this->_renderBase->renderFooter();
    }

    function create()
    {
        if (isset($_POST['addCata'])) {
        if(($_POST['createCata'])==!""){
            $data = [
                'caterory_name' => $_POST['createCata'],
                'id_user'=>$_SESSION['user']['id']
            ];
            $CreateCata = new Category;
            $result = $CreateCata->create($data);
            if ($result) {
                header('location: ' . ROOT_URL . '?url=CategoryController/list/');
            } else {
                echo 'Hiện lỗi';
            }

        }else{
            $error = new helper;
            $error->showError('dữ liệu không thể để trống', 'danger');
            header('location: ' . ROOT_URL . '?url=CategoryController/list/');

        }
       
    }
      

        
    }
    // function store()
    // {
    //     if (isset($_POST['submit'])) {
    //         // var_dump($_POST);

    //         $data = [
    //             'name' => $_POST['name'],
    //             'description' => $_POST['description'],
    //             'status' => $_POST['status']

    //         ];
    //         $category = new Category();
    //         $result = $category->createCategory($data);
    //         // var_dump($result);
    //         if ($result) {
    //             header('location: ' . ROOT_URL . '?url=CategoryController/index');
    //         } else {
    //             echo 'them loi';
    //         }
    //     } else {
    //         echo 'ko submit';
    //     }
    // }

    function detail($id)
    {
        if (isset($_SESSION['user'])) {

        $user_id = $_SESSION['user']['id'];
        $category = new Category();
        $data = $category->getTasks($id,$user_id);

        // dữ liệu ở đây lấy từ repositories hoặc model
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderSidebar();
        $this->load->render('layouts/pageCaterori', $data);
        $this->_renderBase->renderFooter();

        } else {
            $error = new helper;
            $error->showError('Bạn chưa Đăng Nhập', 'warning');
            header('location:' . ROOT_URL . '?url=HomeController/Login');
        }
       
    }
    function update($id)
    {
     
        $Category = new Category;
        $data = $Category->getOne('id', $id);

        if (isset($_POST['submitUpdateCate'])) {

            $caterory_name = $_POST['caterory_name'];
           

            $data = [
                'caterory_name' => $caterory_name,
            ];
            $result = $Category->updateCategory($id, $data);

            if ($result) {
                header('location: ' . ROOT_URL . '?url=CategoryController/list/' );
            } else {
                echo ('khong cap nhat');
            }
        }
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderSidebar();
        $this->load->render('layouts/PageCateroriesDeail', $data);
        $this->_renderBase->renderFooter();

    }
    
    function delete($id)
{
    try {
        $Category = new Category();
        $data = $Category->deleteCategory($id);

        if ($data) {
            $error = new helper;
            $error->showError('Xóa thành công', 'success');
            header('Location: ' . ROOT_URL . '?url=CategoryController/list');
            exit(); // Đảm bảo không có đầu ra khác trước khi chuyển hướng
        } else {
            $error = new helper;
            $error->showError('Không thể xóa khi còn sản phẩm', 'error');
            header('Location: ' . ROOT_URL . '?url=CategoryController/list');
            // Có thể thực hiện xử lý khác tùy thuộc vào yêu cầu
        }
    } catch (\Exception $e) {
        if ($e->getCode() === '23000') {
            // Xử lý lỗi khi có ràng buộc khóa ngoại
            $errorMessage = "Lỗi: Không thể xóa vì vẫn còn các nhiệm vụ liên quan.";
            
        } else {
            $errorMessage = "Lỗi: " . $e->getMessage();
        }
        $error = new helper;
        $error->showError($errorMessage, 'danger');
        header('Location: ' . ROOT_URL . '?url=CategoryController/list');
        // Có thể thực hiện xử lý khác tùy thuộc vào yêu cầu
    }
}

    public function search(){
        // Lấy từ khóa tìm kiếm từ request
       $key = isset($_POST['addCata']) ? $_POST['search_query'] : '';
        
        // Gọi phương thức tìm kiếm từ model
        $Category = new Category();
        $data= $Category->searchTasks($key);
        // var_dump($data);
        // die();

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderSidebar();
        $this->load->render('layouts/search', $data);
        $this->_renderBase->renderFooter();
        
        
         
      
    }
    public function list(){
        $id_user= $_SESSION['user']['id'];
        $category = new Category();
        $data = $category->getAllUserid($id_user);
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderSidebar();

        // $this->load->render('layouts/client/slider');
        $this->load->render('layouts/PageCataroriesList',$data);
        $this->_renderBase->renderFooter();


    }
}
