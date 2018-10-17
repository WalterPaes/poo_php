<?php

class Cidade {
    public static function all() {
        $conn = new PDO("mysql:dbname=livro;host=localhost;charset=utf8mb4", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT id, nome FROM cidade ORDER BY id");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}