<?php

namespace Pedstores\App\Items;

abstract class AbstractItem implements ItemInterface
{
    const ITEM_NAME = null;

    protected $name;
    protected $quality;
    protected $sellIn;

    public function __construct(string $name, int $quality, int $days)
    {
        if (!empty(static::ITEM_NAME)) {
            $this->name = self::ITEM_NAME;
        } else {
            $this->name = $name;
        }
        $this->quality = min($quality, 50);
        $this->sellIn = $days;
    }

    abstract public function advanceDays(int $days): void;

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function getDaysRemaining(): int
    {
        return $this->sellIn;
    }
}
