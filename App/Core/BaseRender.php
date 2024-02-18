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
        $category = new Category();
        $data = $category->getAllCategory();

        // $this->_renderBase->renderHeader();
        // $this->load->render('layouts/client/slider');
        $this->load->render('componest/sidebar',$data);
    }

    // public function renderAdminFooter(){
    //     $this->load->render('layouts/admin/footer');
    // }

    // public function renderAdminHeader(){
    //     $this->load->render('layouts/admin/header');
    // }

    public function renderFooter(){
        $this->load->render('componest/footer');
    }


}