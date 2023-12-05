<?php

namespace App\Tests;

use App\Aoc\Day2;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    #[DataProvider('provideData')]
    public function testRun(int $expected, string $input, bool $part2)
    {
        $day1 = new Day2();
        $this->assertEquals($expected, $day1->run($input, $part2));
    }

    public static function provideData(): iterable
    {
        yield 'part 1 positive' => [1, 'Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green', false];
        yield 'part 1 multiline positive' => [3, "Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green\nGame 2: 8 blue, 9 red, 12 green", false];
        yield 'part 1 negative' => [0, 'Game 1: 35 blue, 4 red', false];
        yield 'part 1 multiline positive and negative' => [2, "Game 1: 31 blue, 4 red; 1 red, 2 green, 6 blue; 2 green\nGame 2: 8 blue, 9 red, 12 green", false];
        yield 'part 1 sample' => [8, file_get_contents(__DIR__ . '/fixtures/day2/part1.txt'), false];
        yield 'part 2 test 1' => [48, 'Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green', true];
        yield 'part 2 test 2' => [12, 'Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue', true];
        yield 'part 2 test 3' => [1560, 'Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red', true];
        yield 'part 2 test 4' => [630, 'Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red', true];
        yield 'part 2 test 5' => [36, 'Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green', true];
        yield 'part 2 sample' => [2286, file_get_contents(__DIR__ . '/fixtures/day2/part1.txt'), true];
    }
}
