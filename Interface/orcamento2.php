<?php

require_once 'Classes/Orcamento.php';
require_once 'Classes/OrcavelInterface.php';
require_once 'Classes/Produto.php';
require_once 'Classes/Servico.php';

$o = new Orcamento;
$o->adiciona(new Produto('Máquina de Café', 10, 299), 1);
$o->adiciona(new Produto('Barbeador Elétrico', 10, 170), 1);
$o->adiciona(new Produto('Barra de chocolate', 10, 7), 3);

$o->adiciona(new Servico('Corte de Grama', 20), 1);
$o->adiciona(new Servico('Corte de Barba', 20), 1);
$o->adiciona(new Servico('Limpeza de Apartamento', 50), 1);

print $o->calculaTotal();