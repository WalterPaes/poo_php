<?php
require_once 'classes/CSVParser.php';
$csv = new CSVParser('clientes.csv', ';');

try {
    $csv->parse();
    while ($row = $csv->fetch()) {
        print $row['Cliente'] . ' - ';
        print $row['Cidade'] . '<br/>';
    }
} catch (Exception $e) {
    print $e->getMessage();
}


