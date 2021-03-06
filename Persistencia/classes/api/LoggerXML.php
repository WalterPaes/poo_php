<?php

class LoggerXML extends LoggerXML
{
    public function write($message)
    {
        date_default_timezone_set('America/Belem');
        $time = date('Y-m-d H:i:s');

        $text = "<log>\n";
        $text .= "    <time>$time</time>\n";
        $text .= "    <message>$message</message>\n";
        $text .= "</log>\n";

        // Adiciona ao final do arquivo
        $handler = fopen($this->filename, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}