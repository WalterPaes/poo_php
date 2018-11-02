<?php

require_once 'veiculo.php';

$rm = new ReflectionProperty('Automovel', 'placa');
print $rm->getName() . '<br>';
print $rm->isPrivate() ? 'É privado' : 'Não é privado';
print '<br>';
print $rm->isStatic() ? 'É estático' : 'Não é estático';
print '<br>';