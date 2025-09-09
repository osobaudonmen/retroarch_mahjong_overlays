<?php

namespace OsobaTool;

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/Classes/ReadmeFile.php');

use Menrui\Reader\MameDat;
use OsobaTool\Classes\ReadmeFile;

$datFile    = $argv[1];
$readmeFile = $argv[2] ?? null;

if (!file_exists($datFile)) {
    echo "$datFile not found.\n";
    exit(1);
}

$readmeGames = [];
if ($readmeFile) {
    if (!file_exists($readmeFile)) {
        echo "$readmeFile not found.\n";
        exit(1);
    }
    $readmeGames = ReadmeFile::readTable($readmeFile, 'mame_games');
}

$games = MameDat::read($datFile, ['playable', 'original', 'mahjong']);
$games = iterator_to_array($games);
ReadmeFile::sortGames($games);

if ($readmeFile) {
    $table = [
        '|ROMファイル名|説明|製造元|年|オーバーレイファイル|備考|',
        '|---|---|---|---|---|---|',
    ];
    foreach ($games as $game) {
        $name = (string)$game['name'];
        $desc = (string)$game->description;
        $manu = (string)$game->manufacturer;
        $year = (string)$game->year;
        if ($data = ($readmeGames[$name] ?? false)) {
        } else {
            $data = ['', $name, $desc ,$manu, $year];
        }
        $data = ReadmeFile::fix($data);
        $table[] = implode('|', [
            '',
            $name,
            $desc,
            $manu,
            $year,
            $data[5] ?? '',
            $data[6] ?? '',
            '',
        ]);
    }
    ReadmeFile::writeTable($readmeFile, 'mame_games', $table);
    echo "updated $readmeFile.\n";
} else {
    foreach ($games as $game) {
        $name = (string)$game['name'];
        $desc = (string)$game->description;
        echo "$name, $desc\n";
    }
}
