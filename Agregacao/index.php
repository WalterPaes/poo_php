<?php

require_once 'Classes/Cesta.php';
require_once 'Classes/Produto.php';

$p1 = new Produto('Chocolate', 10, 5);
$p2 = new Produto('Café', 100, 7);
$p3 = new Produto('Mostarda', 50, 3);

$c1 = new Cesta;
$c1->addItem($p1);
$c1->addItem($p2);
$c1->addItem($p3);

foreach ($c1->getItens() as $item) {
	print 'Item: ' . $item->getDescricao() . '<br/>';
}