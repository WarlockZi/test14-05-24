<?php
require_once 'bootsrap.php';

try {
    $app = 1;
    $app = new \app\App();
    $app->router->dispatch();
} catch (Throwable $exception) {
    echo $exception->getMessage();
}
exit;