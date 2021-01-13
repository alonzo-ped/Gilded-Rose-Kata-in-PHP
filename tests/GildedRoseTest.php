<?php

namespace Pedstores\App;


use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testThatAnItemHasSellIn(): void
    {
        $item = GildedRose::getItem('anything', 4, 4);
        $this->assertObjectHasAttribute('sellIn', $item);
    }

    public function testThatAnItemHasQuality(): void
    {
        $item = GildedRose::getItem('eggplant', 4, 5);
        $this->assertObjectHasAttribute('quality', $item);
    }

    public function testThatAnItemQualityAndSellInDecreaseEachDay(): void
    {
        $item = GildedRose::getItem('apple', 4, 4);
        $item->numberOfDaysPassed(1);
        $this->assertTrue($item->quality === 3);
        $this->assertTrue($item->sellIn === 3);
    }

    public function testThatAnItemQualityNeverDropsBelowZero(): void
    {
        $item = GildedRose::getItem('pear', 4, 4);
        $item->numberOfDaysPassed(6);
        $this->assertTrue($item->quality === 0);
    }

    public function testThatQualityDegradesTwiceAsFastAfterSellIn(): void
    {
        $item = GildedRose::getItem('persimmon', 6, 2);
        $item->numberOfDaysPassed(2);
        $this->assertTrue($item->quality === 4);
        $item->numberOfDaysPassed(1);
        $this->assertTrue($item->quality === 2);
    }

    public function testThatAgedBrieIncreasesInQualityAsItAges(): void
    {
        $item = GildedRose::getItem('Aged Brie', 4, 4);
        $item->numberOfDaysPassed(2);
        $this->assertTrue($item->quality === 6);
    }

    public function testTheQualityOfAnItemIsNeverMoreThanFifty(): void
    {
        $item = GildedRose::getItem('Aged Brie', 48, 1);
        $item->numberOfDaysPassed(3);
        $this->assertTrue($item->quality === 50, $item->quality);

        $item = GildedRose::getItem('pineapple', 100, 4);
        $this->assertTrue($item->quality === 50);
    }

    public function testThatSulfurasNeverHasToBeSoldAndNeverDecreasesInQuality(): void
    {
        $item = GildedRose::getItem('Sulfuras, Hand of Ragnaros', 50, 4);
        $item->numberOfDaysPassed(3);
        $this->assertTrue($item->quality === 50);
        $this->assertTrue($item->sellIn === 4);
    }

    public function testThatBackStagePassesIncreaseInQualityEtAl(): void
    {
        $item = GildedRose::getItem('Backstage passes to a TAFKAL80ETC concert', 5, 12);
        $item->numberOfDaysPassed(2);
        // after two days quality has increased two
        $this->assertTrue($item->quality === 7);
        $this->assertTrue($item->sellIn === 10);
        $item->numberOfDaysPassed(2);
        // with 10 days sellIn left quality increases by 2
        $this->assertTrue($item->quality === 11);
        $item->numberOfDaysPassed(4);
        // with less than 5 sellIn left quality increases by 3
        $this->assertTrue($item->quality === 20);
        $item->numberOfDaysPassed(4);
        $this->assertTrue($item->quality === 32);
        $item->numberOfDaysPassed(1);
        // when the sellIn date has passed quality drops to zero
        $this->assertTrue($item->quality === 0);
        $this->assertTrue($item->sellIn === -1);
    }
}
