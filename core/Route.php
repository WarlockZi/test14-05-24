<?php

namespace core;
class Route
{
    public string $method;
    public string $controller;
    public string $action;
    public int $id;

    public function __construct()
    {
        $this->method     = "GET";
        $this->controller = 'main';
        $this->action = 'index';
        $this->id     = 0;
    }

}