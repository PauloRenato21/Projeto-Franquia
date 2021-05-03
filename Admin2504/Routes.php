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
    'cargo.excluir' => ['cargo', 'excluir'],

    'atleta.index' => ['atleta', 'index'],
    'atleta.cadastrar' => ['atleta', 'cadastrar'],
    'atleta.salvar' => ['atleta', 'salvar'],
    'atleta.excluir' => ['atleta', 'excluir'],

    'responsavel.index' => ['responsavel', 'index'],
    'responsavel.cadastrar' => ['responsavel', 'cadastrar'],
    'responsavel.salvar' => ['responsavel', 'salvar'],
    'responsavel.excluir' => ['responsavel', 'excluir'],
    
    'clubeFutebol.index' =>['Clube','index'],
    'clubeFutebol.cadastrar' => ['Clube','cadastrar'],
    'clubeFutebol.salvar' => ['Clube','salvar'],
    'clubeFutebol.excluir' => ['Clube','excluir'],

    'franquia.index' => ['Franquia','index'],
    'franquia.cadastrar' => ['Franquia','cadastrar'],
    'franquia.salvar' => ['Franquia','salvar'],
    'franquia.excluir' => ['Franquia','excluir'],

    'categoria.index' => ['Categoria','index'],
    'categoria.cadastrar' => ['Categoria','cadastrar'],
    'categoria.salvar' => ['Categoria','salvar'],
    'categoria.excluir' => ['Categoria','excluir'],

    'turma.index' => ['Turma','index'],
    'turma.cadastrar' => ['Turma','cadastrar'],
    'turma.salvar' => ['Turma','salvar'],
    'turma.excluir' => ['Turma','excluir'],

    'funcionario.index' => ['Funcionario','index'],
    'funcionario.cadastrar' => ['Funcionario','cadastrar'],
    'funcionario.salvar' => ['Funcionario','salvar'],
    'funcionario.excluir' => ['Funcionario','excluir'],

    'funcionarioTurma.vincular' => ['FuncionarioTurma','vincular'],
    'funcionarioTurma.salvar' => ['FuncionarioTurma','salvar']
];
