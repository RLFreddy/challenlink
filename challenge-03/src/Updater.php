<?php

namespace App;

class Updater {
    private const MIN_QUALITY = 0;
    private const MAX_QUALITY = 50;

    public function updateNormal(Item $item): void {
        $this->degradeQuality($item, $item->sellIn > 0 ? 1 : 2);
        $this->decrementSellIn($item);
    }

    public function agedBrie(Item $item): void {
        $this->improveQuality($item, $item->sellIn > 0 ? 1 : 2);
        $this->decrementSellIn($item);
    }

    public function backstagePasses(Item $item): void {
        if ($item->sellIn <= 0) {
            $item->quality = 0;
        } elseif ($item->sellIn <= 5) {
            $this->improveQuality($item, 3);
        } elseif ($item->sellIn <= 10) {
            $this->improveQuality($item, 2);
        } else {
            $this->improveQuality($item, 1);
        }
        $this->decrementSellIn($item);
    }

    public function sulfuras(Item $item): void {
        // Legendary item, no changes
    }

    private function improveQuality(Item $item, $amount): void {
        $item->quality = min(self::MAX_QUALITY, $item->quality + $amount);
    }

    private function degradeQuality(Item $item, $amount): void {
        $item->quality = max(self::MIN_QUALITY, $item->quality - $amount);
    }

    private function decrementSellIn(Item $item): void {
        $item->sellIn--;
    }

    public function updateConjured(Item $item): void {
        $this->degradeQuality($item, $item->sellIn > 0 ? 2 : 4);
        $this->decrementSellIn($item);
    }
}