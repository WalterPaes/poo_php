<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Cadastro de Pessoa </title>
	<link rel="stylesheet" type="text/css" href="css/form.css" media="screen">
</head>
<?php
	if (!empty($_GET['id'])) {
		$conn = mysqli_connect('localhost', 'root', '', 'livro');
		$id = (int) $_GET['id'];

		$result = mysqli_query($conn, "SELECT * FROM pessoa WHERE id = '{$id}'");
		$row = mysqli_fetch_assoc($result);

		$id = $row['id'];
		$nome = $row['nome'];
		$endereco = $row['endereco'];
		$bairro = $row['bairro'];
		$telefone = $row['telefone'];
		$email = $row['email'];
		$id_cidade = $row['id_cidade'];
	}
?>
<body>
	<form enctype="multipart/form-data" method="post" action="pessoa_save_update.php">
		<label>Código</label>
		<input type="text" name="id" readonly="1" value="<?= $id ?>" style="width: 30%">

		<label>Nome</label>
		<input type="text" name="nome" value="<?= $nome ?>" style="width: 50%">

		<label>Endereço</label>
		<input type="text" name="endereco" value="<?= $endereco ?>" style="width: 50%">

		<label>Bairro</label>
		<input type="text" name="bairro" value="<?= $bairro ?>" style="width: 25%">

		<label>Telefone</label>
		<input type="text" name="telefone" value="<?= $telefone ?>" style="width: 25%">

		<label>Email</label>
		<input type="text" name="email" value="<?= $email ?>" style="width: 25%">

		<label>Cidade</label>
		<select name="id_cidade" style="width: 25%">
			<?php
			require_once 'lista_combo_cidades.php';
			print lista_combo_cidades($id_cidade);
			?>
		</select>

		<input type="submit">
	</form>
</body>
</html>