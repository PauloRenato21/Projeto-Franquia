<?php 
return [
    /*
     * Aqui pode-se documentar as páginas do sistema, para facilitar
     * a escrita dos redirecionamentos. Exemplo:
     *
     * return Redirect::route('index');
     *
     * Sintaxe:
     *
     * 'nome' => ['controlador', 'método']
     */

    'index' => ['index', 'index'],
    
    'login.index' => ['login', 'index'],
    'login.validar' => ['login', 'validar'],
    'login.logout' => ['login', 'logout'],

    'cargo.index' => ['cargo', 'index'],
    'cargo.cadastrar' => ['cargo', 'cadastrar'],
    'cargo.salvar' => ['cargo', 'salvar'],
    'cargo.excluir' => ['cargo', 'excluir']
];
