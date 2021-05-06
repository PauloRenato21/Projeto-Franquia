<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Clube extends Model {  
    
    public function getAllClube() {
        $query = 'SELECT * FROM clube_futebol';
        return $this->db->select($query);
    }

    public function deleteClubeById($id){
        $where = sprintf('id = %s', (int) $id);
        return $this->db->delete('clube_futebol', $where);
    }

    protected function getTableName() {
        return 'clube_futebol'; 
    }
}