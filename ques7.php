<?php

// Define the Shape interface
interface Shape {
    public function calculateArea();
}

// Circle class implementing Shape
class Circle implements Shape {
    private $radius;

    // Constructor to set radius
    public function __construct($radius) {
        $this->radius = $radius;
    }

    // Method to calculate area of the circle
    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}

// Square class implementing Shape
class Square implements Shape {
    private $side;

    // Constructor to set side length
    public function __construct($side) {
        $this->side = $side;
    }

    // Method to calculate area of the square
    public function calculateArea() {
        return pow($this->side, 2);
    }
}

// Create objects and calculate their areas

// Circle object
$circle = new Circle(5); // Radius = 5
echo "Circle Area (radius 5): " . $circle->calculateArea() . "<br>";

// Square object
$square = new Square(4); // Side = 4
echo "Square Area (side 4): " . $square->calculateArea() . "<br>";

?>
