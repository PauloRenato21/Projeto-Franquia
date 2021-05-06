<?php
namespace App\Controllers;

use Foundation\Controller;
use App\Models\Responsavel;

class ResponsavelController extends Controller
{
    protected $responsavel;

    public function __construct() {

        $this-> responsavel = new Responsavel(); 
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
        
        $dados = [
            'nome' => input()-> get('nome'),
            'cpf' => input()-> get('cpf'),
            'grau_parentesco' => input()-> get('grau_parentesco'),
            'profissao' => input()-> get('profissao'),
            'local_trabalho' => input()-> get('local_trabalho'),
            'telefone' => input()-> get('telefone'),
            'email' => input()-> get('email')
        ];

        if ($this-> responsavel-> insert($dados)){
            session()-> put('_sucesso', 'Registro cadastrado com sucesso!');
            return redirect()->route('atleta');
        }else {
            session()-> put('_erro', 'Erro ao cadastrar o registro!');
        }
        return redirect()-> route('index');
    }
}