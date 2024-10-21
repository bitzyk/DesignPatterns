<?php

class CsvMessage implements MessageInterface
{
    public function printMessage(array $data): void
    {
        $fp = fopen('php://output', 'w');
        fputcsv($fp, $data);
        fclose($fp);
    }

}
