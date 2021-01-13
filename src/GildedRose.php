<?php

namespace Pedstores\App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = min($quality, 50);
        $this->sellIn = $sellIn;
    }

    public static function getItem($name, $quality, $sellIn): GildedRose
    {
        return new static($name, $quality, $sellIn);
    }

    public function numberOfDaysPassed(int $days): void
    {
        foreach(range(1, $days) as $count) {
            $this->defaultDayPassed();
        }
    }

    private function defaultDayPassed(): void
    {
        $this->sellIn--;
        if ($this->sellIn >= 0) {
            $this->quality = max($this->quality - 1, 0);
        } else {
            $this->quality = max($this->quality - 2, 0);
        }
    }
}
