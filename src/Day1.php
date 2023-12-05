<?php

namespace App\Aoc;

class Day1
{
    public function run(string $input): int
    {
        $total = 0;

        foreach (explode("\n", $input) as $str) {
            $inputArray = str_split(strtolower($str));
            $arr = array_filter(
                $inputArray,
                function ($letter) {
                    return is_numeric($letter);
                }
            );

            $total += (int) (reset($arr) . end($arr));
        }

        return $total;
    }
}
