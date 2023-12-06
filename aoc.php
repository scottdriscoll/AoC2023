<?php

require_once(__DIR__ . '/vendor/autoload.php');

use App\Aoc\Day5\Day5;

$day = new Day5();

echo $day->run(file_get_contents(__DIR__ . '/data/day5.txt'), false) . PHP_EOL;
