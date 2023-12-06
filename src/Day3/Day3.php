<?php

namespace App\Aoc\Day3;

class Day3
{
    private function nextToNumber(Number $number, array $symbols): bool
    {
        foreach (['above', 'same', 'below'] as $place) {
            if ($symbols[$place] === null) {
                continue;
            }

            for ($i = $number->position - 1; $i <= $number->position + $number->size; $i++) {
                if (isset($symbols[$place][$i])) {
                    return true;
                }
            }
        }

        return false;
    }

    private function numbersByGear(int $gearPos, array $numbers): array
    {
        $result = [];

        foreach (['above', 'same', 'below'] as $place) {
            if ($numbers[$place] === null) {
                continue;
            }

            // A number must exist between $gearPos - 1 and $gearPos + 1 in either of the 3 rows
            /** @var Number $number */
            foreach ($numbers[$place] as $number) {
                if ($gearPos >= $number->position - 1 && $gearPos <= $number->position + $number->size) {
                    $result[] = $number->value;
                }
            }
        }

        return $result;
    }

    public function run(string $input, bool $part2): int
    {
        $boardRows = explode("\n", $input);
        $total = 0;
        $numbers = [];
        $symbols = [];
        $gears = [];

        /**
         * We have to search through each row, and record the numbers and symbols,
         * as well as their positions and sizes (for numbers)
         */
        foreach ($boardRows as $idx => $board) {
            for ($i = 0; $i < strlen($board); ) {
                if (is_numeric($board[$i])) {
                    // Is a number, parse it out
                    $val = '';
                    for ($j = $i; $j < strlen($board) && is_numeric($board[$j]); $j++) {
                        $val .= $board[$j];
                    }
                    $numbers[$idx][] = new Number(
                        value: (int) $val,
                        position: $i,
                        size: strlen($val)
                    );
                    $i += strlen($val);
                } elseif ($board[$i] !== '.') {
                    // Is a symbol (or gear)
                    $symbols[$idx][$i] = true;
                    if ($board[$i] === '*') {
                        $gears[$idx][$i] = true;
                    }
                    $i++;
                } else {
                    $i++;
                }
            }
        }

        // Now we have all numbers and symbols parsed with their positions and sizes.
        if ($part2) {
            // Part 2
            // Look for gears (*) that are touching exactly 2 numbers.
            // Multiply those numbers together, and add it to the total.
            foreach ($gears as $row => $posArray) {
                foreach ($posArray as $pos => $true) {
                    $numbersByGear = $this->numbersByGear($pos, [
                        'above' => $numbers[$row - 1] ?? null,
                        'same' => $numbers[$row] ?? null,
                        'below' => $numbers[$row + 1] ?? null
                    ]);

                    if (count($numbersByGear) === 2) {
                        $total += ($numbersByGear[0] * $numbersByGear[1]);
                    }
                }
            }

        } else {
            // Part 1
            // For each number, we have to search all around it for a symbol.
            foreach ($numbers as $row => $numberArray) {
                /** @var Number $number */
                foreach ($numberArray as $number) {
                    if ($this->nextToNumber($number, [
                        'above' => $symbols[$row - 1] ?? null,
                        'same' => $symbols[$row] ?? null,
                        'below' => $symbols[$row + 1] ?? null
                    ])) {
                        $total += $number->value;
                    }
                }
            }
        }

        return $total;
    }
}
