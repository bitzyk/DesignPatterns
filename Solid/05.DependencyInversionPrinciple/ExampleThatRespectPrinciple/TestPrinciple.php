<?php

namespace Solid\LiskovSubstitutionPrinciple\ExampleThatBreakPrinciple;

use ExampleThatRespectPrinciple\FileWriter;
use ExampleThatRespectPrinciple\JsonFormatter;
use ExampleThatRespectPrinciple\Report;

require __DIR__ . '/FileWriterInterface.php';
require __DIR__ . '/FileWriter.php';
require __DIR__ . '/FormatterInterface.php';
require __DIR__ . '/JsonFormatter.php';
require __DIR__ . '/ReportInterface.php';
require __DIR__ . '/Report.php';

class TestPrinciple
{
    public function test()
    {
        // in here we can inject the concrete dependencies
        // and we can change the dependencies without changing the Report class because the Report class depend on abstraction
        $report = new Report(
            new JsonFormatter(),
            new FileWriter()
        );

        $report->writeReport();

        echo 'Test passed' . PHP_EOL;
    }
}


$test = new TestPrinciple();
$test->test();
