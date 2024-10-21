<?php

class HtmlReport extends AbstractReport
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
        $formattedData = "<h1>{$data['title']}</h1>";
        $formattedData .= "<p>Date: {$data['date']}</p>";
        $formattedData .= "<ul>";
        foreach ($data['data'] as $key => $value) {
            $formattedData .= "<li>{$key}: {$value}</li>";
        }
        $formattedData .= "</ul>";

        $this->formattedData = $formattedData;
    }

    protected function exportReport()
    {
        echo "Exporting HTML report\n"; // simulate exporting to file

        echo $this->formattedData . "\n";
    }


}
