<?php

$xml = simplexml_load_file('paises3.xml');

echo "Nome: {$xml->nome} <br/>";
echo "Idioma: {$xml->idioma} <br/>";
echo "<br/>";
echo "*** Estados *** <br/>";

/* Estados podem ser acessados diretamente ´pelo índice
echo $xml->estados->nome[0] */

foreach ($xml->estados->nome as $estado) {
    echo 'Estado: ' . $estado . '<br/>';
}