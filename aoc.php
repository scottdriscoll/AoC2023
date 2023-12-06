<?php

require_once(__DIR__ . '/vendor/autoload.php');

use App\Aoc\Day4;

$day = new Day4();

echo $day->run(file_get_contents(__DIR__ . '/data/day4.txt'), true) . PHP_EOL;
