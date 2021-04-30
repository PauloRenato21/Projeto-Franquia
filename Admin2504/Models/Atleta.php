<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Atleta extends Model {  
    
    public function getAllAtleta() {
        $query = 'SELECT * FROM atleta';
        return $this->db->select($query);
    }

    public function deleteAtletaById($id){
        $where = sprintf('id = %s', (int) $id);
        return $this->db->delete('atleta', $where);
    }

    protected function getTableName() {
        return 'atleta'; 
    }
}