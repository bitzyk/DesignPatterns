<?php

class CsvReport extends AbstractReport
{
    private $formattedData;

    protected function gatherReportData(): array
    {
        return [
            'title' => 'Report Title',
            'date' => '2020-01-01',
            'data' => [
                'data1' => 'Data 1',
                'data2' => 'Data 2',
                'data3' => 'Data 3',
            ],
        ]; // simulate gathering from database
    }

    protected function formatReportData(array $data)
    {
        $formattedData = "{$data['title']}\n";
        $formattedData .= "Date: {$data['date']}\n";

        foreach ($data['data'] as $key => $value) {
            $formattedData .= "{$key}: {$value}\n";
        }

        $this->formattedData = $formattedData;
    }

    protected function exportReport()
    {
        echo "Exporting CSV report\n"; // simulate exporting to file

        echo $this->formattedData . "\n";
    }


}
