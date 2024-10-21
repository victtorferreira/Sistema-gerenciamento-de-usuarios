<?php
namespace core;

use src\Config;

class Request {

    public static function getUrl() {
        // Verifica se a URL foi passada, caso contrário, atribui uma string vazia
        $url = filter_input(INPUT_GET, 'request') ?? '';
        $url = str_replace(Config::BASE_DIR, '', $url);
        return '/' . trim($url, '/'); // Remover qualquer barra extra no início ou fim
    }

    public static function getMethod() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

}
