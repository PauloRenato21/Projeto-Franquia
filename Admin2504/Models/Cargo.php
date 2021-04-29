<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Cargo extends Model {  
    
    public function getAllCargo() {
        $query = 'SELECT * FROM cargo';
        return $this->db->select($query);
    }

    public function deleteCargoById($id){
        $where = sprintf('id = %s', (int) $id);
        return $this->db->delete('cargo', $where);
    }

    protected function getTableName() {
        return 'cargo'; 
    }
}