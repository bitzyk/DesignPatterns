<?php

class JsonFormatter
{

    public function format(Report $report)
    {
        return [
            'title' => 'example',
            'date' => '2020-01-01',
            'author' => 'John Doe',
            'content' => 'This is an example report',
        ];
    }
}
