<?php

namespace App;

class GildedRose {
    private $item;

    public function __construct($name, $quality, $sellIn) {
        $this->item = new Item($name, $sellIn, $quality);
    }

    public function __get(string $property) {
        if (!property_exists($this->item, $property)) {
            throw new \RuntimeException(
                sprintf('Property "%s" does not exist in %s', $property, get_class($this->item))
            );
        }
        return $this->item->$property;
    }

    public static function of($name, $quality, $sellIn) {
        return new self($name, $quality, $sellIn);
    }

    public function tick() {
        $updater = new Updater();

        switch ($this->item->name) {
            case 'Aged Brie':
                $updater->agedBrie($this->item);
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                $updater->backstagePasses($this->item);
                break;
            case 'Sulfuras, Hand of Ragnaros':
                $updater->sulfuras($this->item);
                break;
            case 'Conjured Mana Cake':
                $updater->updateConjured($this->item);
                break;
            default:
                $updater->updateNormal($this->item);
        }
    }
}