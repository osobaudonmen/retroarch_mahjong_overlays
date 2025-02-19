<?php

$n  = $argv[1];
$ox = $argv[2];
$dx = $argv[3];
$oy = $argv[4];
$dy = $argv[5];
$w  = $argv[6];
$h  = $argv[7];

for ($i = 0; $i < 14; $i++) {
    printf(
        "overlay%d_desc%d = \"retrok_%s,%0.6f,%0.6f,rect,%0.6f,%0.6f\"\n",
        $n,
        $i,
        chr(ord('a') + $i),
        $ox + $dx * $i,
        $oy + $dy * $i,
        $w,
        $h
    );
}
