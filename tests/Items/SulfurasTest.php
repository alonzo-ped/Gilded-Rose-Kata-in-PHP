<?php

namespace Pedstores\App\Items;

use PHPUnit\Framework\TestCase;

class SulfurasTest extends TestCase
{
    public function testThatSulfurasNeverHasToBeSoldAndNeverDecreasesInQuality(): void
    {
        $item = new Sulfuras('Sulfuras, Hand of Ragnaros', 50, 4);
        $item->advanceDays(3);
        $this->assertTrue($item->getQuality() === 80);
        $this->assertTrue($item->getDaysRemaining() === 4);
    }
}
