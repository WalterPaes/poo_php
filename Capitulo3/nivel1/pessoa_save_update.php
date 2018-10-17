<?php

$dados = $_POST;

if ($dados['id']) {

	$conn = mysqli_connect('localhost', 'root', '', 'livro');

	$sql = "UPDATE pessoa SET nome = '{$dados['nome']}', endereco = '{$dados['endereco']}', bairro = '{$dados['bairro']}', telefone = '{$dados['telefone']}', email = '{$dados['email']}', id_cidade = '{$dados['id_cidade']}' WHERE id = '{$dados['id']}'";

	$result = mysqli_query($conn, $sql);

	if ($result) {
		print 'Registro Atualizado com sucesso!';
	} else {
		print mysqli_error();
	}

	mysqli_close($conn);
}