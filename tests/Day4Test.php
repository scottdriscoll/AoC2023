<?php

namespace App\Tests;

use App\Aoc\Day4;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Day4Test extends TestCase
{
    #[DataProvider('provideData')]
    public function testRun(int $expected, string $input, bool $part2)
    {
        $day = new Day4();
        $this->assertEquals($expected, $day->run($input, $part2));
    }

    public static function provideData(): iterable
    {
        yield 'part 1 try 1' => [8, 'Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53', false];
        yield 'part 1 sample' => [13, file_get_contents(__DIR__ . '/fixtures/day4/part1.txt'), false];
    }
}
