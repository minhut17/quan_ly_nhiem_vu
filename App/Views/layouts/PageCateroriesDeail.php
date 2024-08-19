<div class="content-wrapper">
<div class="content-header">

  </div>
  <div class="row ">
        <div class="col-sm-6 offset-sm-3">
            <form action="<?= ROOT_URL ?>?url=CategoryController/update/<?= $data['id'] ?>" method="post">
                <div class="form-group">
                    <label for="id">Tên Loại Nhiệm Vụ</label>
                    <input type="text" class="form-control" name="caterory_name" id="caterory_name" value="<?= $data['caterory_name'] ?>" >

                </div>
        
                <button type="submit" class="btn btn-dark" name="submitUpdateCate">Update</button>
            </form>


        </div>
        <div class=" mt-3 ms-4 ">
    <?php
    if (isset($_SESSION['showError'])) {
      echo $_SESSION['showError'];
      unset($_SESSION['showError']);
    } ?>
  </div>
    </div>
    </div>