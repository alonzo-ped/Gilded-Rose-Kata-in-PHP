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
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function getItem($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function numberOfDaysPassed(int $days): void
    {
        foreach(range(1, $days) as $count) {
            if ($this->name != 'Aged Brie' and $this->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($this->quality > 0) {
                    if ($this->name != 'Sulfuras, Hand of Ragnaros') {
                        $this->quality = $this->quality - 1;
                    }
                }
            } else {
                if ($this->quality < 50) {
                    $this->quality = $this->quality + 1;

                    if ($this->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($this->sellIn < 11) {
                            if ($this->quality < 50) {
                                $this->quality = $this->quality + 1;
                            }
                        }
                        if ($this->sellIn < 6) {
                            if ($this->quality < 50) {
                                $this->quality = $this->quality + 1;
                            }
                        }
                    }
                }
            }

            if ($this->name != 'Sulfuras, Hand of Ragnaros') {
                $this->sellIn = $this->sellIn - 1;
            }

            if ($this->sellIn < 0) {
                if ($this->name != 'Aged Brie') {
                    if ($this->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($this->quality > 0) {
                            if ($this->name != 'Sulfuras, Hand of Ragnaros') {
                                $this->quality = $this->quality - 1;
                            }
                        }
                    } else {
                        $this->quality = $this->quality - $this->quality;
                    }
                } else {
                    if ($this->quality < 50) {
                        $this->quality = $this->quality + 1;
                    }
                }
            }
        }
    }
}
