<?php

// Define the HasInfo interface
interface HasInfo {
    public function getInfo();
}

// Address class implementing HasInfo
class Address implements HasInfo {
    public $street;
    public $number;
    public $city;

    public function __construct($street, $number, $city) {
        $this->street = $street;
        $this->number = $number;
        $this->city = $city;
    }

    public function getInfo() {
        return "Address: street {$this->street}, number {$this->number}, city {$this->city}";
    }
}

// Phone class implementing HasInfo
class Phone implements HasInfo {
    public $prefix;
    public $number;

    public function __construct($prefix, $number) {
        $this->prefix = $prefix;
        $this->number = $number;
    }

    public function getInfo() {
        return "Number: {$this->prefix} / {$this->number}";
    }
}

// User class implementing HasInfo
class User implements HasInfo {
    public $name;
    public $surname;
    private $address;
    private $phone;

    public function __construct($name, $surname, Address $address, Phone $phone) {
        $this->name = $name;
        $this->surname = $surname;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function getInfo() {
        $addressInfo = $this->address->getInfo();
        $phoneInfo = $this->phone->getInfo();
        return "User: {$this->name} {$this->surname}<br>{$addressInfo}<br>{$phoneInfo}";
    }
}

// Create objects
$address = new Address("kathmandu", 123, "Nepal");
$phone = new Phone("+1", "9845345667");
$user = new User("Samir", "Shrestha", $address, $phone);

// Call getInfo from User object
echo $user->getInfo();
?>
