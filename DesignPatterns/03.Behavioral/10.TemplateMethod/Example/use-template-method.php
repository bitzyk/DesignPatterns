<?php

require_once __DIR__ . '/AbstractReport.php';

require_once __DIR__ . '/HtmlReport.php';
require_once __DIR__ . '/CsvReport.php';



$htmlReport = new HtmlReport();
$htmlReport->generateReport();

$csvReport = new CsvReport();
$csvReport->generateReport();
