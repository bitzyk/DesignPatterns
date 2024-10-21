<?php

namespace ExampleThatRespectPrinciple;

interface FileWriterInterface
{
    /**
     * Low level class depend on abstraction
     */
    public function write(ReportInterface $report);
}
