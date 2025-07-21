<?php
require_once 'Ingredient.php';

use Food\Ingredient;

class Entree {
    public $name;
    public $ingredients = [];

    public function __construct($name, $ingredients) {
        $this->name = $name;
        $this->ingredients = $ingredients;
    }
}

class IngredientEntree extends Entree {
    public function __construct($name, $ingredients) {
        foreach ($ingredients as $ingredient) {
            if (!($ingredient instanceof Ingredient)) {
                throw new \Exception("All items must be Ingredient objects.");
            }
        }
        parent::__construct($name, $ingredients);
    }

    public function totalCost() {
        $total = 0;
        foreach ($this->ingredients as $ingredient) {
            $total += $ingredient->cost;
        }
        return $total;
    }
}
?>
