<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->post('/contatos', 'ContatoController@addContact');

$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');


$router->get('/cadastro', 'LoginController@register');
$router->post('/cadastro', 'LoginController@registerAction');

$router->get('/usuario/{id}/editar', 'ContatoController@edit');
$router->post('/usuario/{id}/editar', 'ContatoController@editAction');


$router->get('/usuario/{id}/excluir','ContatoController@deleteUser');

$router->get('/contatos/pesquisar', 'ContatoController@search');


$router->get('/sair', 'LoginController@logout');