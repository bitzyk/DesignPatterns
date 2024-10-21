<?php

require_once __DIR__ . '/TextFormatFlyweightInterface.php';
require_once __DIR__ . '/SharedTextFormat.php';
require_once __DIR__ . '/DecorationTextFormat.php';
require_once __DIR__ . '/TextFormatFlyweightFactory.php';
require_once __DIR__ . '/Document.php';



$factory = new TextFormatFlyweightFactory();

/* start intrinsic state i.e. shared state */
$arial_12_black = $factory->getSharedTextFormat(
    'Arial',
    12,
    'black',
);

$verdana_10_red = $factory->getSharedTextFormat(
    'Verdana',
    10,
    'red',
);
/* end intrinsic state */

$document = new Document();


$document->addChrs(
    'Bitoi',
    $arial_12_black
);

$document->addChrs(
    'Cristian',
    new DecorationTextFormat( // we create extrinsic state on the fly here
        'bold',
        $verdana_10_red // we pass the shared flyweight object as a dependency
    )
);

$document->addChrs(
    'is the best !!!!',
    $arial_12_black
);

$document->render();
