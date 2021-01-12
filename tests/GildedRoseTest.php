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
}
