<?php
namespace Admin2504\Models;

use Foundation\Database\Model;

class Franquia extends Model {  
    
    public function getAllFranquia() {
        $query = 'SELECT fr.id, fr.nome, fr.cnpj, endereco_rua, endereco_numero, endereco_bairro, endereco_CEP, estado, cidade, telefone, email, cf.nome as cf_nome FROM franquias fr inner join clube_futebol cf on fr.fk_clube_futebol_id = cf.id';
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