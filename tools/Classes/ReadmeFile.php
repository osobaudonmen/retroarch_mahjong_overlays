<?php

namespace OsobaTool\Classes;

class ReadmeFile
{
    public static function readTable(string $readmeFile, string $tableName): array
    {
        $readmeGames = [];
        $inList = false;
        $inBody = false;
        foreach (file($readmeFile) as $line) {
            $line = trim($line);
            if ("<!-- $tableName -->" === $line) {
                $inList = true;
            } elseif ("<!-- /$tableName -->" === $line) {
                break;
            } elseif ($inList && str_starts_with($line, '|-')) {
                $inBody = true;
            } elseif ($inBody && $line) {
                $data = explode('|', $line);
                $name = trim($data[1] ?? '');
                $name && ($readmeGames[$name] = $data);
            }
        }
        return $readmeGames;
    }

    public static function writeTable(string $readmeFile, string $tableName, array $table): void
    {

        $table = [
            "<!-- $tableName -->",
            '',
            ...$table,
            '',
            "<!-- /$tableName -->",
        ];
        $text = file_get_contents($readmeFile);
        $tName = preg_quote($tableName, '#');
        $text = preg_replace(
            "#<!-- $tName -->.*?<!-- /$tName -->#s",
            implode("\n", $table),
            $text
        );
        file_put_contents($readmeFile, $text);
    }

    public static function sortGames(array &$games): void
    {
        usort($games, function ($a, $b) {
            $r = strcmp((string)$a->manufacturer, (string)$b->manufacturer);
            if ($r === 0) {
                $r = (int)$a->year - (int)$b->year;
            }
            if ($r === 0) {
                $r = strcmp((string)$a['name'], (string)$b['name']);
            }
            return $r;
        });
    }

    public static function fix(array $data): array
    {
        for ($i = 0; $i < 8; $i++) {
            $data[$i] = $data[$i] ?? '';
        }

        $extra = [];
        $name  = $data[1];
        if (!$data[5]) {
            $path = sprintf('overlays/mahjong/mahjong_%s.cfg', $name);
            if (file_exists($path)) {
                $data[5] = basename($path);
                if (str_contains(file_get_contents($path), 'bet.png')) {
                    $extra[] = '[BET]';
                }
            }
        }
        foreach ($extra as $e) {
            if (!str_contains($data[6], $e)) {
                $data[6] = $e . $data[6];
            }
        }
        return $data;
    }
}
