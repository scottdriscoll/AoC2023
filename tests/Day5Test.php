<?php

namespace App\Tests;

use App\Aoc\Day5\Day5;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Day5Test extends TestCase
{
    #[DataProvider('provideData')]
    public function testRun(int $expected, string $input, bool $part2)
    {
        $day = new Day5();
        $this->assertEquals($expected, $day->run($input, $part2));
    }

    public static function provideData(): iterable
    {
        yield 'part 1 sample' => [35, file_get_contents(__DIR__ . '/fixtures/day5/part1.txt'), false];
    }
}
