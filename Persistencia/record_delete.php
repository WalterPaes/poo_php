<?php

require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerTXT.php';
require_once 'classes/api/Record.php';
require_once 'classes/model/Produto.php';

try {
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('log_delete.txt'));
    Transaction::log('Removendo um produto!');

    $p1 = Produto::find(0);

    if ($p1 instanceof Produto) {
        $p1->delete();
    } else {
        throw new Exception('Produto Não Localizado');
    }

} catch (Exception $e) {
    Transaction::rollback();
    print $e->getMessage();
}