<?php

namespace App\Aoc;

class Day4
{

    public function run(string $input, bool $part2): int
    {
        $total = 0;
        $cards = [];
        foreach (explode("\n", $input) as $card) {
            $parts = explode(':', $card);
            $cardId = (int) str_replace(['Card', ' '], '', $parts[0]);
            $parts = explode('|', $parts[1]);
            foreach (explode(' ', trim($parts[0])) as $number) {
                $number = trim($number);
                if (is_numeric($number)) {
                    $cards[$cardId]['winner'][] = (int) $number;
                }
            }
            foreach (explode(' ', trim($parts[1])) as $number) {
                $number = trim($number);
                if (is_numeric($number)) {
                    $cards[$cardId]['hand'][] = (int)$number;
                }
            }
        }

        foreach ($cards as $cardId => $card) {
            $winners = array_intersect($card['hand'], $card['winner']);
            if (count($winners) > 0) {
                $total += (int) bindec(str_pad('1', count($winners), 0));
            }
        }

        return $total;
    }
}
