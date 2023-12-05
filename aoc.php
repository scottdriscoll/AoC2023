<?php

require_once(__DIR__ . '/vendor/autoload.php');

use App\Aoc\Day1;

$day1 = new Day1();

echo $day1->run(file_get_contents(__DIR__ . '/data/day1.txt'), false) . PHP_EOL;
