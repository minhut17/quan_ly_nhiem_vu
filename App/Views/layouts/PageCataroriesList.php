<div class="content-wrapper">
    <div class="content-header">

    </div>
    <div class="row ">
        <div class="col-sm-10 offset-sm-1">

            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                        <th>Tên Loại Nhiệm Vụ</th>
                        <th class="text-center">Hành Động</th>
                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($data as $caterori): { ?>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <a href="?url=CategoryController/detail/<?= $caterori['id'] ?>" class="text-white nav-link w-100">
                                            <i class="fa-solid fa-sun"></i>
                                            <?= $caterori['caterory_name'] ?>
                                        </a>

                                    </div>


                                </td>
                                <td class="ms-5">
                                    <a class="ms-3 mt-2 text-center"
                                        href="?url=CategoryController/delete/<?= $caterori['id'] ?>"><span
                                            class="btn btn-danger">Xóa</span></a>
                                    <a class="ms-3 mt-2 text-center"
                                        href="?url=CategoryController/update/<?= $caterori['id'] ?>"><span
                                            class="btn btn-primary">Cập nhật</span></a>

                                </td>



                            </tr>
                        <?php }endforeach; ?>
                </tbody>
            </table>
            


        </div>
    </div>
    <div class=" mt-3 ms-4 ">
    <?php
    if (isset($_SESSION['showError'])) {
      echo $_SESSION['showError'];
      unset($_SESSION['showError']);
    } ?>
  </div>
</div>