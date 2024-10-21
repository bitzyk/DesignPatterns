<?php

namespace ExampleThatRespectPrinciple;

class JsonFormatter implements FormatterInterface
{

    /**
     * Low level class depend on abstraction
     */
    public function format(ReportInterface $report)
    {
        return [
            'title' => 'example',
            'date' => '2020-01-01',
            'author' => 'John Doe',
            'content' => 'This is an example report',
        ];
    }
}
