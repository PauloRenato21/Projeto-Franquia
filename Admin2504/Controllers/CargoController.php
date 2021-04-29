<?php
namespace Admin2504\Controllers;

use Foundation\Controller;
use Admin2504\Models\Cargo;

class CargoController extends Controller
{
    protected $cargo;

    public function __construct() {

        $this-> cargo = new Cargo(); 
    }

    public function index() {
        $dados_cargo = $this-> cargo-> getAllCargo();
        
        return $this-> render('cargo/index', [
            'dados_cargo' => $dados_cargo,
        ]);
    }

    public function cadastrar() {
        $id = $this-> getParam('id');

        $dados_cargo = null;

        if ($id) {
            $dados_cargo = $this-> cargo-> getById($id);
        }

        return $this-> render('cargo/manipular', [ 
            'dados_cargo' => $dados_cargo,
        ]);
    }

    public function salvar() {
        $id = $this-> getParam('id');

        $dados = [
            'nome' => input()-> get('nome')
        ];

        // Atualizar

        if ($id) {
            if ($this-> cargo-> updateById($id, $dados)) {
                session()-> put('_sucesso', 'Registro atualizado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao atualizar o registro!');
            }
        }else {
            if ($this-> cargo-> insert($dados)){
                session()-> put('_sucesso', 'Registro cadastrado com sucesso!');
            }else {
                session()-> put('_erro', 'Erro ao cadastrar o registro!');
            }
        }
        return redirect()-> route('cargo.index');
    }

    public function excluir() {
        $idFix = $this->getParam('id');
        if($this->cargo->deleteCargoById($idFix)){
            session()->put('_sucesso', 'Registro excluído com sucesso');
        }else{
            session()->put('_erro', 'Erro ao excluir o registro');
        }

        return redirect()->route('cargo.index');
    }
}