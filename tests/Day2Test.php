<?php

namespace App\Tests;

use App\Aoc\Day2;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    #[DataProvider('provideData')]
    public function testRun($expected, $input)
    {
        $day1 = new Day2();
        $this->assertEquals($expected, $day1->run($input));
    }

    public static function provideData(): iterable
    {
        yield 'part 1 positive' => [1, 'Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green'];
        yield 'part 1 multiline positive' => [3, "Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green\nGame 2: 8 blue, 9 red, 12 green"];
        yield 'part 1 negative' => [0, 'Game 1: 35 blue, 4 red'];
        yield 'part 1 multiline positive and negative' => [2, "Game 1: 31 blue, 4 red; 1 red, 2 green, 6 blue; 2 green\nGame 2: 8 blue, 9 red, 12 green"];
        yield 'part 1 sample' => [8, file_get_contents(__DIR__ . '/fixtures/day2/part1.txt')];
    }
}
