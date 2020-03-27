<?php

$router->add('/', [
    'controller' => 'index',
    'action' => 'index',
]);

$router->notFound([
    "controller" => "index",
    "action" => "route404"
]);

$router->handle($_SERVER['REQUEST_URI']);
