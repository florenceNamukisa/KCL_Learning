<?php
class Entree {
    public $name;
    public $ingredients = [];

    public function __construct($name, $ingredients) {
        $this->name = $name;
        $this->ingredients = $ingredients;
    }
}
?>
