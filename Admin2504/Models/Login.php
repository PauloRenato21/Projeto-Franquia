<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Login extends Model
{
    public function getUserAtivo($login, $senha){
        $sql = "SELECT * FROM admin WHERE user = :login_user and password = :senha_user LIMIT 1";
        $where = ['login_user' => $login, 'senha_user' => $senha];
        return $this->db->select($sql, $where);
    }

    protected function getTableName() {
        return 'admin';
    }
}