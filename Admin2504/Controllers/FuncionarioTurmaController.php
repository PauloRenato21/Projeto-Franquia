<?php
namespace Admin2504\Controllers;

use Admin2504\Models\Turma;
use Foundation\Controller;
use Admin2504\Models\Funcionario;

class FuncionarioTurmaController extends Controller
{
    protected $funcionario;
    protected $turma;

    public function __construct() {

        $this-> funcionario = new Funcionario();
        $this->turma = new Turma();
    }

    public function vincular() {
        $id = $this-> getParam('id');

        $dados_funcionario = $this->funcionario->getAllFuncionario();
        $dados_turma = $this->turma->getAllTurma();

        if ($id) {
            $dados_funcionario = $this-> funcionario-> getById($id);
        }

        return $this-> render('funcionario/vinculador', [ 
            'dados_funcionario' => $dados_funcionario,
            'dados_turma' => $dados_turma
        ]);
    }

    public function salvar() {
        $id = $this-> getParam('id');

        $dados = [
            'fk_funcionario_id' => input()-> get('funcionario_id'),
            'fk_turma_id' => input()->get('turma_id')
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