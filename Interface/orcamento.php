<?php

require_once 'Classes/Orcamento.php';
require_once 'Classes/Produto.php';

$o = new Orcamento;
$o->adiciona(new Produto('Máquina de Café', 10, 299), 1);
$o->adiciona(new Produto('Barbeador Elétrico', 10, 170), 1);
$o->adiciona(new Produto('Barra de chocolate', 10, 7), 3);
print $o->calculaTotal();