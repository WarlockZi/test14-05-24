<?php

namespace repository;

class OrdersRepository extends Repository
{
    protected string $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'user_order';
    }

    public function all(): OrdersRepository
    {
        $sql = "SELECT p.id, p.title, p.price, u.id, u.first_name, u.second_name, user_id, product_id  FROM user_order ".
            "LEFT JOIN user as u ".
            "ON user_id=u.id ".
            "LEFT JOIN products as p ".
            "ON product_id=p.id ".
            "ORDER BY u.first_name, p.title ASC, cast(p.price as float) DESC ";
        $this->result = $this->db->query($sql, []);
        return $this;
    }
}

