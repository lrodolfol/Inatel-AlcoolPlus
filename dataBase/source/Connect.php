<?php
namespace database\source;

class Connect {
	
	private const OPTIONS = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::ATTR_CASE => \PDO::CASE_NATURAL
    ];

    private static $instance;
    
    public static function getInstance(): \PDO {
        if (empty(self::$instance)) {
            try {
                define("CONF_DB_HOST", "127.0.0.1");
                define("CONF_DB_NAME", "alcool_plus");
                define("CONF_DB_USER", "root");
                define("CONF_DB_PASS", "");
                self::$instance = new \PDO(
                    "mysql:host=" . CONF_DB_HOST . ";dbname=" . CONF_DB_NAME,
                    CONF_DB_USER,
                    CONF_DB_PASS,
                    self::OPTIONS
                );
            } catch (\PDOException $exception) {
                die("<h1>Whoops! Erro ao conectar no BD. Verifique se o arquivo .sql foi importado corretamente</h1>");
            }
        }

        return self::$instance;
    }
	
	
}