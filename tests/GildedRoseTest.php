<?php

namespace Pedstores\App;


use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testThatAnItemHasSellIn(): void
    {
        $item = GildedRose::of('anything', 4, 4);
        $this->assertObjectHasAttribute('sellIn', $item);
    }

    public function testThatAnItemHasQuality(): void
    {
        $item = GildedRose::of('eggplant', 4, 5);
        $this->assertObjectHasAttribute('quality', $item);
    }

    public function testThatAnItemQualityAndSellInDecreaseEachDay(): void
    {
        $item = GildedRose::of('apple', 4, 4);
        $item->tick();
        $this->assertTrue($item->quality === 3);
        $this->assertTrue($item->sellIn === 3);
    }

    public function testThatQualityDegradesTwiceAsFastAfterSellIn(): void
    {
        $item = GildedRose::of('persimmon', 6, 2);
        $item->tick();
        $item->tick();
        $this->assertTrue($item->quality === 4);
        $item->tick();
        $this->assertTrue($item->quality === 2);
    }

    public function testThatAgedBrieIncreasesInQualityAsItAges(): void
    {
        $item = GildedRose::of('Aged Brie', 4, 4);
        $item->tick();
        $item->tick();
        $this->assertTrue($item->quality === 6);
    }
    public function testTheQualityOfAnItemIsNeverMoreThanFifty(): void
    {
        $item = GildedRose::of('Aged Brie', 48, 1);
        $item->tick();
        $item->tick();
        $item->tick();
        $this->assertTrue($item->quality === 50, $item->quality);

//        $item = GildedRose::of('pineapple', 100, 4);
//        $this->assertTrue($item->quality === 50);
    }

    public function testThatSulfurasNeverHasToBeSoldAndNeverDecreasesInQuality(): void
    {
        $item = GildedRose::of('Sulfuras, Hand of Ragnaros', 50, 4);
        $item->tick();
        $item->tick();
        $item->tick();
        $this->assertTrue($item->quality === 50);
        $this->assertTrue($item->sellIn === 4);
    }

    public function testThatBackStagePassesIncreaseInQualityEtAl(): void
    {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 5, 12);
        $item->tick();
        $item->tick();
        $this->assertTrue($item->quality === 7);
        $this->assertTrue($item->sellIn === 10);
        $item->tick();
        $item->tick();
        $this->assertTrue($item->quality === 11);
        $item->tick();
        $item->tick();
        $item->tick();
        $item->tick();
        $this->assertTrue($item->quality === 20);
        $item->tick();
        $item->tick();
        $item->tick();
        $item->tick();
        $this->assertTrue($item->quality === 32);
        $item->tick();
        $this->assertTrue($item->quality === 0);
        $this->assertTrue($item->sellIn === -1);
    }
}
