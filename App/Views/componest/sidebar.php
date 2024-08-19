<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 d-flex">
    <a class="text-white" href="?url=HomeController/HomePage">
    <div class="image">
      <img src="public\uploads\user.jpg" class="img-circle elevation-2" alt="">
      <span class="brand-text font-weight-light text-center">ToDo List</span>
    </div>
    </a>
    
  </div>    

  <!-- Sidebar -->

  <div class="sidebar">

    <form action="<?=ROOT_URL.'?url=CategoryController/search'?>" method="GET">
      <div class="mt-2">
        <div class="input-group">
          <input type="text" name="search_query" class="form-control" placeholder="Tìm kiếm">
          <button name="addCata"  class="btn btn-primary" type="submit" id="button-addon2">Tìm Kiếm</button>
        </div>
      </div>
      </form>
   

    <!-- Sidebar Menu -->
    
   
    

    <div class="container-f">
    <div class="list mt-2">
   
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <?php foreach ($data as $caterori ):{?>
        <li class="nav-item d-flex">
          <a href="?url=CategoryController/detail/<?=$caterori['id']?>" class="nav-link ">
            <i class="fa-solid fa-sun"></i>
             <?=$caterori['caterory_name']?>
             </a>
           
            
          
        </li>
       
        <?php } endforeach;?>
        <a href="?url=CategoryController/list" class="nav-link">XEM TẤT CẢ</a>
        <hr>
        <!-- <li class="nav-item">
          <a href="index.php?pg=home&action=task" class="nav-link">
            <i class="fa-solid fa-house"></i>
            <p>
              Nhiệm vụ
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?pg=home&action=task" class="nav-link">
            <i class="fa-regular fa-star"></i>
            <p>
              Quan Trọng
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li> -->



      </ul>
    
        <!-- Your list items go here -->
    </div>
    <div class="fixed-input">
    <form action="<?= ROOT_URL.'?url=CategoryController/create'?>" method="post">
      <div class="mt-2">
        <div class="input-group">
          <input type="text" name="createCata" class="form-control" placeholder="New List ">
          <button name="addCata"  class="btn btn-primary" type="submit" id="button-addon2">THÊM</button>
        </div>
      </div>
      </form>
    </div>
    </div>



    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>