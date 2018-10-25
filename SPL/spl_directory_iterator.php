<?php

foreach (new DirectoryIterator('../simpleXML') as $file) {
    print (string) $file  . '<br/>';
    print 'Nome: ' . $file->getFileName() . '<br>';
    print 'Extensão: ' . $file->getExtension() . '<br>';
    print 'Tamanho: ' . $file->getSize() . '<br>';
    echo "<br>";
}