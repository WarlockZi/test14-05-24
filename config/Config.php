<?php

namespace config;
class Config
{
    public string $DB_DSN;
    public string $DB_USER;
    public string $DB_PASSWORD;

    public function __construct()
    {
        $this->DB_USER     = 'root';
        $this->DB_PASSWORD = 'root';
        $this->DB_DSN = 'mysql:host=localhost;dbname=test_14_05_24;charset=utf8';
    }
}