<?php
namespace Admin2504\Controllers;

use Foundation\Controller;
use Admin2504\Models\Clube;

class ClubeController extends Controller
{
    protected $clube;

    public function __construct() {

        $this-> clube = new Clube(); 
    }

    public function index() {
        $dados_clube = $this-> clube-> getAllClube();
        
        return $this-> render('clubeFutebol/index', [
            'dados_clube' => $dados_clube,
        ]);
    }

    public function cadastrar() {
        $id = $this-> getParam('id');

        $dados_clube = null;

        if ($id) {
            $dados_clube = $this-> clube-> getById($id);
        }

        return $this-> render('clubeFutebol/manipular', [ 
            'dados_clube' => $dados_clube,
        ]);
    }

    public function salvar() {
        $id = $this-> getParam('id');

        $dados = [
            'nome' => input()-> get('nome'),
            'cnpj' => input()->get('cnpj')
        ];

        // Atualizar

        if ($id) {
            if ($this-> clube-> updateById($id, $dados)) {
                session()-> put('_sucesso', 'Registro atualizado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao atualizar o registro!');
            }
        }else {
            if ($this-> clube-> insert($dados)){
                session()-> put('_sucesso', 'Registro cadastrado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao cadastrar o registro!');
            }
        }
        return redirect()-> route('clubeFutebol.index');
    }

    public function excluir() {
        $idFix = $this->getParam('id');
        if($this->clube->deleteClubeById($idFix)){
            session()->put('_sucesso', 'Registro excluído com sucesso');
        }else{
            session()->put('_erro', 'Erro ao excluir o registro');
        }

        return redirect()->route('clubeFutebol.index');
    }
}