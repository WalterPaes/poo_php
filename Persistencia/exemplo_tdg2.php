<?php

require_once 'classes/tdg/Produto.php';
require_once 'classes/tdg/ProdutoGateway.php';

try {
    $conn = new PDO('mysql:host=localhost;dbname=estoque;cahrset=utf8mb4', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ProdutoGateway::setConnection($conn);

    $produtos = Produto::all();
    foreach ($produtos as $produto) {
        $produto->delete();
    }

    $produto = new Produto;
    $produto->descricao = 'Vinho Brasileiro Tinto Merlot';
    $produto->estoque = 10;
    $produto->preco_custo = 12;
    $produto->preco_venda = 18;
    $produto->codigo_barras = '13523453234234';
    $produto->data_cadastro = date('Y-m-d');
    $produto->origem = 'N';
    $produto->save();

    $outro = Produto::find(1);
    print 'Descrição: ' . $outro->descricao . '<br>';
    print 'Lucro: ' . $outro->getMargemLucro() . '% <br>';

    $outro->registraCompra(14, 5);
    $outro->save();
} catch (Exception $e) {
    print $e->getMessage();
}