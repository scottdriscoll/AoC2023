<?php

namespace App\Aoc;

class Day2
{
    private array $max = [
        'red' => 12,
        'green' => 13,
        'blue' => 14
    ];

    public function run(string $input, bool $part2): int
    {
        $total = 0;
        $games = explode("\n", $input);

        foreach ($games as $game) {
            list($gameId, $grabs) = explode(':', $game);
            $gameId = (int)explode(' ', $gameId)[1];
            $amount = !$part2 ? $gameId : 0;
            $minAmounts = ['red' => 0, 'green' => 0, 'blue' => 0];

            foreach (explode(';', $grabs) as $grab) {
                $cubes = explode(',', trim($grab));
                foreach ($cubes as $cube) {
                    $totals = explode(' ', trim($cube));
                    $color = $totals[1];
                    if (!$part2) {
                        if ($totals[0] > $this->max[$color]) {
                            $amount = 0;
                            break 2;
                        }
                    } else {
                        $minAmounts[$color] = max($minAmounts[$color], (int) $totals[0]);
                    }
                }
            }

            if ($part2) {
                $amount = $minAmounts['red'] * $minAmounts['green'] * $minAmounts['blue'];
            }

            $total += $amount;
        }

        return $total;
    }
}
