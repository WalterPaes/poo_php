<?php
require_once 'Classes/Conta.php';
require_once 'Classes/ContaCorrente.php';
require_once 'Classes/ContaPoupanca.php';

$contas = array();
$contas[] = new ContaCorrente(6677, "CC.1234.56", 100, 500);
$contas[] = new ContaPoupanca(6678, "PP.1234.57", 100);

foreach ($contas as $key => $conta) {
	print $conta->getInfo() . "<br/>";
	print "Saldo Atual: {$conta->getSaldo()}<br/>";
	$conta->depositar(200);
	print "Depósito de: 200<br/>";
	print "Saldo Atual: {$conta->getSaldo()}<br/>";

	if ($conta->retirar(700)) {
		print "Retirada de: 700<br/>";
	} else {
		print "Retirada de: 700 (Não Permitida)<br/>";
	}

	print "Saldo Atual: {$conta->getSaldo()} <br/>\n";
}