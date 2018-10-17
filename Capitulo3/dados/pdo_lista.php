<?php

try{
	$conn = new PDO('mysql:host=localhost;dbname=livro;charset=utf8mb4', 'root', '');

	$result = $conn->query("SELECT codigo, nome FROM famosos");

	if ($result) {
		foreach ($result as $row) {
			echo $row['codigo'] . ' - ' . $row['nome'] . '<br/>';
		}	
	}

	$conn = null;
} catch (PDOException $e) {
	echo "Erro!: " . $e->getMessage() . "<br/>";
}