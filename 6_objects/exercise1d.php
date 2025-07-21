<?php
class Ingredient {
    public $name;
    public $cost;

    // Constructor to initialize the ingredient
    public function __construct($name, $cost) {
        $this->name = $name;
        $this->cost = $cost;
    }
}
?>
