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

$pagina = new PessoaControl;
$pagina->show($_GET);