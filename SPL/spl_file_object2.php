<?php
echo "<pre>";
$file = new SplFileObject('spl_file_object2.php');
echo 'forma 1: ' . PHP_EOL;
while (!$file->eof()) {
    echo 'Linha: ' . $file->fgets();
}
echo PHP_EOL.PHP_EOL;

print 'forma 2:' . PHP_EOL;
foreach ($file as $linha => $conteudo) {
    echo "$linha: $conteudo";
}