<?php

require __DIR__ . '/../vendor/autoload.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';
require_once 'config/config.php';

$router = new \Bramus\Router\Router();


$router->run();
