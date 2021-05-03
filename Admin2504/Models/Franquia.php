<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Franquia extends Model {  
    
    public function getAllFranquia() {
        $query = 'SELECT * FROM franquias';
        return $this->db->select($query);
    }

    public function deleteFranquiaById($id){
        $where = sprintf('id = %s', (int) $id);
        return $this->db->delete('franquias', $where);
    }

    protected function getTableName() {
        return 'franquias'; 
    }
}