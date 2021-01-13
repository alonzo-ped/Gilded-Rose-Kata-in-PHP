<?php

namespace Pedstores\App\Items;

interface ItemInterface
{
    public function advanceDays(int $days): void;
    public function getQuality(): int;
    public function getDaysRemaining(): int;
}
