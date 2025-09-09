<?php

namespace OsobaTool;

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/Classes/ReadmeFile.php');

use Menrui\Reader\MameDat;
use OsobaTool\Classes\ReadmeFile;

$fbSrc      = $argv[1];
$readmeFile = $argv[2] ?? null;

if (!is_dir($fbSrc)) {
    echo "$fbSrc not found.\n";
    exit(1);
}

$datFile = "$fbSrc/dats/FinalBurn Neo (ClrMame Pro XML, Arcade only).dat";
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
$games       = MameDat::read($datFile);
foreach ($games as $game) {
    if (MameDat::isOriginal($game)) {
        if (MameDat::isPlayable($game)) {
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

    $srcp = $fbSrc . '/src/burn/drv/' . $srcf;
    if (!file_exists($srcp)) {
        echo "$scrp not found\n";
        exit(1);
    }
    $src = file_get_contents($srcp);
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
        '|ROMファイル名|説明|製造元|年|オーバーレイファイル|備考|',
        '|---|---|---|---|---|---|',
    ];
    foreach ($outputs as $game) {
        $name = (string)$game['name'];
        $desc = (string)$game->description;
        $manu = (string)$game->manufacturer;
        $year = (string)$game->year;
        if ($data = ($readmeGames[$name] ?? false)) {
            $data[1] = $name;
            $data[2] = $desc;
            $data[3] = $manu;
            $data[4] = $year;
        } else {
            $data = ['', $name, $desc, $manu, $year, '', '', ''];
        }
        if (!MameDat::isOriginal($game)) {
            $note = sprintf('%sが動作しない代わり。', $game['cloneof']);
            if (!str_contains($data[6], $note)) {
                $data[6] = $note . $data[6];
            }
        }
        for ($i = 0; $i < 8; $i++) {
            $data[$i] = $data[$i] ?? '';
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
