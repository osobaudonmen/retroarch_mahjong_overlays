<?php

$datFile = $argv[1];

if (!file_exists($datFile)) {
    echo "$datFile not found.\n";
    exit(1);
}

$xml = simplexml_load_file($datFile);

$clones = [];
$games = $xml->game ?: $xml->machine;
foreach ($games as $game) {
    if (!$game['cloneof']) {
        $name = (string)$game['name'];
        $desc = (string)$game->description;
        echo "$name, $desc\n";
    }
}
