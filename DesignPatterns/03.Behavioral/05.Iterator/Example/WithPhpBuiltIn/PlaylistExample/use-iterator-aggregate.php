<?php

require __DIR__ . '/Playlist.php';
require __DIR__ . '/Entity/Song.php';


$playlist = new Playlist();

$playlist
    ->addSong(
        new Song('The Beatles', 'Hey Jude')
    )
    ->addSong(
        new Song('Queen', 'Bohemian Rhapsody')
    )
    ->addSong(
        new Song('The Rolling Stones', 'Paint It Black')
    )
;


$playlist->playCurrentSong(); // The Beatles - Hey Jude
$playlist->nextSong(); // Queen - Bohemian Rhapsody
$playlist->nextSong();  // The Rolling Stones - Paint It Black
$playlist->nextSong(); // you are the end of the playlist
$playlist->previousSong(); // The Rolling Stones - Paint It Black


$playlist
    ->addSong(
        new Song('Madonna', 'Like a Virgin')
    ) // it does not change the current song
    ->addSong(
        new Song('Elton John', 'Tiny Dancer')
    ) // it does not change the current song
;
$playlist->playCurrentSong(); // The Rolling Stones - Paint It Black
$playlist->nextSong(); // Madonna - Like a Virgin
