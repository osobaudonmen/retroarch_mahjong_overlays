<?php

namespace OsobaTool;

require_once(__DIR__ . '/Classes/MameDatFile.php');

use OsobaTool\Classes\MameDatFile;

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
    $inList = false;
    $inBody = false;
    foreach (file($readmeFile) as $line) {
        $line = trim($line);
        if ('<!-- mame_games -->' === $line) {
            $inList = true;
        } elseif ('<!-- /mame_games -->' === $line) {
            break;
        } elseif ($inList && str_starts_with($line, '|-')) {
            $inBody = true;
        } elseif ($inBody && $line) {
            $data = explode('|', $line);
            $name = trim($data[1] ?? '');
            $name && ($readmeGames[$name] = $data);
        }
    }
}

$games = MameDatFile::readGames($datFile, ['playable', 'original', 'mahjong']);

if ($readmeFile) {
    $table = [
        '<!-- mame_games -->',
        '',
        '|ROMファイル名|説明|オーバーレイファイル|備考|',
        '|---|---|---|---|',
    ];
    foreach ($games as $game) {
        $name = (string)$game['name'];
        $desc = (string)$game->description;
        if ($data = ($readmeGames[$name] ?? false)) {
            $data[1] = $name;
            $data[2] = $desc;
            $table[] = implode('|', $data);
        } else {
            $table[] = "|$name|$desc|";
        }
    }
    $table[] = '';
    $table[] = '<!-- /mame_games -->';
    $text = file_get_contents($readmeFile);
    $text = preg_replace(
        '#<!-- mame_games -->.*?<!-- /mame_games -->#s',
        implode("\n", $table),
        $text
    );
    file_put_contents($readmeFile, $text);
    echo "updated $readmeFile.\n";
} else {
    foreach ($games as $game) {
        $name = (string)$game['name'];
        $desc = (string)$game->description;
        echo "$name, $desc\n";
    }
}
