<?php

namespace App;

class Item {
    public $name;
    public $sellIn;
    public $quality;

    public function __construct($name, $sellIn, $quality) {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }
}