<?php
namespace Admin2504\Controllers;

use Foundation\Controller;
use Admin2504\Models\Turma;
use Admin2504\Models\Categoria;
use Admin2504\Models\Franquia;
use Foundation\Pdf\HelperPDF;

class TurmaController extends Controller
{
    protected $turma;
    protected $categoria;
    protected $franquia;

    public function __construct() {

        $this-> turma = new Turma(); 
        $this-> categoria = new Categoria();
        $this-> franquia = new Franquia();
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
        $dados_categoria = $this->categoria->getAllCategoria();
        $dados_franquia = $this->franquia->getAllFranquia();

        if ($id) {
            $dados_turma = $this-> turma-> getById($id);
        }

        return $this-> render('turma/manipulador', [ 
            'dados_turma' => $dados_turma,
            'dados_categoria' => $dados_categoria,
            'dados_franquia' => $dados_franquia,
        ]);
    }

    public function salvar() {
        $id = $this-> getParam('id');

        $dados = [
            'nome' => input()-> get('nome'),
            'turno' => input()-> get('turno'),
            'horario_inicial' => input()-> get('horario_inicial'),
            'horario_termino' => input()-> get('horario_termino'),
            'fk_categoria_id' => input()->get('categoria'),
            'fk_franquias_id' => input()->get('franquia')
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
            session()->put('_sucesso', 'Registro exclu??do com sucesso');
        }else{
            session()->put('_erro', 'Erro ao excluir o registro');
        }

        return redirect()->route('turma.index');
    }

    public function criarpdfgeral(){
        $dados_turma = $this->turma->getAllTurma();

        //BEGIN: CRIAR PDF
        ob_start();
        $view = dirname(__FILE__)."/../Views/pdf/pdfTurma.phtml";
        include_once $view;
        $html = ob_get_clean();

        $pdf = new HelperPDF();
        $nome_arquivo = $pdf->criar($html);
        //END: CRIAR PDF
        
        //BEGIN: PREPARAR E INICIAR O DOWNLOAD DO PDF
        $arquivo = DIR_BASE . "/public/temp/pdf/". $nome_arquivo . ".pdf";

        $file = fopen($arquivo, "r");

        header('Content-Disposition: attachment; filename=' . $nome_arquivo . '.pdf');
        header('Content-Type: application/pdf');
        header('Content-Type: application/download');
        header('Content-Description: File Transfer');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit();
        //END: PREPARAR E INICIAR O DOWNLOAD DO PDF
    }
}