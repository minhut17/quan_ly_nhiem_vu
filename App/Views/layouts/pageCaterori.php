<?php session_start(); ?>
<!-- Content Wrapper. Contains page content -->
<div class=" content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">

  </div>
  <!-- /.content-header -->

  <!-- thêm nhiệm vụ -->
  <section>
    <form action="<?= ROOT_URL . '?url=TaskController/addTask' ?>" method="post">
      <div class="m-3">
        <div class="input-group">

          <input type="text" name="task_name" class="form-control" placeholder="New List ">
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
  <!-- kết thúc form thêm nhiệm vụ -->
  <!-- Main content -->
  <section class="content">
    <?php foreach ($data as $key): { ?>
        <div class="row mx-3 bg-secondary  rounded mt-1">

          <div class="col-10">
            <input class="form-check-input p-2 mt-3 ms-1" type="checkbox" value="" id="flexCheckIndeterminate">
            <!-- <script language="javascript">
document.getElementById('action').onclick = function(e){
if (this.checked){
alert("Bạn vừa nhấn nút checck");
}
else{
alert("Bạn vừa bỏ thích freetuts.net");
}
};
</script> -->
            <div class="ms-5">
              <h5>
                <?= $key['task_name'] ?>
              </h5>
              <span>
                <?= $key['deadline'] ?>
              </span>


            </div>
          </div>

          <div class="col-2 p-2">
            <a href="?url=TaskController/delete/<?= $key['id'] ?>"><button><i
                  class="fa-regular fa-trash-can bg-danger"></i></button></a>



            <a href="?url=TaskController/update/<?= $key['id'] ?>"><button><i
                  class="fa-solid fa-pen bg-success"></i></button></a>
            <?php
            if ($key['level'] == 1) {
              echo ' <a href=""><button><i class="fa-regular fa-star"></i></button></a>';

            }
            ?>
          </div>

        </div>
      <?php }endforeach; ?>

  </section>
  <div class=" mt-3 ms-4 " >
    <?php
      if (isset($_SESSION['showError'])) {
        echo $_SESSION['showError'];
        unset($_SESSION['showError']);
      } ?>
    </div>

  <!-- /.content -->
</div>