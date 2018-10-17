<?php

try{
	$conn = new PDO('mysql:host=localhost;dbname=livro;charset=utf8mb4', 'root', '');

	$conn->exec("INSERT INTO famosos (codigo, nome) VALUES (1, 'Érico Veríssimo')");
	$conn->exec("INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')");
	$conn->exec("INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Ghandi')");
	$conn->exec("INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')");
	$conn->exec("INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
	$conn->exec("INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')");
	$conn->exec("INSERT INTO famosos (codigo, nome) VALUES (7, 'Mário Quintana')");

	$conn = null;
} catch (PDOException $e) {
	echo "Erro! " . $e->getMessage . "\n"; 
}