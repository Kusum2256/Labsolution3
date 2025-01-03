<?php

class Product {
    // Properties
    private $description;
    private $quantity;
    private $price;

    // Constructor
    public function __construct($description, $quantity, $price) {
        if (!is_string($description)) {
            echo "Error: Description must be a string.<br>";
        } else {
            $this->description = $description;
        }

        if (!is_numeric($quantity) || $quantity < 0) {
            echo "Error: Quantity must be a non-negative number.<br>";
        } else {
            $this->quantity = $quantity;
        }

        if (!is_numeric($price) || $price < 0) {
            echo "Error: Price must be a non-negative number.<br>";
        } else {
            $this->price = $price;
        }
    }

    // Setter and getter for description
    public function setDescription($description) {
        if (is_string($description)) {
            $this->description = $description;
        } else {
            echo "Error: Description must be a string.<br>";
        }
    }

    public function getDescription() {
        return $this->description;
    }

    // Setter and getter for quantity
    public function setQuantity($quantity) {
        if (is_numeric($quantity) && $quantity >= 0) {
            $this->quantity = $quantity;
        } else {
            echo "Error: Quantity must be a non-negative number.<br>";
        }
    }

    public function getQuantity() {
        return $this->quantity;
    }

    // Setter and getter for price
    public function setPrice($price) {
        if (is_numeric($price) && $price >= 0) {
            $this->price = $price;
        } else {
            echo "Error: Price must be a non-negative number.<br>";
        }
    }

    public function getPrice() {
        return $this->price;
    }

    // Method to calculate total price
    public function calculatePrice() {
        return $this->quantity * $this->price;
    }
}

// Create an object from the Product class
$product = new Product("Laptop", 3, 599.99);

// Print all properties
echo "Description: " . $product->getDescription() . "<br>";
echo "Quantity: " . $product->getQuantity() . "<br>";
echo "Price per unit: $" . $product->getPrice() . "<br>";

// Print calculated total price
echo "Total Price: $" . $product->calculatePrice() . "<br>";
?>
