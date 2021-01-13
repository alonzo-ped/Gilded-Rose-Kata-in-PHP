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

    public static function getItem($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function numberOfDaysPassed(int $days): void
    {
        foreach(range(1, $days) as $count) {
            switch ($this->name) {
                case 'Aged Brie':
                    $this->agedBrieDayPassed();
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $this->backstagePassDayPassed();
                    break;
                case 'Sulfuras, Hand of Ragnaros':
                    break;
                default:
                    $this->defaultDayPassed();
                    break;
            }
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

    private function agedBrieDayPassed(): void
    {
        $this->sellIn--;
        $this->quality = min($this->quality + 1, 50);
    }

    private function backstagePassDayPassed(): void
    {
        $this->sellIn--;
        if ($this->sellIn >= 10) {
            $this->quality = min($this->quality + 1, 50);
        } elseif ($this->sellIn < 10 && $this->sellIn >= 5) {
            $this->quality = min($this->quality + 2, 50);
        } elseif ($this->sellIn < 5 && $this->sellIn >= 0) {
            $this->quality = min($this->quality + 3, 50);
        } else {
            $this->quality = 0;
        }
    }
}
