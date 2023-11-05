<?php

namespace App\Models;

class Board
{
    public ?array $state;
    public int $size;

    public function __construct(int $boardSize, ?array $state = null)
    {
        if (!$state) {
            $state = self::getEmptyState($boardSize);
        }
        $this->state = $state;
        $this->size = $boardSize;
    }

    public static function getEmptyState(int $size): ?array
    {
        return array_fill(0, $size, array_fill(0, $size, 0));
    }

    public function iterate()
    {
        $newState = self::getEmptyState($this->size);
        foreach ($this->state as $x => $row) {
            foreach ($row as $y => $cell) {
                $newState[$x][$y] = $this->transitCell($x, $y);
            }
        }
        $this->state = $newState;
    }

    private function transitCell(int $x, int $y): bool
    {
        $liveNeighbours =
            (int)$this->getCell($x - 1, $y - 1) +
            (int)$this->getCell($x - 1, $y) +
            (int)$this->getCell($x - 1, $y + 1) +
            (int)$this->getCell($x, $y - 1) +
            (int)$this->getCell($x, $y + 1) +
            (int)$this->getCell($x + 1, $y - 1) +
            (int)$this->getCell($x + 1, $y) +
            (int)$this->getCell($x + 1, $y + 1);

        if ($this->getCell($x, $y)) {
            if ($liveNeighbours < 2 || $liveNeighbours > 3) return false;
            return true;
        } else {
            return $liveNeighbours == 3;
        }
    }

    public function getCell(int $x, int $y): bool
    {
        return !!$this->state[$this->normalizeCoordinate($x)][$this->normalizeCoordinate($y)];
    }

    public function toggleCell(int $x, int $y)
    {
        $this->state[$x][$y] = !$this->getCell($x, $y);
    }

    private function normalizeCoordinate(int $x): int
    {
        if ($x >= 0) {
            return $x % $this->size;
        }
        return $this->size - abs($x) % $this->size;
    }
}
