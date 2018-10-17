<?php

$fd = fopen(__FILE__, "r");
$linha = 1;

while (!feof($fd)) {
	$buffer = fgets($fd, 4096);
	if ($linha > 1) {
		echo $buffer."<br>".PHP_EOL;
	}
	$linha++;
}

fclose($fd);