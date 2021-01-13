<?php

namespace Pedstores\App\Items;

class AgedBrie extends AbstractItem
{
    const ITEM_NAME = 'Aged Brie';

    public function advanceDays(int $days): void
    {
        foreach (range(1, $days) as $index) {
            $this->sellIn--;
            $this->quality = min($this->quality + 1, 50);    
        }
    }
}
