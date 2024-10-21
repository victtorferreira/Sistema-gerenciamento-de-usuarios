<?php
namespace src;

class Config {
    const BASE_DIR = '/contactHub-mvc/public';

    const DB_DRIVER = 'mysql';
    const DB_HOST = '127.0.0.1';
    const DB_DATABASE = 'contacts';
    CONST DB_USER = 'root';
    const DB_PASS = '1234';

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION = 'index';
}