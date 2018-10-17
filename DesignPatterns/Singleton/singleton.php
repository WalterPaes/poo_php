<?php

require_once 'Classes/Preferencias.php';

$p1 = Preferencias::getInstance();
echo 'A linguagem é: ' . $p1->getData('language') . '<br/>';

$p1->setData('language', 'pt');
echo 'A linguagem é: ' . $p1->getData('language') . '<br/>';

$p2 = Preferencias::getInstance();
echo 'A linguagem é: ' . $p2->getData('language') . '<br/>';

//$p1->save();