<?php

require_once 'Classes/Fabricante.php';
require_once 'Classes/Produto.php';

$p1 = new Produto('Chocolate', 10, 7);
$f1 = new Fabricante('Chocolate Factory', 'Willy Wonka Street', '123456789');

$p1->setFabricante($f1);

print 'A descrição é ' . $p1->getDescricao() . '<br/>';
print 'O Fabricante é ' . $p1->getFabricante()->getNome() . '<br/>';