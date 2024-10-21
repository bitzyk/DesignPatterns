<?php

namespace ExampleThatRespectPrinciple;

class Report implements ReportInterface
{

    public function __construct(
        private readonly FormatterInterface $formatter,
        private readonly FileWriterInterface $writer
    )
    {

    }

    public function writeReport()
    {
        $this->formatter->format($this);
        $this->writer->write($this);
    }

}
