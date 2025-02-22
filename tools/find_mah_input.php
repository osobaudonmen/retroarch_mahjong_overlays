<?php

$datFile = $argv[1];
$fbSrc   = $argv[2];

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
        $srcf = (string)$game['sourcefile'];

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
                $info = preg_split('/\\s*,\\s*/', trim($m[2]));
                $drv  = $m[1];
                $rom  = trim($info[0], '"');
                $inp  = $info[25];
                if ($name === $rom && in_array($inp, $inps)) {
                    echo "$name, $desc\n";
                    //echo "$name, $desc, $drv, $rom, $inp, $srcf\n";
                }
            }
        }
    }
}
