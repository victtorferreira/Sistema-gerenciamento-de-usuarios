<?php

namespace src\controllers;

session_start();

use core\Controller;
use src\handlers\LoginHandler;
use src\models\Contato;

class ContatoController extends Controller
{

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();

        if ($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }
    public function addContact()
    {
        $name = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'telefone');

        if ($name && $email && $phone) {
            $usuarioId = $this->loggedUser->id;

            // Verifique se o ID do usuário é válido
            if ($usuarioId) {


                // Inserção do contato
                Contato::insert([
                    'nome' => $name,
                    'email' => $email,
                    'telefone' => $phone,
                    'usuario_id' => $usuarioId
                ])->execute();
                $this->redirect('/');
            } else {
                echo "ID do Usuário está nulo. Não é possível adicionar contato.";
            }
        } else {
            echo "Preencha todos os campos.";
        }
    }









    public function edit($id)
    {
        $contato = Contato::select()->find($id['id']);
        $this->render('edit', [
            'contato' => $contato
        ]);
    }


    public function editAction($id)
    {
        $usuarioId = $this->loggedUser->id;
        $name = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'telefone');

        if ($name && $email && $phone) {
            Contato::update()
                ->set('nome', $name)
                ->set('email', $email)
                ->set('telefone', $phone)
                ->where('id', $id['id'])
                ->where('usuario_id', $usuarioId)
                ->execute();
        }

        $this->redirect('/');
    }

    public function deleteUser($id)
    {
        $usuarioId = $this->loggedUser->id;
        Contato::delete()->where('id', $id['id'])->where('usuario_id', $usuarioId)->execute();
        $this->redirect('/');
    }


    public function search()
    {
        $search = filter_input(INPUT_GET, 'pesquisa');

        
        $usuarioId = $this->loggedUser->id;

        if (!empty($search)) {
            
            $contatos = Contato::select()
                ->where('usuario_id', $usuarioId) 
                ->where(function ($query) use ($search) {
                    $query->where('nome', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('telefone', 'like', "%$search%");
                })
                ->get();


            $this->render('home', [
                'contatos' => $contatos,
                'pesquisa' => $search
            ]);
        } else {

            $this->redirect('/');
        }
    }
}
