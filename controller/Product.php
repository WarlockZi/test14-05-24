<?php

namespace controller;

use core\Route;
use repository\ProductRepository;
use repository\UserRepository;

class Product extends Controller
{
    private ProductRepository $repo;

    public function __construct(Route $route)
    {
        parent::__construct($route);
        $this->repo = new ProductRepository();
    }

    public function create()
    {
        if (!isset($_POST['title'])||!isset($_POST['price'])) return;
        $this->repo->create($_POST);

    }
    public function show()
    {

    }

}