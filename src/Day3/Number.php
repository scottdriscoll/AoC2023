<?php

namespace App\Aoc\Day3;

class Number
{
    public function __construct(
        public int $value,
        public int $position,
        public int $size
    ) { }
}
