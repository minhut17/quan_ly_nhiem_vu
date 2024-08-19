<?php

namespace App\Models;

use App\Interfaces\CrudInterface;
use App\Models\Database;
use DateTime;
use PDO;

abstract class BaseModel implements CrudInterface
{

    protected $table;


    private $_connection;

    private $_query;

    public function __construct()
    {
        $this->_connection = new Database();
    }

    public function getAll()
    { 
        $this->_query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";

        // return $this;

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllLimit($userId)
    {   $limit =7;
        $this->_query = "SELECT * FROM " . $this->table . " WHERE id_user =" . $userId . " ORDER BY id DESC LIMIT " . $limit;


        // return $this;

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllUserid($userId)
    {   
        $this->_query = "SELECT * FROM " . $this->table . " WHERE id_user =" . $userId . " ORDER BY id DESC ";


        // return $this;

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getOne(string $field, string|int $value)
    {
        $this->_query = "SELECT * FROM $this->table WHERE $field = '$value'";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function searchTask($key)
    {
        $this->_query = "SELECT * FROM tasks WHERE task_name LIKE '%$key%'";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {
        $this->_query = "INSERT INTO $this->table (";
        foreach ($data as $key => $value) {
            $this->_query .= "$key, ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= " ) VALUES (";
        foreach ($data as $key => $value) {
            $this->_query .= "'$value', ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= ")";

        $stmt = $this->_connection->PdO()->prepare($this->_query);

        return $stmt->execute();
        // return $stmt;
    }
    public function update(int $id, array $data)
    {
       

        // tạo câu truy vấn
        $this->_query = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $this->_query .= "$key = '$value', ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= " WHERE id=$id";

        //    $sql .= " WHERE ";
        //    foreach ($conditions as $key => $value) {
        //        $sql .= "$key = :$key AND ";
        //    }
        //    $sql = rtrim($sql, "AND ");

        // chuẩn bị câu truy vấn
        $stmt = $this->_connection->PdO()->prepare($this->_query);

        // bind các giá trị
        // foreach ($data as $key => $value) {
        //     $stmt->bindValue(":$key", $value);
        // }
        //    foreach ($conditions as $key => $value) {
        //        $stmt->bindValue(":$key", $value);
        //    }

        // return $stmt;
        // thực hiện câu truy vấn
        return $stmt->execute();
        // return $this->_query;
    }
    public function delete(int $id): bool
    {
        $this->_query = "DELETE FROM $this->table WHERE id=$id";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }



    public function orderBy(string $order = 'ASC')
    {
        $this->_query = $this->_query . "order by " . $order;

        return $this;
    }

    public function get()
    {
        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function limit(int $limit = 8)
    {
        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTasks($id,$userId)
    {
        $this->_query = "SELECT tasks.*
        FROM tasks
        JOIN caterories ON tasks.caterory_id = caterories.id
        WHERE caterories.id = $id
        AND tasks.user_id = $userId";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function statisticalTask($id_user)
    {
        $this->_query = "SELECT COUNT(tasks.id) AS totalTask ,
        SUM(CASE WHEN task_status = 1 THEN 1 ELSE 0 END) AS completed_tasks,
        SUM(CASE WHEN level = 1 THEN 1 ELSE 0 END) AS priority_tasks
        FROM tasks WHERE 
        user_id =".$id_user;

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOneToken_hash($token_hash)
    {
        $this->_query = "SELECT * FROM $this->table WHERE reset_token_hash=$token_hash";

        $stmt = $this->_connection->PdO()->prepare($this->_query);


        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function checkmailn($user_email)
    {
        $this->_query = "SELECT * FROM users WHERE user_email=:email";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->bindParam(':email', $user_email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    public function getOTPn($user_email)
    {
        $otp = rand(100000, 999999);
        // $now = new DateTime();
        // $now->add( new \DateInterval("PT5M"));
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $expiry = date("Y-m-d H:i:s", time() + 60 * 3);

        $sql = "UPDATE users
        SET reset_token_hash = :reset_token_hash,
            reset_token_at = :reset_token_at
        WHERE user_email = :user_email";

        $stmt = $this->_connection->pdo()->prepare($sql);
        $stmt->bindParam(':reset_token_hash', $otp);
        $stmt->bindParam(':reset_token_at', $expiry);
        $stmt->bindParam(':user_email', $user_email);
        $stmt->execute();
        return $otp;

    }
    public function resetPassn($pass, $otp)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = date("Y-m-d H:i:s");
        $this->_query = "SELECT * FROM users
         WHERE reset_token_hash=:reset_token_hash 
         AND reset_token_at>=:reset_token_at ";
        $stmt = $this->_connection->pdo()->prepare($this->_query);
        $stmt->bindParam(':reset_token_hash', $otp);
        $stmt->bindParam(':reset_token_at', $now);
        $stmt->execute();
        $resurl = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($resurl)) {
            $pwhash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "UPDATE users
            SET user_password = :user_password
            WHERE reset_token_hash = :reset_token_hash";
            $stmt = $this->_connection->pdo()->prepare($sql);
            $stmt->bindParam(':user_password', $pwhash);
            $stmt->bindParam(':reset_token_hash', $otp);
            $stmt->execute();
            return true;
        } else {
            return false;
        }

    }
    public function updateStatus($id){
        $this->_query = "UPDATE $this->table SET task_status = 1 WHERE id=$id";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        return $stmt->execute();
    }
}