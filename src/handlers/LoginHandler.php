<?php

namespace src\handlers;

session_start();


use src\models\User;

class LoginHandler
{
    public static function checkLogin() {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            $user = User::select()->where('token', $token)->one();
            
            if ($user) {
                $loggedUser = new User();
                $loggedUser->id = $user['id'];
                $loggedUser->name = $user['name'];
                $loggedUser->email = $user['email'];
                $loggedUser->token = $user['token'];
    
                return $loggedUser; // Retorna o objeto do usuário logado
            }
        }
        return false; // Retorna false se o usuário não estiver logado
    }
    






    public static function verifyLogin($email, $password)
    {
        $user = User::select()->where('email', $email)->one();


        if ($user) {
            if (password_verify($password, $user['password'])) {
                $token = md5(time() . rand(0, 9999) . time());

                // Atualiza o token no banco de dados
                User::update()->set('token', $token)->where('email', $email)->execute();
                return $token;  // Retorna o token
            } else {
                echo "Senha incorreta!";
            }
        } else {
            echo "Usuário não encontrado!";
        }
        return false;  // Retorna false se falhar
    }



    public static function idExists($id)
    {
        $user = User::select()->where('id', $id)->one();
        return $user ? true : false;
    }

    public static function emailExists($email)
    {
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }


    public static function addUser($name, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time() . rand(0, 9999) . time());
        User::insert([
            'name' => $name,
            'email' => $email,
            'password' => $hash,
            'token' => $token
        ])->execute();

        return $token;
    }


    
}
