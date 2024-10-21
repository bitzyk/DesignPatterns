<?php

require_once __DIR__ . '/Document.php';
require_once __DIR__ . '/DocumentMemento.php';
require_once __DIR__ . '/History.php';


$document = new Document();
$history = new History();

$document->write("Hello World\n"); // first sentence
$history->save($document->save()); // save the state of the document via memento

$document->write("My name is Cristian Bitoi\n"); // second sentence
$history->save($document->save()); // save the state of the document via memento

$document->write("I am a software engineer\n"); // third sentence

// this will print the full content of the document
// because we are working on the main document
echo $document->getContent();

echo "\n\n";

// we can undo the last change
$history->undo($document);

// it will print only first 2 sentence
echo $document->getContent();

echo "\n\n";

// we can undo the last change
$history->undo($document);

// it will print only first sentence
echo $document->getContent();

echo "\n\n";

$history->undo($document);

// it will be not an empty string
var_dump($document->getContent());

echo "\n\n";
