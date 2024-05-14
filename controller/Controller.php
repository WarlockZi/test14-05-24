<?php

namespace controller;

use core\Route;

class Controller
{
    protected Route $route;
    protected array $vars=[];

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    public function getVars():array
    {
        return $this->vars;

    }

    public function render():void
    {
        $dir = dirname(__DIR__);
        $sep = DIRECTORY_SEPARATOR;
        $file = "{$dir}{$sep}view{$sep}{$this->route->controller}{$sep}{$this->route->action}.php";

        if (file_exists($file)) {

            extract($this->vars);
            ob_start();

            include $file;
            echo ob_get_clean();
        }
    }
}