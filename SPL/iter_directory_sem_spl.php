<?php

$dir = opendir('../simpleXML');
while ($arquivo = readdir($dir)) {
    print $arquivo . '<br>';
}
closedir($dir);