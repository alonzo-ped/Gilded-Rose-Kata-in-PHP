<?php

namespace Pedstores\App\Items;

class Sulfuras extends AbstractItem
{
    const ITEM_NAME = 'Sulfuras, Hand of Ragnaros';

    public function __construct(string $name, int $quality, int $days)
    {
        $this->name = self::ITEM_NAME;
        $this->quality = 80;
        $this->sellIn = $days;
    }

    public function advanceDays(int $days): void
    {
    }
}
