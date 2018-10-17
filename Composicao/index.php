<?php

require_once 'Classes/Produto.php';
require_once 'Classes/Caracteristica.php';

$p1 = new Produto('Chocolate', 10, 7);

$p1->addCaracteristica('Cor', 'Branco');
$p1->addCaracteristica('Peso', '2.6');
$p1->addCaracteristica('Potência', '20 watts RMS');

print 'Produto: ' . $p1->getDescricao() . '<br/>';

foreach ($p1->getCaracteristicas() as $c) {
	print 'Característica' . $c->getNome() . ' - ' . $c->getValor() . '<br/>';
}