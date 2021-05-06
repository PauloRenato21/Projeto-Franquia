<?php
namespace App\Models;

use Foundation\Database\Model;

class Responsavel extends Model {  
    
    public function getAllResponsavel() {
        $query = 'SELECT * from responsavel';
        return $this->db->select($query);
    }

    protected function getTableName() {
        return 'responsavel'; 
    }
}