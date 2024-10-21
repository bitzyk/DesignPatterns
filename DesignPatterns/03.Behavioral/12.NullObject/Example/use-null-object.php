<?php

require_once __DIR__ . '/StorageInterface.php';
require_once __DIR__ . '/ReportGenerator.php';

require_once __DIR__ . '/Storage/FileSystemStorage.php';
require_once __DIR__ . '/Storage/NullStorage.php';

$storage = new FileSystemStorage();
$storage = new NullStorage(); // this can be useful in case of unit testing where we don't want to actually save the report

$reportGenerator = new ReportGenerator($storage);

$reportGenerator->generateReport();



