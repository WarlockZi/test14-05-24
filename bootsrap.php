<?php
function my_autoloader($class)
{
    $className = $class . '.php';
    try {
        if (file_exists($className)) {
            require $className;
        }
    } catch (Throwable $exception) {
        echo "Класса не существует";
    }
}

spl_autoload_register('my_autoloader');



