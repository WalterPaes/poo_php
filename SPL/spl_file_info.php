<?php

$file = new SplFileInfo('spl_file_info.php');
echo "Nome: " . $file->getFileName() . '<br>' . PHP_EOL;
echo "Extensão: " . $file->getExtension() . '<br>' . PHP_EOL;
echo "Tamanho: " . $file->getSize() . '<br>' . PHP_EOL;
echo "Caminho: " . $file->getRealPath() . '<br>' . PHP_EOL;
echo "Tipo: " . $file->getType() . '<br>' . PHP_EOL;
echo "Gravação: " . $file->isWritable() . '<br>' . PHP_EOL;