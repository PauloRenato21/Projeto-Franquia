<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Atleta extends Model {  
    
    public function getAllAtleta() {
        $query = 'SELECT atleta.id, atleta.nome, cpf, dt_nascimento,endereco_rua,endereco_numero,endereco_bairro,endereco_CEP,naturalidade,telefone,email,turma.nome as turma_nome FROM atleta inner join turma on
        atleta.fk_turma_id = turma.id';
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