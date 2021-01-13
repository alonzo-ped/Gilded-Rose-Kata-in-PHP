<?php

namespace Pedstores\App\Items;

class BackstagePass extends AbstractItem
{
    const ITEM_NAME = 'Backstage passes to a TAFKAL80ETC concert';

    public function advanceDays(int $days): void
    {
        foreach (range(1, $days) as $index) {
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
}
