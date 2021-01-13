<?php

namespace Pedstores\App\Items;

use PHPUnit\Framework\TestCase;

class AgedBrieTest extends TestCase
{
    public function testThatAgedBrieIncreasesInQualityAsItAges(): void
    {
        $item = new AgedBrie('Aged Brie', 4, 4);
        $item->advanceDays(2);
        $this->assertTrue($item->getQuality() === 6);
    }

    public function testTheQualityOfAnItemIsNeverMoreThanFifty(): void
    {
        $item = new AgedBrie('Aged Brie', 48, 1);
        $item->advanceDays(3);
        $this->assertTrue($item->getQuality() === 50, $item->getQuality());
    }
}