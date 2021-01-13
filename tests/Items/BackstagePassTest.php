<?php

namespace Pedstores\App\Items;

use PHPUnit\Framework\TestCase;

class BackstagePassTest extends TestCase
{
    public function testThatBackStagePassesIncreaseInQualityEtAl(): void
    {
        $item = new BackstagePass('Backstage passes to a TAFKAL80ETC concert', 5, 12);
        $item->advanceDays(2);
        // after two days quality has increased two
        $this->assertTrue($item->getQuality() === 7);
        $this->assertTrue($item->getDaysRemaining() === 10);
        $item->advanceDays(2);
        // with 10 days sellIn left quality increases by 2
        $this->assertTrue($item->getQuality() === 11);
        $item->advanceDays(4);
        // with less than 5 sellIn left quality increases by 3
        $this->assertTrue($item->getQuality() === 20);
        $item->advanceDays(4);
        $this->assertTrue($item->getQuality() === 32);
        $item->advanceDays(1);
        // when the sellIn date has passed quality drops to zero
        $this->assertTrue($item->getQuality() === 0);
        $this->assertTrue($item->getDaysRemaining() === -1);
    }
}
