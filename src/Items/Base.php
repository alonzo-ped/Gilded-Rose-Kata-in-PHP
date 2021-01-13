<?php

namespace Pedstores\App\Items;

class Base extends AbstractItem
{
    public function advanceDays(int $days): void
    {
        foreach (range(1, $days) as $index) {
            $this->sellIn--;
            if ($this->sellIn >= 0) {
                $this->quality = max($this->quality - 1, 0);
            } else {
                $this->quality = max($this->quality - 2, 0);
            }
        }
    }
}
