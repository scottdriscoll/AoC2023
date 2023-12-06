<?php

require_once(__DIR__ . '/vendor/autoload.php');

use App\Aoc\Day3\Day3;

$day2 = new Day3();

echo $day2->run(file_get_contents(__DIR__ . '/data/day3.txt'), true) . PHP_EOL;
