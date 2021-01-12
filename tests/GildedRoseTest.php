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
}
