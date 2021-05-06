<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Categoria extends Model {  
    
    public function getAllCategoria() {
        $query = 'SELECT * FROM categoria';
        return $this->db->select($query);
    }

    public function deleteCategoriaById($id){
        $where = sprintf('id = %s', (int) $id);
        return $this->db->delete('categoria', $where);
    }

    protected function getTableName() {
        return 'categoria'; 
    }
}