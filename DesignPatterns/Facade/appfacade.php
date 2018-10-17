<?php
require_once 'PagSeguroFacade.php';

$ps = new PagSeguroFacade('BRL');

$product = new stdClass;
$product->id = 5;
$product->description = 'Pendrive';
$product->price = 10;

$ps->addItem($product, 3);

echo "<pre>";
var_dump($ps);