<?php

namespace App\Tests;

use App\Aoc\Day1;
use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    public function testPart1()
    {
        $day1 = new Day1();
        $input = "1abc2
pqr3stu8vwx
a1b2c3d4e5f
treb7uchet";

        $this->assertEquals(142, $day1->part1($input));
    }
}
