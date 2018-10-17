<?php
class Titulo {
    private $data;

    public function __get($propriedade) {
        return $this->data[$propriedade];
    }

    public function __set($propriedade, $valor) {
        $this->data[$propriedade] = $valor;
    }

    public function __isset($propriedade) {
        return isset($this->data[$propriedade]);
    }

    public function __unset($propriedade) {
        unset($this->data[$propriedade]);
    }
}

$titulo = new Titulo;
$titulo->valor = 12345;