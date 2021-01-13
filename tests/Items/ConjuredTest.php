<?php

namespace Pedstores\App\Items;

use PHPUnit\Framework\TestCase;

class ConjuredTest extends TestCase
{
    public function testThatConjuredItemsDegradeTwiceAsFast(): void 
    {
        $item = new Conjured('Conjured', 20, 5);
        $item->advanceDays(5);
        $this->assertTrue($item->getQuality() === 10);
        $item->advanceDays(1);
        $this->assertTrue($item->getQuality() === 6);
    }
}