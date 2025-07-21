<?php
namespace food;

class Ingredient {
    public $name;
    public $cost;

    public function __construct($name, $cost) {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function changeCost($newCost) {
        $this->cost = $newCost;
    }
}
?>
