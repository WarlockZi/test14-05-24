<?php

namespace repository;

class ProductRepository extends Repository
{
    protected string $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'products';
    }

    public function create($data)
    {

        $title = (string)$data['title'];
        $price = (int)$data['price'];
        $sql = "INSERT INTO {$this->table} SET title=?, price=?";
        $res = $this->db->execute($sql, [$title, $price]);
        if ($res) header('Location:/');
    }

}