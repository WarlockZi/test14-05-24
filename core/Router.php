<?php

namespace core;

use controller\Main;

class Router
{
    protected Route $route;
    protected string $url;
    protected string $method;

    public function __construct()
    {
        $this->route         = new Route();
        $this->route->method = $_SERVER['REQUEST_METHOD'];
        $this->url           = $_SERVER['REQUEST_URI'];
    }

    public function dispatch()
    {
        $matches = explode('/', $this->url);

        if ((isset($matches[1])&&$matches[1]) && (isset($matches[2])&&$matches[2])) {
            $controller = $this->getController($matches);
            $controller = new $controller($this->route);
            $action     = $this->setAction($this->route, $matches);
            $controller->$action();
            $controller->render();

        } elseif (isset($matches[1]) && $matches[1]) {
            $controller              = $this->getController($matches);
            $this->route->controller = $matches[1];

            $this->route->action = 'all';
            $controller          = new $controller($this->route);
            $action              = $this->route->action;
            $controller->$action();
            $controller->render();
        } else {
            $controller = new Main($this->route);
            $controller->render();
        }
    }


    protected function getController($matches): string
    {
        return 'controller\\' . ucfirst($matches[1]);
    }

    protected function setAction(Route $route, $matches): string
    {
        $this->route->controller = $matches[1];
        $this->route->id         = (int)$matches[2];
        if ($route->method === 'DELETE') {
            $this->route->action = 'delete';
            return 'delete';
        } elseif ($route->method === 'UPDATE') {
            $this->route->action = 'update';
            return 'update';
        } elseif ($route->method === 'GET') {
            $this->route->action = 'show';
            return 'show';
        } elseif ($route->method === 'POST') {
            $this->route->action = 'create';
            return 'create';
        }

        $this->route->action = 'one';
        return 'one';
    }
}