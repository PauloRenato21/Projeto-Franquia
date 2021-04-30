<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Turma extends Model {  
    
    public function getAllTurma() {
        $query = 'SELECT * FROM turma';
        return $this->db->select($query);
    }

    public function deleteTurmaById($id){
        $where = sprintf('id = %s', (int) $id);
        return $this->db->delete('turma', $where);
    }

    protected function getTableName() {
        return 'turma'; 
    }
}