<?php

$dados = ['salmão', 'tilápia', 'sardinha', 'badejo', 'pescada', 'dourado', 'corvina', 'cavala', 'bagre'];
$objarray = new ArrayObject($dados);

// acrescenta
$objarray->append('bacalhau');

// obtém posição 2
print 'Posição 2: ' . $objarray->offsetGet(2) . '<br>';

// substitui posição 2
$objarray->offsetSet(2, 'linguado');
print 'Posição 2: ' . $objarray->offsetGet(2) . '<br>';

// elimina posição 4
$objarray->offsetUnset(4);

// testa se posição existe
if ($objarray->offsetExists(10)) {
    echo 'Posição 10 encontrada <br>';
} else {
    echo 'Posição 10 não encontrada <br>';
}

print 'Total: ' . $objarray->count();
$objarray[] = 'atum'; //acrescenta
$objarray->natsort(); // ordena

// percorre dados
print '<br>';

foreach ($objarray as $item) {
    print 'Item: ' . $item . '<br>';
}

print $objarray->serialize();