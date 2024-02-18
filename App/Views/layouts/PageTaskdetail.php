<div class="content-wrapper">
<div class="content-header">

  </div>
  <div class="row ">
        <div class="col-sm-6 offset-sm-3">
            <form action="<?= ROOT_URL ?>?url=TaskController/update/<?= $data['id'] ?>" method="post">
                <div class="form-group">
                    <label for="id">Tên Nhiệm Vụ</label>
                    <input type="text" class="form-control" name="Task_name" id="Task_name" value="<?= $data['task_name'] ?>" >

                </div>
                <div class="form-group">
                    <label for="name">Thời gian kết thúc</label>
                    <input type="datetime-local" class="form-control" name="deadline" id="name" value="<?= $data['deadline'] ?>">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="task_status" id="status" class="form-control">
                        <option value="0" <?= ($data['task_status'] == 0) ? 'selected' : '' ?>>Đang làm </option>
                        <option value="1" <?= ($data['task_status'] == 1) ? 'selected' : '' ?>>Hoàn thành</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Độ Ưu Tiên</label>
                    <select name="level" id="level" class="form-control">
                        <option value="0" <?= ($data['level'] == 0) ? 'selected' : '' ?>>Không ưu tiên</option>
                        <option value="1" <?= ($data['level'] == 1) ? 'selected' : '' ?>>Ưu tiên</option>
                    </select>
                </div>

                

                <button type="submit" class="btn btn-dark" name="submit">Update</button>
            </form>

        </div>
    </div>
    </div>