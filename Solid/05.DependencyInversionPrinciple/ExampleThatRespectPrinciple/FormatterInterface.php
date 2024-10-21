<?php

namespace ExampleThatRespectPrinciple;

interface FormatterInterface
{
    /**
     * Low level class depend on abstraction
     *
     * Here we can also demonstrate -> Additionally, abstractions should not depend on details.
     * Details should depend on abstractions.
     *
     * Because FormatterInterface is an abstraction, if we will change the dependency of format method
     * from ReportInterface to Report class  -> that will mean that abstractions depend on details
     *
     *
     */
    public function format(ReportInterface $report);
}
