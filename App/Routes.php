<?php

return  [
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

    'atleta' => ['atleta', 'cadastrar'],
    'atleta.salvar' => ['atleta', 'salvar'],

    'responsavel' => ['responsavel', 'cadastrar'],
    'responsavel.salvar' => ['responsavel', 'salvar']
];