<?php

namespace App\Aoc\Day3;

class Day3
{
    private function nextToNumber(Number $number, array $symbols): bool
    {
        if ($symbols['same'] !== null) {
            if (isset($symbols['same'][$number->position-1]) || isset($symbols['same'][$number->position+$number->size])) {
                return true;
            }
        }

        foreach (['above', 'below'] as $place) {
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

    public function run(string $input, bool $part2): int
    {
        $boardRows = explode("\n", $input);
        $total = 0;
        $numbers = [];
        $symbols = [];

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
                    // Is a symbol
                    $symbols[$idx][$i++] = true;
                } else {
                    $i++;
                }
            }
        }

        // Now we have all numbers and symbols parsed with their positions and sizes.
        // For each number, we have to search all around it for a symbol.
        foreach ($numbers as $row => $numberArray) {
            /** @var Number $number */
            foreach ($numberArray as $number) {
                if ($this->nextToNumber($number, [
                    'above' => $symbols[$row - 1] ?? null,
                    'same' => $symbols[$row] ?? null,
                    'below' => $symbols[$row+1] ?? null
                ])) {
                    $total += $number->value;
                }
            }
        }

        return $total;
    }
}
