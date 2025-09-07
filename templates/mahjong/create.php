<?php

$keyMap = match ($argv[1] ?? null) {
    'arrow_keys' => ['retrok_left', 'retrok_down', 'retrok_right', 'retrok_up'],
    default      => ['retrok_space', 'retrok_alt', 'retrok_ctrl', 'retrok_shift'],
};
printf("chi, pon, kan reach = %s\n", implode(', ', $keyMap));

$isDebug = 'debug' === ($argv[2] ?? null);
printf("debug = %s\n", $isDebug ? 'true' : 'false');

$tmpl = file_get_contents(__DIR__ . '/mahjong.tmpl');

$games = include(__DIR__ . '/games.php');

foreach ($games as $name => $pos) {
    $overlay1 = createOverlay(1, ...$pos);
    $overlay4 = createOverlay(4, ...$pos);
    $cfg = str_replace(
        ['%KEY_CHI%', '%KEY_PON%', '%KEY_KAN%', '%KEY_REACH%', '%OVERLAY1%', '%OVERLAY4%'],
        [...$keyMap, $overlay1, $overlay4],
        $tmpl
    );
    if (!$isDebug) {
        $cfg = preg_replace('/### BEGIN DEBUG.+?### END DEBUG/s', '', $cfg);
    }

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
