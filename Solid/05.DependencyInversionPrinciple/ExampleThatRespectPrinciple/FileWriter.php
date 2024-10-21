<?php

namespace ExampleThatRespectPrinciple;

class FileWriter implements FileWriterInterface
{

    /**
     * Low level class depend on abstraction
     */
    public function write(ReportInterface $report)
    {
        // write report to file
    }
}
