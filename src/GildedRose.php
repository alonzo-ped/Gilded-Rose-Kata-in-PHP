<?php

namespace Pedstores\App;

use Pedstores\App\Items\ItemInterface;

class GildedRose
{
    protected static $classMap = [
        Items\AgedBrie::ITEM_NAME => Items\AgedBrie::class,
        Items\BackstagePass::ITEM_NAME => Items\BackstagePass::class,
        Items\Conjured::ITEM_NAME => Items\Conjured::class,
        Items\Sulfuras::ITEM_NAME => Items\Sulfuras::class,
    ];

    public static function getItem($name, $quality, $sellIn): Items\AbstractItem
    {
        if (isset(self::$classMap[$name])) {
            return new self::$classMap[$name]($name, $quality, $sellIn);
        } else {
            return new Items\Base($name, $quality, $sellIn);
        }
    }
}
