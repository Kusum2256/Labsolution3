<?php

// Base class User
class User {
    // Protected properties
    protected $name;
    protected $surname;
    protected $username;
    protected $is_admin = false;

    // Constructor
    public function __construct($name, $surname, $username) {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
    }

    // Method to check if the user is an admin
    public function isAdmin() {
        return $this->is_admin;
    }

    // Method to print the user's full name
    public function getFullName() {
        $fullName = "{$this->name} {$this->surname}";
        if ($this->is_admin) {
            $fullName .= " (admin)";
        }
        return $fullName;
    }
}

// Customer class extending User
class Customer extends User {
    // Private properties
    private $city;
    private $state;
    private $country;

    // Constructor
    public function __construct($name, $surname, $username) {
        parent::__construct($name, $surname, $username);
    }

    // Setter methods
    public function setCity($city) {
        $this->city = $city;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    // Getter methods
    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getCountry() {
        return $this->country;
    }

    // Method to get location
    public function location() {
        return "{$this->city}, {$this->state}, {$this->country}";
    }
}

// AdminUser class extending User
class AdminUser extends User {
    // Constructor
    public function __construct($name, $surname, $username) {
        parent::__construct($name, $surname, $username);
        $this->is_admin = true; // Set admin status to true
    }
}

// Creating objects

// Create a User object
$user = new User("Gaurab", "Dhimal", "gaurab123");
echo "User Full Name: " . $user->getFullName() . "<br>";
echo "Is Admin: " . ($user->isAdmin() ? "Yes" : "No") . "<br><br>";

// Create a Customer object
$customer = new Customer("Kusum", "Thapa", "kusum456");
$customer->setCity("Kathmandu");
$customer->setState("Pokhara");
$customer->setCountry("Nepal");
echo "Customer Full Name: " . $customer->getFullName() . "<br>";
echo "Is Admin: " . ($customer->isAdmin() ? "Yes" : "No") . "<br>";
echo "Customer Location: " . $customer->location() . "<br><br>";

// Create an AdminUser object
$adminUser = new AdminUser("Aarati", "Dawadi", "adminalice");
echo "Admin User Full Name: " . $adminUser->getFullName() . "<br>";
echo "Is Admin: " . ($adminUser->isAdmin() ? "Yes" : "No") . "<br>";
?>
