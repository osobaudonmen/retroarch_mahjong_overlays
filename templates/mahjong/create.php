<?php

$keyMap = match ($argv[1] ?? null) {
    'arrow_keys' => ['retrok_left', 'retrok_down', 'retrok_right', 'retrok_up'],
    default      => ['retrok_space', 'retrok_alt', 'retrok_ctrl', 'retrok_shift'],
};
printf("chi, pon, kan reach = %s\n", implode(', ', $keyMap));

$isDebug = 'debug' === ($argv[2] ?? null);
printf("debug = %s\n", $isDebug ? 'true' : 'false');

$tmpl = file_get_contents(__DIR__ . '/mahjong.tmpl');

$games = [
    'akiss'    => [1, 0.1240, 0.0595, 0.90, 0, 0.030, 0.10, 0.920],
    'bnstars1' => [1, 0.0810, 0.0624, 0.89, 0, 0.033, 0.11, 0.917],
    'cdsteljn' => [1, 0.0640, 0.0668, 0.89, 0, 0.033, 0.05, 0],
    'cultures' => [1, 0.0720, 0.0624, 0.89, 0, 0.033, 0.11, 0.927],
    'ejanhs'   => [1, 0.0850, 0.0624, 0.89, 0, 0.033, 0.11, 0.927],
    'hotgmck'  => [1, 0.0630, 0.0654, 0.89, 0, 0.034, 0.11, 0.939],
    // 'hypreact' => [1, 0.0890, 0.0624, 0.88, 0, 0.033, 0,    0.920], // has joystick mode
    // 'hypreac2' => [1, 0.0520, 0.0620, 0.91, 0, 0.030, 0,    0.870], // has joystick mode
    'janjans1' => [1, 0.0600, 0.0650, 0.89, 0, 0.034, 0.11, 0.939],
    'janjans2' => [1, 0.0640, 0.0654, 0.89, 0, 0.034, 0.11, 0.939],
    'jongpute' => [1, 0.0600, 0.0625, 0.91, 0, 0.032, 0,    0.885],
    'kirarast' => [1, 0.0810, 0.0624, 0.90, 0, 0.033, 0,    0.917],
    'cdsteljn' => [1, 0.0640, 0.0668, 0.89, 0, 0.033, 0.05, 0],
    'mgakuen'  => [1, 0.0720, 0.0624, 0.91, 0, 0.033, 0.09, 0.907],
    'mirage'   => [1, 0.0780, 0.0624, 0.90, 0, 0.033, 0,    0.927],
    'mj4simai' => [1, 0.0720, 0.0650, 0.89, 0, 0.034, 0.11, 0.939],
    'mjkjidai' => [1, 0.1430, 0.0518, 0.91, 0, 0.027, 0.09, 0.835],
    'mjnquest' => [1, 0.1505, 0.0500, 0.91, 0, 0.026, 0.09, 0.850],
    'srmp4'    => [1, 0.1000, 0.0625, 0.90, 0, 0.032, 0,    0.938],
    'srmp7'    => [1, 0.0780, 0.0595, 0.88, 0, 0.030, 0.09, 0.875],
    'suchie2'  => [1, 0.0560, 0.0625, 0.91, 0, 0.031, 0,    0.945],

    '4psimasy' => [1, 0.09266826923076922, 0.06241987179487179, 0.9097222222222222, 0, 0.031209935897435894, 0.07361111111111111, 0.9041266025641026],
];

foreach ($games as $name => $pos) {
    $overlay = createOverlay(...$pos);
    $cfg = str_replace(
        ['%KEY_CHI%', '%KEY_PON%', '%KEY_KAN%', '%KEY_REACH%', '%OVERLAY%'],
        [...$keyMap, $overlay],
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
