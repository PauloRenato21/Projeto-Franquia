<?php
namespace Admin2504\Controllers;

use Foundation\Controller;
use Admin2504\Models\Categoria;

class CategoriaController extends Controller
{
    protected $categoria;

    public function __construct() {

        $this-> categoria = new Categoria(); 
    }

    public function index() {
        $dados_categoria = $this-> categoria-> getAllCategoria();
        
        return $this-> render('categoria/index', [
            'dados_categoria' => $dados_categoria,
        ]);
    }

    public function cadastrar() {
        $id = $this-> getParam('id');

        $dados_categoria = null;

        if ($id) {
            $dados_categoria = $this-> categoria-> getById($id);
        }

        return $this-> render('categoria/manipulador', [ 
            'dados_categoria' => $dados_categoria,
        ]);
    }

    public function salvar() {
        $id = $this-> getParam('id');

        $dados = [
            'nome' => input()-> get('nome')
        ];

        // Atualizar

        if ($id) {
            if ($this-> categoria-> updateById($id, $dados)) {
                session()-> put('_sucesso', 'Registro atualizado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao atualizar o registro!');
            }
        }else {
            if ($this-> categoria-> insert($dados)){
                session()-> put('_sucesso', 'Registro cadastrado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao cadastrar o registro!');
            }
        }
        return redirect()-> route('categoria.index');
    }

    public function excluir() {
        $idFix = $this->getParam('id');
        if($this->categoria->deleteCategoriaById($idFix)){
            session()->put('_sucesso', 'Registro excluído com sucesso');
        }else{
            session()->put('_erro', 'Erro ao excluir o registro');
        }

        return redirect()->route('categoria.index');
    }
}