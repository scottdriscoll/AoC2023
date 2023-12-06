<?php

namespace App\Aoc\Day5;

class Day5
{
    private function parseInput(string $input): array
    {
        $mapping = [
            'seed-to-soil map:' => [],
            'soil-to-fertilizer map:' => [],
            'fertilizer-to-water map:' => [],
            'water-to-light map:' => [],
            'light-to-temperature map:' => [],
            'temperature-to-humidity map:' => [],
            'humidity-to-location map:' => []
        ];

        // Read seeds
        $line = strtok($input, "\n");
        $seeds = explode(' ', trim(explode(':', $line)[1]));

        $currentMap = '';
        while (($line = strtok("\n")) !== false) {
            if (isset($mapping[$line])) {
                $currentMap = $line;
                continue;
            }

            list($destination, $source, $range) = explode(' ', $line);
            $mapping[$currentMap][] = new Mapping(
                destination: $destination,
                source: $source,
                range: $range
            );
        }

        return [
            'seeds' => $seeds,
            'mapping' => $mapping
        ];
    }

    /**
     * @param int $value
     * @param Mapping[] $mapping
     * @return int
     */
    private function getDestination(int $value, array $mapping): int
    {
        foreach ($mapping as $map) {
            if ($value >= $map->source && $value <= $map->source + $map->range) {
                return $value - $map->source + $map->destination;
            }
        }

        return $value;
    }

    private function part1(array $mapping): int
    {
        $lowest = null;
        foreach ($mapping['seeds'] as $seed) {
            $soil = $this->getDestination($seed, $mapping['mapping']['seed-to-soil map:']);
            $fertilizer = $this->getDestination($soil, $mapping['mapping']['soil-to-fertilizer map:']);
            $water = $this->getDestination($fertilizer, $mapping['mapping']['fertilizer-to-water map:']);
            $light = $this->getDestination($water, $mapping['mapping']['water-to-light map:']);
            $temperature = $this->getDestination($light, $mapping['mapping']['light-to-temperature map:']);
            $humidity = $this->getDestination($temperature, $mapping['mapping']['temperature-to-humidity map:']);
            $location = $this->getDestination($humidity, $mapping['mapping']['humidity-to-location map:']);
            $lowest = $lowest !== null ? min($lowest, $location) : $location;
        }

        return (int) $lowest;
    }

    private function part2(array $mapping): int
    {
        return 0;
    }

    public function run(string $input, bool $part2): int
    {
        $mapping = $this->parseInput($input);

        if ($part2) {
            return $this->part2($mapping);
        }

        return $this->part1($mapping);
    }
}
