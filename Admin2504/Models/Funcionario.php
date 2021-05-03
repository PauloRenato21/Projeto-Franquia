<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Funcionario extends Model {  
    
    public function getAllFuncionario() {
        $query = 'SELECT fu.id, fu.nome, dt_nascimento, cpf, rg, naturalidade, fu.endereco_rua,fu.endereco_bairro, fu.endereco_numero, fu.telefone, fu.email, fr.nome as fr_nome, ca.nome as ca_nome FROM funcionario fu inner join franquias fr on
        fu.fk_franquias_id = fr.id  inner join cargo ca on fu.fk_cargo_id = ca.id';
        return $this->db->select($query);
    }

    public function deleteFuncionarioById($id){
        $where = sprintf('id = %s', (int) $id);
        return $this->db->delete('funcionario', $where);
    }

    protected function getTableName() {
        return 'funcionario'; 
    }
}