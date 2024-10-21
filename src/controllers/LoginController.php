<?php
namespace src\controllers;
use \core\Controller;
use src\handlers\LoginHandler;

class LoginController extends Controller {

    public function login() {
        $this->render('login');       
    }


    public function register () {
        $this->render('cadastro');
    }

    public function loginAction() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'senha');
    
        if($email && $password) {    
            $token = LoginHandler::verifyLogin($email, $password);
            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else { 
                echo "Email ou senha inválidos";
                exit;
            }
        } else {
            echo "Preencha todos os campos";
            exit;
        }
    }
    
    
    public function registerAction() {
        $name = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'passoword');

        if($name && $email && $password) {
            if(LoginHandler::emailExists($email) === false) {
                $token = LoginHandler::addUser($name, $email, $password);
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['error'] = 'Email já existe';
                $this->redirect('/cadastro');
            }
        } else {
            $_SESSION['error'] = 'Preencha todos os campos';
            $this->redirect('/cadastro');
        }
    }


    public function logout() {
        unset($_SESSION['token']);
        session_destroy();
        $this->redirect('/login');
    }

 

    

}