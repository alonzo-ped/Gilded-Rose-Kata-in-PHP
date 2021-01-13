<?php

namespace Pedstores\App;

use Pedstores\App\Items\AgedBrie;
use Pedstores\App\Items\BackstagePass;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testThatWeCanGetQualityForAnItem(): void
    {
        $expected = 4;
        $item = GildedRose::getItem('anything', $expected, 4);
        $this->assertEquals($expected, $item->getQuality());
    }

    public function testThatWeCanGetDaysRemaining(): void
    {
        $expected = 5;
        $item = GildedRose::getItem('eggplant', 4, 5);
        $this->assertEquals($expected, $item->getDaysRemaining());
    }

    public function testThatGildedRoseReturnsTheCorrectItemType(): void
    {
        $item = GildedRose::getItem(Items\AgedBrie::ITEM_NAME, 5, 5);
        $this->assertInstanceOf(Items\AgedBrie::class, $item);
        $item = GildedRose::getItem(Items\BackstagePass::ITEM_NAME, 5, 5);
        $this->assertInstanceOf(BackstagePass::class, $item);
        $item = GildedRose::getItem(Items\Conjured::ITEM_NAME, 5, 5);
        $this->assertInstanceOf(Items\Conjured::class, $item);
        $item = GildedRose::getItem(Items\Sulfuras::ITEM_NAME, 5, 5);
        $this->assertInstanceOf(Items\Sulfuras::class, $item);
    }
}
