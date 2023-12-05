<?php

namespace App\Aoc;

class Day2
{
    private array $max = [
        'red' => 12,
        'green' => 13,
        'blue' => 14
    ];

    public function run(string $input): int
    {
        $total = 0;
        $games = explode("\n", $input);

        foreach ($games as $game) {
            list($gameId, $grabs) = explode(':', $game);
            $gameId = (int)explode(' ', $gameId)[1];

            foreach (explode(';', $grabs) as $grab) {
                $cubes = explode(',', trim($grab));
                foreach ($cubes as $cube) {
                    $totals = explode(' ', trim($cube));
                    if ($totals[0] > $this->max[$totals[1]]) {
                        continue 3;
                    }
                }
            }

            $total += $gameId;
        }

        return $total;
    }
}
