<?php

$location = 'http://localhost/poo_php/mvc/rest.php';
$data = [
    'class' => 'PessoaServices',
    'method' => 'getData',
    'id' => '1'
];

$url = $location . '?' . http_build_query($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

var_dump($response);