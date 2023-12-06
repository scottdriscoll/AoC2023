<?php

namespace App\Aoc;

class Day4
{
    private function parseInput(string $input): array
    {
        $cards = [];
        foreach (explode("\n", $input) as $card) {
            $parts = explode(':', $card);
            $cardId = (int) str_replace(['Card', ' '], '', $parts[0]);
            $parts = explode('|', $parts[1]);
            $cards[$cardId]['total'] = 1;
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

        return $cards;
    }

    private function part1(array $cards): int
    {
        $total = 0;

        foreach ($cards as $card) {
            $winners = array_intersect($card['hand'], $card['winner']);
            if (count($winners) > 0) {
                $total += (int) bindec(str_pad('1', count($winners), '0'));
            }
        }

        return $total;
    }

    private function part2(array $cards): int
    {
        for ($cardCounter = 1; $cardCounter <= count($cards); $cardCounter++) {
            $winners = array_intersect($cards[$cardCounter]['hand'], $cards[$cardCounter]['winner']);
            if (count($winners) > 0) {
                for ($i = 0; $i < $cards[$cardCounter]['total']; $i++) {
                    for ($j = 0; $j < count($winners); $j++) {
                        if (isset($cards[$cardCounter + $j +1])) {
                            $cards[$cardCounter + $j + 1]['total']++;
                        }
                    }
                }
            }
        }

        $total = 0;

        foreach ($cards as $card) {
            $total += $card['total'];
        }

        return $total;
    }

    public function run(string $input, bool $part2): int
    {
        $cards = $this->parseInput($input);

        if ($part2) {
            return $this->part2($cards);
        }

        return $this->part1($cards);
    }
}
