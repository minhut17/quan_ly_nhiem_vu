<?php

namespace App\Core;

use App\Controllers\BaseController;
use App\Models\Category;

class BaseRender extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function renderHeader(){
        $this->load->render('componest/header');
    }
    public function renderSidebar(){
        $id_user= $_SESSION['user']['id'];
        $category = new Category();
        $data = $category->getAllCategoryLimit($id_user);
        // $this->_renderBase->renderHeader();
        // $this->load->render('layouts/client/slider');
        $this->load->render('componest/sidebar',$data);
    }
    public function renderFooter(){
        $this->load->render('componest/footer');
    }


}