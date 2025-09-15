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

// Helper: compare two parameter arrays with threshold and -x option
function values_close(array $a, array $b, float $th, bool $onlyX): bool
{
    for ($k = 0; $k < 7; $k++) {
        if ($onlyX && !in_array($k, [0, 1, 4, 6], true)) {
            continue;
        }
        $vi = $a[$k];
        $vj = $b[$k];
        if ($k === 5) {
            if ($vi === 0) {
                $vi = 1.0 - $a[2];
            }
            if ($vj === 0) {
                $vj = 1.0 - $b[2];
            }
        }
        if (abs($vi - $vj) > $th) {
            return false;
        }
    }
    return true;
}

function format_value($v): string
{
    return is_numeric($v) ? sprintf('%.6f', $v) : (string)$v;
}

// Complete-link clustering (agglomerative): merge two clusters only if
// every cross-pair between them is within threshold. This ensures that
// every pair inside a final cluster is close (no chaining via intermediates).
$n = count($games);

// Initialize each index as its own cluster
$clusters = [];
for ($i = 0; $i < $n; $i++) {
    $clusters[] = [$i];
}

// Helper: decide whether two clusters should be merged under complete-link
function clusters_can_merge(array $clusterA, array $clusterB, array $games, array $names, float $th, bool $onlyX): bool
{
    foreach ($clusterA as $ia) {
        foreach ($clusterB as $ib) {
            if (!values_close($games[$names[$ia]], $games[$names[$ib]], $th, $onlyX)) {
                return false;
            }
        }
    }
    return true;
}

// Agglomerative merging loop: try merging any two clusters that satisfy complete-link
$merged = true;
while ($merged) {
    $merged = false;
    $m = count($clusters);
    for ($i = 0; $i < $m; $i++) {
        for ($j = $i + 1; $j < $m; $j++) {
            if (clusters_can_merge($clusters[$i], $clusters[$j], $games, $names, $th, $onlyX)) {
                // merge j into i
                $clusters[$i] = array_merge($clusters[$i], $clusters[$j]);
                array_splice($clusters, $j, 1);
                $merged = true;
                // restart outer loops since clusters changed
                break 2;
            }
        }
    }
}

// Output clusters with more than one member
foreach ($clusters as $cluster) {
    if (count($cluster) <= 1) continue;
    $firstIdx = $cluster[0];
    $ni = $names[$firstIdx];
    $gi = $games[$ni];
    printf("%10s [%s]\n", $ni, implode(', ', array_map('format_value', $gi)));
    foreach ($cluster as $k => $idx) {
        if ($k === 0) continue;
        $nj = $names[$idx];
        $gj = $games[$nj];
        printf("  %8s [%s]\n", $nj, implode(', ', array_map('format_value', $gj)));
    }
    echo "\n";
}
