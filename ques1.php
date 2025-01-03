<?php

// Interface Vehicle with startEngine() and stopEngine() methods
interface Vehicle {
    public function startEngine();
    public function stopEngine();
}

// Base Car class implementing Vehicle interface
class Car implements Vehicle {
    // Private properties
    private $make;
    private $model;
    private $year;

    // Constructor
    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Getter and setter for $make
    public function getMake() {
        return $this->make;
    }
    public function setMake($make) {
        $this->make = $make;
    }

    // Getter and setter for $model
    public function getModel() {
        return $this->model;
    }
    public function setModel($model) {
        $this->model = $model;
    }

    // Getter and setter for $year
    public function getYear() {
        return $this->year;
    }
    public function setYear($year) {
        $this->year = $year;
    }

    // start() method
    public function start() {
        echo "Car started.<br>";
    }

    // displayInfo() method
    public function displayInfo() {
        echo "Car Info: Make - {$this->make}, Model - {$this->model}, Year - {$this->year}<br>";
    }

    // Implement startEngine() method
    public function startEngine() {
        echo "Engine started.<br>";
    }

    // Implement stopEngine() method
    public function stopEngine() {
        echo "Engine stopped.<br>";
    }

    // getDescription() method
    public function getDescription() {
        return "This is a {$this->year} {$this->make} {$this->model}.";
    }
}

// ElectricCar class extending Car
class ElectricCar extends Car {
    // New property $batteryCapacity
    private $batteryCapacity;

    // Constructor
    public function __construct($make, $model, $year, $batteryCapacity) {
        parent::__construct($make, $model, $year);
        $this->batteryCapacity = $batteryCapacity;
    }

    // Getter and setter for $batteryCapacity
    public function getBatteryCapacity() {
        return $this->batteryCapacity;
    }
    public function setBatteryCapacity($batteryCapacity) {
        $this->batteryCapacity = $batteryCapacity;
    }

    // charge() method
    public function charge() {
        echo "Electric car is charging.<br>";
    }

    // Override getDescription() method
    public function getDescription() {
        return parent::getDescription() . " It has a battery capacity of {$this->batteryCapacity} kWh.";
    }
}

// Test the implementation
$car = new Car("Toyota", "Corolla", 2020);
$car->start();
$car->displayInfo();
echo $car->getDescription() . "<br>";
$car->startEngine();
$car->stopEngine();

echo "<br>";

$electricCar = new ElectricCar("Tesla", "Model S", 2023, 100);
$electricCar->start();
$electricCar->displayInfo();
echo $electricCar->getDescription() . "<br>";
$electricCar->charge();
$electricCar->startEngine();
$electricCar->stopEngine();
?>
