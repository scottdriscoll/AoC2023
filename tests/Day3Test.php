<?php

namespace App\Tests;

use App\Aoc\Day3\Day3;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Day3Test extends TestCase
{
    #[DataProvider('provideData')]
    public function testRun(int $expected, string $input, bool $part2)
    {
        $day1 = new Day3();
        $this->assertEquals($expected, $day1->run($input, $part2));
    }

    public static function provideData(): iterable
    {
        yield 'part 1 try 1' => [62, '..*62..', false];
        yield 'part 1 try 2' => [62, '*62..', false];
        yield 'part 1 try 3' => [62, '*62..54', false];
        yield 'part 1 try 4' => [116, '*62..54*', false];
        yield 'part 1 try 5' => [62, ".62..\n*...", false];
        yield 'part 1 try 6' => [62, ".62..\n..*...", false];
        yield 'part 1 try 7' => [62, '..62*..', false];
        yield 'part 1 try 8' => [62, "..*..\n.62..\n....", false];
        yield 'part 1 try 9' => [0, ".....\n.62..\n....", false];
        yield 'part 1 try 10' => [62, '*62.61', false];
        yield 'part 1 try 11' => [60, '*30.30@', false];
        yield 'part 1 sample' => [4361, file_get_contents(__DIR__ . '/fixtures/day3/part1.txt'), false];
        yield 'part 2 try 1' => [451490, "......755.\n...$.*....\n.664.598..", true];
        yield 'part 2 sample' => [467835, file_get_contents(__DIR__ . '/fixtures/day3/part2.txt'), true];
    }
}
