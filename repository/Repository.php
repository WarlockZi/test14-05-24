<?php

namespace repository;


use db\DB;

class Repository
{
    protected DB $db;
    protected array $result;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        $this->db->query($sql);
    }

    public function toJson()
    {
        return json_encode($this->result);

    }

}