<?php
namespace App\Controllers;

use Foundation\Controller;
use App\Models\Atleta;

class AtletaController extends Controller
{
    protected $atleta;

    public function __construct() {

        $this-> atleta = new Atleta(); 
    }

    public function cadastrar() {
        $id = $this-> getParam('id');

        $dados_atleta = null;

        if ($id) {
            $dados_atleta = $this-> atleta-> getById($id);
        }

        return $this-> render('atleta/manipular', [ 
            'dados_atleta' => $dados_atleta,
        ]);
    }

    public function salvar() {
        $id = $this-> getParam('id');
        
        $dados = [
            'nome' => input()-> get('nome'),
            'cpf' => input()-> get('cpf'),
            'dt_nascimento' => input()-> get('dt_nascimento'),
            'endereco_rua' => input()-> get('endereco_rua'),
            'endereco_numero' => input()-> get('endereco_numero'),
            'endereco_bairro' => input()-> get('endereco_bairro'),
            'endereco_CEP' => input()-> get('endereco_CEP'),
            'naturalidade' => input()-> get('naturalidade'),
            'problema_saude' => empty(input()-> get('problema_saude')) ? NULL : input()-> get('problema_saude'),
            'alergia' => empty(input()-> get('alergia')) ? NULL : input()-> get('alergia'),
            'medicamento' => empty(input()-> get('medicamento')) ? NULL : input()-> get('medicamento'),
            'telefone' => input()-> get('telefone'),
            'email' => input()-> get('email'),
            'fk_turma_id' => empty(input()-> get('fk_turma_id')) ? NULL : input()-> get('fk_turma_id'),
            'fk_Responsavel_id' => empty(input()-> get('fk_Responsavel_id')) ? NULL : input()-> get('fk_Responsavel_id')
        ];

        if ($this-> atleta-> insert($dados)){
            session()-> put('_sucesso', 'Registro cadastrado com sucesso!');
        }else {
            session()-> put('_erro', 'Erro ao cadastrar o registro!');
        }
        return redirect()-> route('index');
    }

}