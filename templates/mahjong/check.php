<?php

$games = include(__DIR__ . '/games.php');
$names = array_keys($games);

$th = 0.003;

$onlyX = false;
for ($i = 1; $i < $argc; $i++) {
    $v = $argv[$i];
    if ($v === '-x') {
        $onlyX = true;
        echo "Only X\n";
    } elseif ($v === '-t') {
        $th = (float)($argv[++$i] ?? $th);
    }
}

echo "Threshold: $th\n\n";

$sameSet = [];

$n = count($games);
for ($i = 0; $i < $n; $i++) {
    $ni    = $names[$i];
    $gi    = $games[$ni];
    $done  = [];
    foreach ($sameSet as $s) {
        foreach ($s as $ss) {
            if ($ss !== $ni) {
                $done[$ss] = true;
            }
        }
    }
    $same  = [];
    $first = true;
    for ($j = $i + 1; $j < $n; $j++) {
        $nj = $names[$j];
        if ($done[$nj] ?? false) {
            continue;
        }
        $gj = $games[$nj];
        $near = true;
        for ($k = 0; $k < 7; $k++) {
            if ($onlyX && !in_array($k, [0, 1, 4, 6])) {
                continue;
            }
            $vi = $gi[$k];
            $vj = $gj[$k];
            if ($k === 5) {
                if ($vi === 0) {
                    $vi = 1.0 - $gi[2];
                }
                if ($vj === 0) {
                    $vj = 1.0 - $gj[2];
                }
            }
            if (abs($vi - $vj) > $th) {
                $near = false;
                break;
            }
        }
        if ($near) {
            $formatter = fn($v) => is_numeric($v) ? sprintf('%.6f', $v) : $v;
            if ($first) {
                $first = false;
                printf("%10s [%s]\n", $ni, implode(', ', array_map($formatter, $gi)));
                $same[] = $ni;
            }
            printf("  %8s [%s]\n", $nj, implode(', ', array_map($formatter, $gj)));
            $same[] = $nj;
        }
    }
    if (!$first) {
        $sameSet[] = $same;
        echo "\n";
    }
}
