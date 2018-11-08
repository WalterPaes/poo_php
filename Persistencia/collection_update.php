<?php

require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Criteria.php';
require_once 'classes/api/Repository.php';
require_once 'classes/api/Record.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerTXT.php';
require_once 'classes/model/Produto.php';

try {
    // inicia a transação com a base de dados
    Transaction::open('estoque');

    // Define o arquivo para LOG
    Transaction::setLogger(new LoggerTXT('log_collection_update.txt'));

    // Define o critério de seleçãoo
    $criteria = new Criteria;
    $criteria->add('preco_venda', '<=', 35);
    $criteria->add('origem', '=', 'N');

    // Cria o repositório
    $repository = new Repository('Produto');
    
    // Carrega os objetos conforme o critério
    $produtos = $repository->load($criteria);
    if ($produtos) {
        // percorre todos os objetos
        foreach ($produtos as $produto) {
            $produto->preco_venda *= 1.3;
            $produto->store();
        }
    }
    Transaction::close(); // fecha a transação

} catch(Exception $e) {
    echo $e->getMessage();
    Transaction::rollback();
}