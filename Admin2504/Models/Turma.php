<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Turma extends Model {  
    
    public function getAllTurma() {
        $query = 'SELECT tu.id, tu.nome, turno, horario_inicial, horario_termino, ca.nome as ca_nome, fa.nome as fa_nome FROM turma tu inner join categoria ca on
        tu.fk_categoria_id = ca.id inner join franquias fa on
        tu.fk_franquias_id = fa.id';
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