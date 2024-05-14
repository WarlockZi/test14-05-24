<?php

namespace db;


use config\Config;
use PDO;

class DB
{

    public $pdo;
    protected static $instance;

    public function __construct()
    {

        $conf  = new Config();
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try {
            $this->pdo = new PDO($conf->DB_DSN, $conf->DB_USER,$conf->DB_PASSWORD, $options);
        } catch (\PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function execute($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        try {
            return $stmt->execute($params);
        } catch (\Exception $exception) {
            exit($exception);
        }
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $res  = $stmt->execute($params);
        if ($res !== false) {
            return $stmt->fetchAll();
        }
        return [];
    }
}