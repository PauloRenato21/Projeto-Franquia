<?php
namespace Admin2504\Controllers;

use Admin2504\Models\Cargo;
use Admin2504\Models\Franquia;
use Foundation\Controller;
use Admin2504\Models\Funcionario;

class FuncionarioController extends Controller
{
    protected $funcionario;
    protected $franquia;
    protected $cargo;

    public function __construct() {

        $this-> funcionario = new Funcionario();
        $this->franquia = new Franquia();
        $this->cargo = new Cargo();
    }

    public function index() {
        $dados_funcionario = $this-> funcionario-> getAllFuncionario();
        
        return $this-> render('funcionario/index', [
            'dados_funcionario' => $dados_funcionario,
        ]);
    }

    public function cadastrar() {
        $id = $this-> getParam('id');

        $dados_funcionario = null;
        $dados_franquia = $this->franquia->getAllFranquia();
        $dados_cargo = $this->cargo->getAllCargo();

        if ($id) {
            $dados_funcionario = $this-> funcionario-> getById($id);
        }

        return $this-> render('funcionario/manipulador', [ 
            'dados_funcionario' => $dados_funcionario,
            'dados_franquia' => $dados_franquia,
            'dados_cargo' => $dados_cargo,
        ]);
    }

    public function salvar() {
        $id = $this-> getParam('id');

        $dados = [
            'nome' => input()-> get('nome'),
            'dt_nascimento' => input()-> get('dt_nascimento'),
            'cpf' => input()-> get('cpf'),
            'rg' => input()-> get('rg'),
            'naturalidade' => input()-> get('naturalidade'),
            'endereco_rua' => input()-> get('endereco_rua'),
            'endereco_numero' => input()-> get('endereco_numero'),
            'endereco_bairro' => input()-> get('endereco_bairro'),
            'telefone' => input()-> get('telefone'),
            'email' => input()-> get('email'),
            'fk_franquias_id' => input()-> get('franquia_id'),
            'fk_cargo_id' => input()->get('cargo_id')
        ];

        // Atualizar

        if ($id) {
            if ($this-> funcionario-> updateById($id, $dados)) {
                session()-> put('_sucesso', 'Registro atualizado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao atualizar o registro!');
            }
        }else {
            if ($this-> funcionario-> insert($dados)){
                session()-> put('_sucesso', 'Registro cadastrado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao cadastrar o registro!');
            }
        }
        return redirect()-> route('funcionario.index');
    }

    public function excluir() {
        $idFix = $this->getParam('id');
        if($this->funcionario->deleteFuncionarioById($idFix)){
            session()->put('_sucesso', 'Registro excluído com sucesso');
        }else{
            session()->put('_erro', 'Erro ao excluir o registro');
        }

        return redirect()->route('funcionario.index');
    }
}