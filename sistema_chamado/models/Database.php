<?php
class Database {
    private static $instance;

    public static function getConnection() {
        if (!self::$instance) {
            date_default_timezone_set('America/Sao_Paulo');
            $host = '127.0.0.1';
            $db   = 'sistema_chamados';
            $user = 'root';
            $pass = '';
            $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
            

            self::$instance = new PDO($dsn, $user, $pass);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }
}
