<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 d-flex">
    <div class="image">
      <img src="public\uploads\user.jpg" class="img-circle elevation-2" alt="">
      <span class="brand-text font-weight-light text-center">ToDo List</span>
    </div>
  </div>    

  <!-- Sidebar -->

  <div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <?php foreach ($data as $caterori ):{?>
        <li class="nav-item">
          <a href="?url=CategoryController/detail/<?=$caterori['id']?>" class="nav-link">
            <i class="fa-solid fa-sun"></i>
            <p>
             <?=$caterori['caterory_name']?>
              <span class="badge badge-info right">3</span>
            </p>
          </a>
        </li>
        <?php } endforeach;?>
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
     
    </nav><hr>
    <nav>
      <form action="<?= ROOT_URL.'?url=CategoryController/create'?>" method="post">
      <div class="mt-2">
        <div class="input-group">
          <input type="text" name="createCata" class="form-control" placeholder="New List ">
          <button name="addCata"  class="btn btn-primary" type="submit" id="button-addon2">THÊM</button>
        </div>
      </div>
      </form>
    
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>