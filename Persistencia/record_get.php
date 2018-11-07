<?php

require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerTXT.php';
require_once 'classes/api/Record.php';
require_once 'classes/model/Produto.php';

try {
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('log_find.txt'));
    Transaction::log('Buscando um Produto');

    $p1 = Produto::find(1);
    print $p1->descricao;
    Transaction::close();

} catch (Exception $e) {
    Transaction::rollback();
    print $e->getMessage();
}