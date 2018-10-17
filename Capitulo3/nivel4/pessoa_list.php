<?php
require 'db/pessoa_db.php';

if (!empty($_GET['action']) && $_GET['action'] == 'delete') {
    $id = (int) $_GET['id'];
    exclui_pessoa($id);
}

$pessoas = lista_pessoas();

$itens = '';
if ($pessoas) {
    foreach($pessoas as $pessoa){
        $item = file_get_contents('html/item.html');
        $item = str_replace('{id}', $pessoa['id'], $item);
        $item = str_replace('{nome}', $pessoa['nome'], $item);
        $item = str_replace('{endereco}', $pessoa['endereco'], $item);
        $item = str_replace('{bairro}', $pessoa['bairro'], $item);
        $item = str_replace('{telefone}', $pessoa['telefone'], $item);

        $itens .= $item;
    }
}

$list = file_get_contents('html/list.html');
$list = str_replace('{itens}', $itens, $list);
print $list;