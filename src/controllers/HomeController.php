<?php
namespace src\controllers;
session_start();
use \core\Controller;
use src\handlers\LoginHandler;
use src\models\Contato;

class HomeController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
    
        if ($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        // Agora você pode acessar o ID diretamente a partir do objeto $loggedUser
        $usuarioId = $this->loggedUser->id;
        

        // Obtém os contatos do usuário logado
        $contatos = Contato::select()->where('usuario_id', $usuarioId)->get();
        

        // Renderiza a página home com os dados do usuário e os contatos
        $this->render('home', [
            'loggedUser' => $this->loggedUser,
            'contatos' => $contatos
        ]);
    }
}
