<?php
define('NOME_SITE', 'Franquia Escola de Futebol');
define('DIR_BASE', 'http://franquias.com');
define('URL_IMG_PUBLIC', DIR_BASE.'/public/app/assets/img/conteudo/');
define('PATH_IMG_PUBLIC', $_SERVER['DOCUMENT_ROOT'].'/public/app/assets/img/conteudo/');

// Caminho dos arquivos de visão
Container::set('app.view.path', __DIR__ . '/App/Views/');
Container::set('admin2504.view.path', __DIR__ . '/Admin2504/Views/');

// URL da aplicação
Container::set('app.url', 'http://franquias.com/public');

Container::set('app.db.config', [
    'sgdb' => 'mysql',
    'host' => 'sonserina.mysql.dbaas.com.br',
    'database' => 'sonserina',
    'user' => 'sonserina',
    'password' => 'qwe123qwe'
]);

// Rotas
Container::set('app.routes', require __DIR__ . '/App/Routes.php');
Container::set('admin2504.routes', require __DIR__ . '/Admin2504/Routes.php');

// Classes
Container::set('base.database.db', function() {
    $data = array_values(Container::get('app.db.config'));
    return new Foundation\Database\Db(...$data);
});

Container::set('base.modules', ['App', 'Admin2504']);
Container::set('module.default', 'App');


Container::set('base.http.session', new Foundation\Http\Session());
Container::set('base.http.input', new Foundation\Http\Input());
Container::set('base.http.redirect', new Foundation\Http\Redirect());
Container::set('base.html.assets', new Foundation\Html\Assets());
Container::set('base.html.url', new Foundation\Html\Url());
Container::set('base.html.date', new Foundation\Html\Date());