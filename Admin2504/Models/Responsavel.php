<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Responsavel extends Model {  
    
    public function getAllResponsavel() {
        $query = 'SELECT * FROM responsavel';
        return $this->db->select($query);
    }

    public function deleteResponsavelById($id){
        $where = sprintf('id = %s', (int) $id);
        return $this->db->delete('responsavel', $where);
    }

    protected function getTableName() {
        return 'responsavel'; 
    }
}