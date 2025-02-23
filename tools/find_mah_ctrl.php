<?php

$datFile = $argv[1];

if (!file_exists($datFile)) {
    echo "$datFile not found.\n";
    exit(1);
}

$xml = simplexml_load_file($datFile);

$clones = [];
$games = $xml->game ?: $xml->machine;
foreach ($games as $game) {
    $isDevice  = (string)$game['isdevice'] === 'yes';
    $isRunning = (string)$game['runnable'] !== 'no';
    $isClone   = !!$game['cloneof'];
    if ($isRunning && !$isDevice && !$isClone) {
        checkGame($game);
    }
}

function checkGame($game)
{
    foreach ($game->input as $input) {
        //$coins = (int)$input['coins'];
        foreach ($input->control as $ctrl) {
            if ((string)$ctrl['type'] === 'mahjong') {
                $player  = (int)$ctrl['player'];
                $buttons = (int)$ctrl['buttons'];
                if ($player <= 1 && 19 <= $buttons && $buttons !== 30) {
                    $name = (string)$game['name'];
                    $desc = (string)$game->description;
                    echo "$name, $desc\n";
                    //echo "$name, $coins, $player, $buttons, $desc\n";
                    return;
                }
            }
        }
    }
}
