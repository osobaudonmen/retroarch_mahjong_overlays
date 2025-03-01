<?php

namespace OsobaTool;

require_once(__DIR__ . '/Classes/MameDatFile.php');
require_once(__DIR__ . '/Classes/ReadmeFile.php');

use OsobaTool\Classes\MameDatFile;
use OsobaTool\Classes\ReadmeFile;

$datFile    = $argv[1];
$fbSrc      = $argv[2];
$readmeFile = $argv[3] ?? null;

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
    $readmeGames = ReadmeFile::readTable($readmeFile, 'fbneo_games');
}

$unplayables = [];
$clones      = [];
$candidates  = [];
$games       = MameDatFile::readGames($datFile);
foreach ($games as $game) {
    if (MameDatFile::isOriginal($game)) {
        if (MameDatFile::isPlayable($game)) {
            $candidates[] = $game;
        } else {
            $unplayables[] = $game;
        }
    } else {
        $clones[] = $game;
    }
}

foreach ($unplayables as $unplayable) {
    foreach ($clones as $clone) {
        if ((string)$unplayable['name'] === (string)$clone['cloneof']) {
            $candidates[] = $clone;
            break;
        }
    }
}

$outputs = [];
foreach ($candidates as $candidate) {
    $name = (string)$candidate['name'];
    $desc = (string)$candidate->description;
    $srcf = (string)$candidate['sourcefile'];

    $src = file_get_contents($fbSrc . '/src/burn/drv/' . $srcf);
    if (str_contains($src, 'mah reach')) {
        $inps = [];

        preg_match_all('/static struct BurnInputInfo (\\S+)\\s*=\\s*{(.+?)};/s', $src, $ms, PREG_SET_ORDER);
        foreach ($ms as $m) {
            $inp = trim(trim($m[1], '[]'));
            $map = $m[2];
            if (str_contains($map, 'mah reach')) {
                $inps[] = preg_replace('/List$/', 'Info', $inp);
            }
        }

        preg_match_all('/struct BurnDriver (\\S+) = {(.+?)};/s', $src, $ms, PREG_SET_ORDER);
        foreach ($ms as $m) {
            $struct = preg_replace_callback(
                '/"([^"\\\\]*(\\\\.[^"\\\\]*)*)"/',
                fn($sl) => str_replace(',', ';', $sl[0]),
                trim($m[2])
            );
            $info   = preg_split('/\\s*,\\s*/', $struct);
            $drv    = $m[1];
            $rom    = trim($info[0], '"');
            $inp    = $info[25];
            if ($name === $rom && in_array($inp, $inps)) {
                $outputs[$name] = $candidate;
            }
        }
    }
}

ksort($outputs);

if ($readmeFile) {
    $table = [
        '|ROMファイル名|説明|オーバーレイファイル|備考|',
        '|---|---|---|---|',
    ];
    foreach ($outputs as $game) {
        $name = (string)$game['name'];
        $desc = (string)$game->description;
        if ($data = ($readmeGames[$name] ?? false)) {
            $data[1] = $name;
            $data[2] = $desc;
        } else {
            $data = [$name, $desc];
        }
        if (!MameDatFile::isOriginal($game)) {
            $note = sprintf('%sが動作しない代わり。', $game['cloneof']);
            $data[3] = $data[3] ?? '';
            $data[4] = $data[4] ?? '';
            if (!str_contains($data[4], $note)) {
                $data[4] = $note . $data[4];
            }
        }
        $table[] = implode('|', $data);
    }
    ReadmeFile::writeTable($readmeFile, 'fbneo_games', $table);
    echo "updated $readmeFile.\n";
} else {
    foreach ($outputs as $name => $game) {
        $desc = (string)$game->description;
        echo "$name, $desc\n";
    }
}
