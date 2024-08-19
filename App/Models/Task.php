<?php

namespace App\Models;

use \PDO;

class Task extends BaseModel
{

    protected $table = 'tasks';


    public function getAlltask()
    {
        return $this->getAll();
    }
    public function getOnetask($id)
    {
        return $this->getOne('id',$id);
    }

    public function updatetask($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deletetask($id)
    {
        return $this->delete($id);
    }


    public function createtask($data){
        return $this->create($data);
    }
    public function thongKeNhiemVu($id_user){
        return $this->statisticalTask($id_user);
    }
    public function updateStatusL($id){
        return $this->updateStatus($id);
    }

   
}
