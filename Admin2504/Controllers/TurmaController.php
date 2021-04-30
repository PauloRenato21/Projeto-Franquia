<?php
namespace Admin2504\Controllers;

use Foundation\Controller;
use Admin2504\Models\Turma;


class TurmaController extends Controller
{
    protected $turma;


    public function __construct() {

        $this-> turma = new Turma(); 
     
    }

    public function index() {
        $dados_turma = $this-> turma-> getAllTurma();
        
        
        return $this-> render('turma/index', [
            'dados_turma' => $dados_turma,
        ]);
    }

    public function cadastrar() {
        $id = $this-> getParam('id');

        $dados_turma = null;

        if ($id) {
            $dados_turma = $this-> turma-> getById($id);
        }

        return $this-> render('turma/manipulador', [ 
            'dados_turma' => $dados_turma,
        ]);
    }

    public function salvar() {
        $id = $this-> getParam('id');

        $dados = [
            'nome' => input()-> get('nome'),
            'turno' => input()-> get('turno'),
            'horario_inicial' => input()-> get('horario_inicial'),
            'horario_termino' => input()-> get('horario_termino')
        ];

        // Atualizar

        if ($id) {
            if ($this-> turma-> updateById($id, $dados)) {
                session()-> put('_sucesso', 'Registro atualizado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao atualizar o registro!');
            }
        }else {
            if ($this-> turma-> insert($dados)){
                session()-> put('_sucesso', 'Registro cadastrado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao cadastrar o registro!');
            }
        }
        return redirect()-> route('turma.index');
    }

    public function excluir() {
        $idFix = $this->getParam('id');
        if($this->turma->deleteTurmaById($idFix)){
            session()->put('_sucesso', 'Registro excluído com sucesso');
        }else{
            session()->put('_erro', 'Erro ao excluir o registro');
        }

        return redirect()->route('turma.index');
    }
}