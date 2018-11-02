<?php

require_once 'veiculo.php';

$rm = new ReflectionMethod('Automovel', 'setPlaca');

print $rm->getName() . '<br>';
print $rm->isPrivate() ? 'É privado' : 'Não é privado';
print '<br>';
print $rm->isStatic() ? 'É estático' : 'Não é estático';
print '<br>';
print $rm->isFinal() ? 'É final' : 'Não é final';
print '<br>';
echo '<pre>';
print_r($rm->getParameters());