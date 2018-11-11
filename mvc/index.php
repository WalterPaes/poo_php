<?php

// Loaders
require_once 'Lib/Livro/Core/ClassLoader.php';
require_once 'Lib/Livro/Core/AppLoader.php';

$al = new Livro\Core\ClassLoader;
$al->addNamespace('Livro', 'Lib/Livro');
$al->register();

$al = new Livro\Core\AppLoader;
$al->addDirectory('App/Control');
$al->addDirectory('App/Model');
$al->register();

//$loader = require 'vendor/autoload.php';
//$loader->register();

if ($_GET) {
    $class = $_GET['class'];
    if (class_exists($class)) {
        $pagina = new $class;
        $pagina->show();
    }
}