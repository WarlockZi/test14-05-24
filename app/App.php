<?php

namespace app;
use core\Router;

class App
{
    public Router $router;
    protected string $url;
    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->router = new Router();
    }
}