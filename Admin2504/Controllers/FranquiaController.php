<?php
namespace Admin2504\Controllers;

use Foundation\Controller;
use Admin2504\Models\Franquia;
use Admin2504\Models\Clube;

class FranquiaController extends Controller
{
    protected $franquia;
    protected $clube;

    public function __construct() {

        $this-> franquia = new Franquia();
        $this-> clube = new Clube();
    }

    public function index() {
        $dados_franquia = $this-> franquia-> getAllFranquia();
        
        return $this-> render('franquia/index', [
            'dados_franquia' => $dados_franquia,
        ]);
    }

    public function cadastrar() {
        $id = $this-> getParam('id');

        $dados_franquia = null;
        $dados_clube = $this-> clube ->getAllClube();

        if ($id) {
            $dados_franquia = $this-> franquia-> getById($id);
        }

        return $this-> render('franquia/manipular', [ 
            'dados_franquia' => $dados_franquia,
            'dados_clube' => $dados_clube,
        ]);
    }

    public function salvar() {
        $id = $this-> getParam('id');

        $dados = [
            'nome' => input()-> get('nome'),
            'cnpj' => input()->get('cnpj'),
            'endereco_rua' => input()->get('rua'),
            'endereco_numero' => input()->get('numero'),
            'endereco_bairro' => input()->get('bairro'),
            'endereco_CEP' => input()->get('cep'),
            'estado' => input()->get('estado'),
            'cidade' => input()->get('cidade'),
            'telefone' => input()->get('telefone'),
            'email' => input()->get('email'),
            'fk_clube_futebol_id' => input()->get('clube')
        ];

        // Atualizar

        if ($id) {
            if ($this-> franquia-> updateById($id, $dados)) {
                session()-> put('_sucesso', 'Registro atualizado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao atualizar o registro!');
            }
        }else {
            if ($this-> franquia-> insert($dados)){
                session()-> put('_sucesso', 'Registro cadastrado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao cadastrar o registro!');
            }
        }
        return redirect()-> route('franquia.index');
    }

    public function excluir() {
        $idFix = $this->getParam('id');
        if($this->franquia->deleteFranquiaById($idFix)){
            session()->put('_sucesso', 'Registro excluído com sucesso');
        }else{
            session()->put('_erro', 'Erro ao excluir o registro');
        }

        return redirect()->route('franquia.index');
    }
}