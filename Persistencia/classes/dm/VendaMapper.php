<?php

class VendaMapper {
    private static $conn;

    public static function setConnection(PDO $conn) {
        self::$conn = $conn;
    }

    public static function save(Venda $venda) {
        $date = date('Y-m-d');

        $sql = "INSERT INTO venda (data_venda) values ('$date')";
        print $sql . '<br>';

        self::$conn->query($sql);
        $id = self::getLastId();
        $venda->setId($id);

        // Percorre os Itens Vendidos
        foreach ($venda->getItens() as $item) {
            $quantidade = $item[0];
            $produto = $item[1];
            $preco = $produto->preco;

            $sql = "INSERT INTO item_venda (id_venda, id_produto, quantidade, preco) VALUES ('$id', '{$produto->id}', '$quantidade', '$preco')";
            print $sql . '<br>';
            self::$conn->query($sql);
        }
    }

    private static function getLastId() {
        $sql = "SELECT max(id) as max FROM venda";
        $result = self::$conn->query($sql);
        $data = $result->fetch(PDO::FETCH_OBJ);
        return $data->max;
    }
}