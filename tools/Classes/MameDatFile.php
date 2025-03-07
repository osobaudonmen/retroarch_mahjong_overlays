<?php

namespace OsobaTool\Classes;

use SimpleXMLElement;

class MameDatFile
{
    public static function readGames(string $datFile, array $filters = []): array
    {
        $ret = [];
        $xml = simplexml_load_file($datFile);
        $games = $xml->game ?: $xml->machine;
        foreach ($games as $game) {
            if (
                0 === count($filters) || array_all(
                    $filters,
                    function ($filter) use ($game) {
                        if (is_string($filter)) {
                            $method = 'is' . ucfirst($filter);
                            if (method_exists(self::class, $method) && self::$method($game)) {
                                return true;
                            }
                        }
                        if (is_callable($filter) && call_user_func($filter, $game)) {
                            return true;
                        }
                    }
                )
            ) {
                $ret[] = $game;
            }
        }
        return $ret;
    }

    public static function isOriginal(SimpleXMLElement $game): bool
    {
        return !$game['cloneof'];
    }

    public static function isArcade(SimpleXMLElement $game): bool
    {
        return !$game->softwarelist;
    }

    public static function isPlayable(SimpleXMLElement $game): bool
    {
        $isBios    = (string)$game['isbios'] === 'yes';
        $isDevice  = (string)$game['isdevice'] === 'yes';
        $isRunnable = (string)$game['runnable'] !== 'no';
        $isWorking = (string)$game->driver['status'] !== 'preliminary';
        return $isRunnable && $isWorking && !$isDevice && !$isBios;
    }

    public static function isMahjong(SimpleXMLElement $game): bool
    {
        foreach ($game->input as $input) {
            //$coins = (int)$input['coins'];
            foreach ($input->control as $ctrl) {
                if ((string)$ctrl['type'] === 'mahjong') {
                    $player  = (int)$ctrl['player'];
                    $buttons = (int)$ctrl['buttons'];
                    if ($player <= 1 && 19 <= $buttons && $buttons !== 30) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}
