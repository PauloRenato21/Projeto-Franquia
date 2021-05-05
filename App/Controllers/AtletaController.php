<?php
namespace App\Controllers;

use Admin2504\Models\Turma;
use Foundation\Controller;
use App\Models\Atleta;
use App\Models\Responsavel;

class AtletaController extends Controller
{
    protected $atleta;
    protected $turma;
    protected $responsavel;

    public function __construct() {

        $this-> atleta = new Atleta(); 
        $this->turma = new Turma();
        $this->responsavel = new Responsavel();
    }

    public function cadastrar() {
        $id = $this-> getParam('id');

        $dados_atleta = null;
        $dados_turma = $this->turma->getAllTurma();
        $dados_responsavel = $this->responsavel->getAllResponsavel();

        if ($id) {
            $dados_atleta = $this-> atleta-> getById($id);
        }

        return $this-> render('atleta/manipular', [ 
            'dados_atleta' => $dados_atleta,
            'dados_turma' => $dados_turma,
            'dados_responsavel' => $dados_responsavel,
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
            'problema_saude' => empty(input()-> get('problema_saude')) ? 'Nenhum' : input()-> get('problema_saude'),
            'alergia' => empty(input()-> get('alergia')) ? 'Nenhum' : input()-> get('alergia'),
            'medicamento' => empty(input()-> get('medicamento')) ? 'Nenhum' : input()-> get('medicamento'),
            'telefone' => input()-> get('telefone'),
            'email' => input()-> get('email'),
            'fk_turma_id' => input()-> get('turma_id'),
            'fk_Responsavel_id' => input()-> get('responsavel_id')
        ];

        // if((date("Y") - date('Y',strtotime($dados['dt_nascimento']))) > 18){
        //     echo "Maior de Idade";
        // } else{
        //     return redirect()-> route('responsavel');
        // }
        
        if ($this-> atleta-> insert($dados)){
            session()-> put('_sucesso', 'Registro cadastrado com sucesso!');
        }else {
            session()-> put('_erro', 'Erro ao cadastrar o registro!');
        }
        return redirect()-> route('index');
    }

}