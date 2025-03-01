<?php

namespace OsobaTool;

require_once(__DIR__ . '/Classes/MameDatFile.php');

use OsobaTool\Classes\MameDatFile;

$datFile = $argv[1];

if (!file_exists($datFile)) {
    echo "$datFile not found.\n";
    exit(1);
}

$games = MameDatFile::readGames($datFile, ['playable', 'original', 'mahjong']);

foreach ($games as $game) {
    $name = (string)$game['name'];
    $desc = (string)$game->description;
    echo "$name, $desc\n";
}
