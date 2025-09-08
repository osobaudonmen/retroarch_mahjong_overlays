<?php

$isDebug = 'debug' === ($argv[2] ?? null);
printf("debug = %s\n", $isDebug ? 'true' : 'false');

$tmpl = file_get_contents(__DIR__ . '/mahjong.tmpl');

$games = include(__DIR__ . '/games.php');

foreach ($games as $name => $pos) {
    $overlay1 = createOverlay(1, ...$pos);
    $overlay4 = createOverlay(4, ...$pos);
    $cfg = str_replace(['%OVERLAY1%', '%OVERLAY4%'], [$overlay1, $overlay4], $tmpl);
    if (!$isDebug) {
        $cfg = preg_replace('/### BEGIN DEBUG.+?### END DEBUG/s', '', $cfg);
    }

    $num = 0;
    $bet = '';
    if (in_array('bet', $pos)) {
        $bet = "\\1\n";
        $num++;
    }

    $cfg = preg_replace(
        ['/%BET:(.+?)%\n/s'],
        [$bet],
        $cfg,
    );

    $cfg = preg_replace_callback(
        '/%NUM:(\\d+)%/',
        fn ($m) => $m[1] + $num,
        $cfg,
    );

    $file = "mahjong_$name.cfg";
    echo "$file\n";
    file_put_contents($file, $cfg);
}

function createOverlay($n, $ox, $dx, $oy, $dy, $w, $h, $nx)
{
    $text = '';
    for ($i = 0; $i < 14; $i++) {
        $text .= sprintf(
            "overlay%d_desc%d = \"retrok_%s,%0.6f,%0.6f,rect,%0.6f,%0.6f\"\n",
            $n,
            $i,
            chr(ord('a') + $i),
            $i === 13 && $nx !== 0 ? $nx : $ox + $dx * $i,
            $oy + $dy * $i,
            $w,
            $h === 0 ? 1.0 - $oy : $h
        );
    }
    return $text;
}
