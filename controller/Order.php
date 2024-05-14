<?php

namespace controller;

use core\Route;
use repository\OrdersRepository;

class Order extends Controller
{
    private OrdersRepository $repo;

    public function __construct(Route $route)
    {
        parent::__construct($route);
        $this->repo = new OrdersRepository();
    }

    public function index()
    {
        echo 'order';
    }

    public function all()
    {
        $orders       = $this->repo->all()->toJson();
        $this->vars = compact('orders');
    }
}