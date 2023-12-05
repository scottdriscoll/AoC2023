<?php

namespace App\Tests;

use App\Aoc\Day1;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    #[DataProvider('provideData')]
    public function testRun($expected, $input)
    {
        $day1 = new Day1();
        $this->assertEquals($expected, $day1->run($input));
    }

    public static function provideData(): iterable
    {
        yield 'part 1' => [142, "1abc2
pqr3stu8vwx
a1b2c3d4e5f
treb7uchet"];

        yield 'part 2' => [281, "two1nine
eightwothree
abcone2threexyz
xtwone3four
4nineeightseven2
zoneight234
7pqrstsixteen"];
    }
}
