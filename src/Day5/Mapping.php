<?php

namespace App\Aoc\Day5;

class Mapping
{
    public function __construct(
        public readonly int $destination,
        public readonly int $source,
        public readonly int $range
    ) { }
}
