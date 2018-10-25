<?php

$ingredientes = new SplStack();

// Acrescentando na pilha
$ingredientes->push('Peixe');
$ingredientes->push('Sal');
$ingredientes->push('Limão');

foreach ($ingredientes as $item) {
    print 'Item: ' . $item . '<br/>' . PHP_EOL;
}

print PHP_EOL;

// Removendo da pilha
print $ingredientes->pop() . '<br>';
print 'Count: ' . $ingredientes->count() . '<br>';

print $ingredientes->pop() . '<br>';
print 'Count: ' . $ingredientes->count() . '<br>';

print $ingredientes->pop() . '<br>';
print 'Count: ' . $ingredientes->count() . '<br>';