<?php

namespace App\Aoc;

class Day1
{
    /**
     * There can be shared letters. So we will need to check every position of the string for a number.
     * We can throw away letters that are either not numbers, or not part of a spelled out number.
     */
    private function updateForPart2(string $input): string
    {
        static $values = ['one' => '1', 'two' => '2', 'three' => '3', 'four' => '4', 'five' => '5', 'six' => '6', 'seven' => '7', 'eight' => '8', 'nine' => '9'];
        $output = '';

        $len = strlen($input);
        for ($i = 0; $i < $len; ) {
            if (is_numeric($input[$i])) {
                $output .= $input[$i++];
                continue;
            }

            foreach ($values as $word => $number) {
                if (strpos($input, $word, $i) === $i) {
                    $output .= $number;
                    $i += strlen($word) - 1;
                    continue 2;
                }
            }

            $i++;
        }

        return $output;
    }

    public function run(string $input, bool $part2): int
    {
        $total = 0;

        foreach (explode("\n", $input) as $str) {
            if ($part2) {
                $str = $this->updateForPart2($str);
            }

            $inputArray = str_split($str);
            $arr = array_filter(
                $inputArray,
                function ($letter) {
                    return is_numeric($letter);
                }
            );

            $total += (int)(reset($arr) . end($arr));
        }

        return $total;
    }
}
