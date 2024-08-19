<!-- Content Wrapper. Contains page content -->
<div class=" content-wrapper bg-content">
  <!-- Content Header (Page header) -->
  <div class="content-header">

  </div>
  <!-- /.content-header -->

  <!-- thêm nhiệm vụ -->
 <!-- //erroor -->
 <div class=" mt-3 ms-4 ">
    <?php
    if (isset($_SESSION['showError'])) {
      echo $_SESSION['showError'];
      unset($_SESSION['showError']);
    } ?>
  </div>
  <!-- kết thúc form thêm nhiệm vụ -->
  <!-- Main content -->
  <section class="content ">
    <?php if (!empty($data)): ?>
      <?php foreach ($data as $key): { ?>
          <div class="row mx-3 bg-secondary-grba  rounded mt-1">
  
            <div class="col-8">
              <form action="<?= ROOT_URL ?>.?url=TaskController/updateStatusTask/<?= $key['id'] ?>" method="post">
                <?php if ($key['task_status'] == 1): ?>
                  <input class="form-check-input p-2 mt-3 ms-1" name="checkbox" type="checkbox" value="0" id="flexCheckIndeterminate "checked disabled>
                  <div class="ms-5">
                    <h5 class="text-decoration-line-through">
                      <?= $key['task_name'] ?>
                    </h5>
                    <span class="text-decoration-line-through">
                      <?= $key['deadline'] ?>
                    </span>
                  </div>



                <?php else: ?>

                  <div class="ms-5">
                    <h5>
                      <?= $key['task_name'] ?>
                    </h5>
                    <span>
                      <?= $key['deadline'] ?>
                    </span>
                  </div>


                <?php endif; ?>

            </div>

            <div class="col-3 p-2 text-end ">
              <?php 
              if($key['task_status'] !== 1){
                echo '<input class="btn btn-success m-2" type="submit" name="submitTaskUpdateStatus" value="hoàn thành">';
              }
              
              ?>
             
              </form>
              <a href="?url=TaskController/delete/<?= $key['id'] ?>"><button class="btn btn-danger"><i
                    class="fa-regular fa-trash-can "></i></button>
                  </a>
                  <?php  if($key['task_status'] !== 1):?>
              <a href="?url=TaskController/update/<?= $key['id'] ?>">
                <button class="btn btn-primary">
                  <i class="fa-solid fa-pen "></i>
                </button>
              </a>
              <?php endif; ?>

              <?php
              if ($key['level'] == 1) {
                echo ' <a href="#">
              <button class="btn btn-warning">
              <i class="fa-regular fa-star"></i>
              </button>
              </a>';
              }
              ?>
            </div>

          </div>
        <?php }endforeach; ?>
    <?php else: ?>
      <h5 class="text-center">Không có công việc nào được tìm thấy</h5>
    <?php endif; ?>
  </section>

 

  <section>
    <form class="form-bottom" action="<?= ROOT_URL . '?url=TaskController/addTask' ?>" method="post">
      <div class="m-3">
        <div class="input-group">

          <input type="text" name="task_name" class="form-control bg-dark" placeholder="Nhiệm Vụ Mới">
          <input type="datetime-local" name="dealine" class="form-control" placeholder="New List ">
          <?php
          $url = $_SERVER['REQUEST_URI'];
          // Phân tách URL thành các phần tử dựa trên dấu gạch chéo "/"
          $parts = explode('/', $url);
          // Lấy phần tử cuối cùng của mảng parts
          $categoryId = end($parts);
          $_SESSION['categoryId'] = $categoryId;
          echo ' <input name="catarogies_id" type="hidden" value="' . $categoryId . '">';
          ?>
          <button name="addTask" class="btn btn-primary" type="submit" id="button-addon2">THÊM</button>
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
</div>