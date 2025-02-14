<?php

require '../vendor/autoload.php';

session_start();

$container = require '../app/config/container.php';
$router = new \app\library\Router($container);
