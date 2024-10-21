<?php

/**
 * Abstract class for report generation
 * Implement template method by defining the skeleton of an algorithm
 * Each step is an abstract method
 */
abstract class AbstractReport
{
    public function generateReport(): void
    {
        $data = $this->gatherReportData();
        $this->formatReportData($data);
        $this->exportReport();
    }

    abstract protected function gatherReportData(): array;
    abstract protected function formatReportData(array $data);
    abstract protected function exportReport();
}
