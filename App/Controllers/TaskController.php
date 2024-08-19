<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Core\helper;
use App\Models\Task;
use App\Models\Category;

class TaskController extends BaseController
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


    public function index()
    {
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderSidebar();
        $this->load->render('layouts/pageHome');
        $this->_renderBase->renderFooter();
    }
    public function addTask()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        if (isset($_POST['addTask'])) {

            $now = date("Y-m-d H:i:s");
            $task_name = $_POST['task_name'];
            $dealine = $_POST['dealine'];
            $catarogies_id = $_POST['catarogies_id'];


            if ($task_name == "" || $dealine == "" || $catarogies_id == "") {
                $error = new helper;
                $error->showError('bạn không được bỏ trống', 'danger');
                header('location:' . ROOT_URL . '?url=CategoryController/detail/' . $catarogies_id);
                return;
            } elseif ($dealine < $now) {
                $error = new helper;
                $error->showError('thời gian không thể nhỏ hơn thời gian thực', 'warning');
                header('location:' . ROOT_URL . '?url=CategoryController/detail/' . $catarogies_id);
                return;

            } else {
                $data = [
                    'task_name' => $_POST['task_name'],
                    'task_status' => 0,
                    'deadline' => $_POST['dealine'],
                    'level' => 0,
                    'caterory_id' => $_POST['catarogies_id'],
                    'user_id' => $_SESSION['user']['id']
                ];
                $caterory_id = $data['caterory_id'];
                $task = new Task();
                $task->createtask($data);
                header('location:' . ROOT_URL . '?url=CategoryController/detail/' . $caterory_id);

            }


        }
        // var_dump($result);



        // $this->_renderBase->renderHeader();
        // $this->_renderBase->renderSidebar();
        // $this->load->render('layouts/pageCaterori');
        // $this->_renderBase->renderFooter();
    }
    public function update($id)
    {
        $cate = $_SESSION['categoryId'];
        $task = new Task;
        $data = $task->getOne('id', $id);

        if (isset($_POST['submit'])) {

            $Task_name = $_POST['Task_name'];
            $task_status = $_POST['task_status'];
            $deadline = $_POST['deadline'];
            $level = $_POST['level'];

            $data = [
                'Task_name' => $Task_name,
                'task_status' => $task_status,
                'deadline' => $deadline,
                'level' => $level
            ];



            $result = $task->updatetask($id, $data);

            if ($result) {

                header('location: ' . ROOT_URL . '?url=CategoryController/detail/' . $cate);
            } else {
                echo ('khong cap nhat');
            }
        }
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderSidebar();
        $this->load->render('layouts/PageTaskdetail', $data);
        $this->_renderBase->renderFooter();

    }
    public function delete($id)
    {
        $cate = $_SESSION['categoryId'];
        $task = new Task();
        $data = $task->deletetask($id);

        if ($data) {
            $error = new helper;
            $error->showError('Xóa thành công', 'success');

            header('location:' . ROOT_URL . '?url=CategoryController/detail/' . $cate);
        }

    }

    public function updateStatusTask($id)
    {
        $task = new Task;
        $cate = $_SESSION['categoryId'];
        if (isset($_POST['submitTaskUpdateStatus'])) {

            $data = $task->updateStatus($id);

            if ($data) {
                $error = new helper;
                $error->showError('Hoàn thành nhiệm vụ', 'success');
                header('location:' . ROOT_URL . '?url=CategoryController/detail/' . $cate);
            }



        }
        ;

    }


}