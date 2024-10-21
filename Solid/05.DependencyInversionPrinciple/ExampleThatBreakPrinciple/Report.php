<?php

class Report
{

    public function writeReport()
    {
        /*
         * This break the Dependency Inversion Principle because
         * the Report class (i.e. the high-level module) depends on the JsonFormatter and FileWriter classes
         *  (i.e. the low-level modules).
         *
         * The principle states that:
         * a) high-level modules should not depend on low-level modules.
         * b) Both should depend on abstractions.
         *
         * In our specific case,
         * a) the Report class should depend on an interface that the JsonFormatter and FileWriter classes implement.
         * b) And the JsonFormatter and FileWriter classes should depend on an interface that the Report class implements.
         */
        $formatter = new JsonFormatter();

        $format = $formatter->format($this);

        $writer = new FileWriter();
    }

}
