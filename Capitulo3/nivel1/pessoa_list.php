<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listagem de Pessoas</title>
	<link rel="stylesheet" type="text/css" href="css/list.css" media="screen">
</head>
<body>
	<?php

	$conn = mysqli_connect('127.0.0.1', 'root', '', 'livro');
	$result = mysqli_query($conn, 'SELECT * FROM pessoa ORDER BY id');

	print '<table border=1>';
	print '<thead>';
	print '<tr>';
	print '<th></th>';
	print '<th></th>';
	print '<th> Id </th>';
	print '<th> Nome </th>';
	print '<th> Endereço </th>';
	print '<th> Bairro </th>';
	print '<th> Telefone </th>';
	print '</tr>';
	print '</thead>';

	print '<tbody>';

	while ($row = mysqli_fetch_assoc($result))
	{
		$id = $row['id'];
		$nome = $row['nome'];
		$endereco = $row['endereco'];
		$bairro = $row['bairro'];
		$telefone = $row['telefone'];
		$email = $row['email'];
		$id_cidade = $row['id_cidade'];

		print '<tr>';
		print "<td align='center'>
			   <a href='pessoa_form_edit.php?id={$id}'>
			   <img src='images/edit.svg' style='width: 17px'>
			   </a>
			   </td>
		";

		print "<td align='center'>
			   <a href='delete_pessoa.php?id={$id}'>
			   <img src='images/remevoe.svg' style='width: 17px'>
			   </a>
			   </td>
		";

		print "<td> {$id} </td>";
		print "<td> {$nome} </td>";
		print "<td> {$endereco} </td>";
		print "<td> {$bairro} </td>";
		print "<td> {$telefone} </td>";
		print '</tr>';
	}

	print '</tbody>';
	print '</table>';

	?>

	<button onclick="window.location='pessoa_form_insert.php'">
		<img src='images/insert.svg' style='width:17px;'> Inserir
	</button>
</body>
</html>