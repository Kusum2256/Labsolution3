<?php

class Bicycle {
    // Public properties
    public $brand;
    public $model;
    public $year;
    public $description;
    public $weight; // Stored in grams

    // Constructor to initialize properties
    public function __construct($brand, $model, $year, $weight, $description = "Used bicycle") {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->weight = $weight;
        $this->description = $description;
    }

    // Getter method for bike information
    public function getInfo() {
        return "{$this->brand} {$this->model} ({$this->year})";
    }

    // Getter method for weight
    public function getWeight($inKilograms = false) {
        if ($inKilograms) {
            return $this->weight / 1000 . " kg";
        }
        return $this->weight . " g";
    }

    // Setter method for weight
    public function setWeight($weightInGrams) {
        $this->weight = $weightInGrams;
    }
}

// Create two Bicycle objects
$bike1 = new Bicycle("Giant", "Escape 3", 2021, 12000);
$bike2 = new Bicycle("Trek", "FX 2", 2022, 11000, "New bicycle");

// Print information and weights for each bike
echo $bike1->getInfo() . "<br>";
echo "Description: " . $bike1->description . "<br>";
echo "Weight in kilograms: " . $bike1->getWeight(true) . "<br>";
echo "Weight in grams: " . $bike1->getWeight() . "<br><br>";

echo $bike2->getInfo() . "<br>";
echo "Description: " . $bike2->description . "<br>";
echo "Weight in kilograms: " . $bike2->getWeight(true) . "<br>";
echo "Weight in grams: " . $bike2->getWeight() . "<br>";
?>
