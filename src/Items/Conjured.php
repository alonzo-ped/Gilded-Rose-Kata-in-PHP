<?php

namespace Pedstores\App\Items;

class Conjured extends AbstractItem
{
    const ITEM_NAME = 'Conjured';

    public function advanceDays(int $days): void
    {
        foreach (range(1, $days) as $index) {
            $this->sellIn--;
            if ($this->sellIn >= 0) {
                $this->quality = max($this->quality - 2, 0);
            } else {
                $this->quality = max($this->quality - 4, 0);
            }
        }
    }
}
