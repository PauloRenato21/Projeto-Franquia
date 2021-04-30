<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Funcionario extends Model {  
    
    public function getAllFuncionario() {
        $query = 'SELECT * FROM funcionario';
        return $this->db->select($query);
    }

    public function deleteFuncionarioById($id){
        $where = sprintf('id = %s', (int) $id);
        return $this->db->delete('funcionario', $where);
    }

    protected function getTableName() {
        return 'funcionario'; 
    }
}