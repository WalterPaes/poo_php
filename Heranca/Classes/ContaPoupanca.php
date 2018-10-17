<?php

final class ContaPoupanca extends Conta
{
	public function retirar($quantia)
	{
		if ($this->saldo >= $quantia) {
			$this->sadlo -= $quantia;
		} else {
			return false;
		}

		return true;
	}
}