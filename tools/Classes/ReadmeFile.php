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
            "#<!-- $tName -->.*?<!-- /$tName -->#",
            implode("\n", $table),
            $text
        );
        file_put_contents($readmeFile, $text);
    }
}
