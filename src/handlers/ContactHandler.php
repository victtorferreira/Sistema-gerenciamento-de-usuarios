<?php

namespace src\handlers;

use src\models\Contato;

class ContactHandler
{
    public static function emailExists($email)
    {
        $email = Contato::select()->where('email', $email)->one();
        return $email ? true : false;
    }


    public static function phoneExists($phone)
    {
        // Verifica se existe um contato com o telefone fornecido
        return Contato::select()->where('telefone', $phone)->one();
        return $phone ? true : false;
    }
    

}
