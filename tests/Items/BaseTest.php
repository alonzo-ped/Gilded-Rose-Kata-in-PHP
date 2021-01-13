<?php

namespace Pedstores\App\Items;

use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    public function testThatAnItemQualityAndSellInDecreaseEachDay(): void
    {
        $item = new Base('apple', 4, 4);
        $item->advanceDays(1);
        $this->assertTrue($item->getQuality() === 3);
        $this->assertTrue($item->getDaysRemaining() === 3);
    }

    public function testThatAnItemQualityNeverDropsBelowZero(): void
    {
        $item = new Base('pear', 4, 4);
        $item->advanceDays(6);
        $this->assertTrue($item->getQuality() === 0);
    }

    public function testThatQualityDegradesTwiceAsFastAfterSellIn(): void
    {
        $item = new Base('persimmon', 6, 2);
        $item->advanceDays(2);
        $this->assertTrue($item->getQuality() === 4);
        $item->advanceDays(1);
        $this->assertTrue($item->getQuality() === 2);
    }

    public function testTheQualityOfAnItemIsNeverMoreThanFifty(): void
    {
        $item = new Base('pineapple', 100, 4);
        $this->assertTrue($item->getQuality() === 50);
    }
}