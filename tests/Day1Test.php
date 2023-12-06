<?php

namespace App\Tests;

use App\Aoc\Day1;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    #[DataProvider('provideData')]
    public function testRun($expected, $replace, $input)
    {
        $day = new Day1();
        $this->assertEquals($expected, $day->run($input, $replace));
    }

    public static function provideData(): iterable
    {
        yield 'part 1 multiline' => [48, false, "1asf5\naf3g"];
        yield 'part 1 sample' => [142, false, file_get_contents(__DIR__ . '/fixtures/day1/part1.txt')];
        yield 'part 2 duplicated letter' => [55, true, 'five4five'];
        yield 'part 2 shared letter' => [82, true, 'eightwo'];
        yield 'part 2 duplicated and shared letters' => [33, true, 'three4eighthree'];
        yield 'part 2 duplicated and shared letters (2)' => [35, true, 'three4eighthree5'];
        yield 'part 2 sample' => [281, true, file_get_contents(__DIR__ . '/fixtures/day1/part2.txt')];
    }
}
