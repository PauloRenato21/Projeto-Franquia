<?php
namespace Admin2504\Controllers;

use Foundation\Controller;
use Admin2504\Models\Responsavel;

class ResponsavelController extends Controller
{
    protected $responsavel;

    public function __construct() {

        $this-> responsavel = new Responsavel(); 
    }

    public function index() {
        $dados_responsavel = $this-> responsavel-> getAllResponsavel();
        
        return $this-> render('responsavel/index', [
            'dados_responsavel' => $dados_responsavel,
        ]);
    }

    public function cadastrar() {
        $id = $this-> getParam('id');

        $dados_responsavel = null;

        if ($id) {
            $dados_responsavel = $this-> responsavel-> getById($id);
        }

        return $this-> render('responsavel/manipular', [ 
            'dados_responsavel' => $dados_responsavel,
        ]);
    }

    public function salvar() {
        $id = $this-> getParam('id');
        
        $dados = [
            'nome' => input()-> get('nome'),
            'cpf' => input()-> get('cpf'),
            'grau_parentesco' => input()-> get('grau_parentesco'),
            'profissao' => input()-> get('profissao'),
            'local_trabalho' => input()-> get('local_trabalho'),
            'telefone' => input()-> get('telefone'),
            'email' => input()-> get('email')
        ];

        // Atualizar

        if ($id) {
            if ($this-> responsavel-> updateById($id, $dados)) {
                session()-> put('_sucesso', 'Registro atualizado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao atualizar o registro!');
            }
        }else {
            if ($this-> responsavel-> insert($dados)){
                session()-> put('_sucesso', 'Registro cadastrado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao cadastrar o registro!');
            }
        }
        return redirect()-> route('responsavel.index');
    }

    public function excluir() {
        $idFix = $this-> getParam('id');
        // var_dump($idFix);
        // die();
        if($this->responsavel->deleteResponsavelById($idFix)){
            session()->put('_sucesso', 'Registro excluído com sucesso');
        }else{
            session()->put('_erro', 'Erro ao excluir o registro');
        }

        return redirect()->route('responsavel.index');
    }
}