<?php

require_once(__DIR__ . '/vendor/autoload.php');

use App\Aoc\Day2;

$day2 = new Day2();

echo $day2->run(file_get_contents(__DIR__ . '/data/day2.txt')) . PHP_EOL;
