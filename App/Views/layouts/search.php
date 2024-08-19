<div class="content-wrapper">
    <div class="content-header">

    </div>

<section class="content">
    <?php if(!empty($data)):?>
        
    <?php foreach ($data as $key): { ?>
        <div class="row mx-3 bg-secondary  rounded mt-1">

<div class="col-9">
  <form action="<?= ROOT_URL ?>.?url=TaskController/updateStatusTask/<?= $key['id'] ?>" method="post">
    <?php if ($key['task_status'] == 1): ?>
      <input class="form-check-input p-2 mt-3 ms-1" name="checkbox" type="checkbox" value="0" id="flexCheckIndeterminate "checked>
      <div class="ms-5">
        <h5 class ="text-decoration-line-through">
          <?= $key['task_name'] ?>
        </h5>
        <span class="text-decoration-line-through">
          <?= $key['deadline'] ?>
        </span>
      </div>

      
   
    <?php else: ?>
      <input class="form-check-input p-2 mt-3 ms-1" name="checkbox" type="checkbox" value="0" id="flexCheckIndeterminate" >
      
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




<div class="col-3 p-2">
  <input class="btn btn-success m-2" type="submit" name="submitTaskUpdateStatus" value="hoàn thành">
  </form>
  <a href="?url=TaskController/delete/<?= $key['id'] ?>"><button class="btn btn-danger"><i
        class="fa-regular fa-trash-can "></i></button></a>
  <a href="?url=TaskController/update/<?= $key['id'] ?>">
    <button class="btn btn-primary">
      <i class="fa-solid fa-pen "></i>
    </button>
  </a>

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
      <?php else:?>
        <h5 class="text-center">Không có công việc nào được tìm thấy</h5>
        <?php endif;?>
  </section>
  </div>