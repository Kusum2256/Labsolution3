<?php

class Student {
    // Public properties
    public $name;
    public $surname;
    public $country;

    // Private property
    private $tuition = 5000;

    // Protected property
    protected $indexNumber = "123456";

    // Public getter for name
    public function getName() {
        return $this->name;
    }

    // Public getter for surname
    public function getSurname() {
        return $this->surname;
    }

    // Public method helloWorld
    public function helloWorld() {
        return "Hello World<br>";
    }

    // Protected method helloFamily
    protected function helloFamily() {
        return "Hello Family<br>";
    }

    // Private method helloMe
    private function helloMe() {
        return "Hello me!<br>";
    }

    // Private getter for tuition
    private function getTuition() {
        return "Tuition: $" . $this->tuition . "<br>";
    }

    // Public method to display tuition using the private getter
    public function displayTuition() {
        return $this->getTuition();
    }
}

// Subclass PartTimeStudent extending Student
class PartTimeStudent extends Student {
    // Public method helloParent that calls the protected helloFamily method
    public function helloParent() {
        return $this->helloFamily();
    }
}

// Creating objects
$student = new Student();
$student->name = "Kusum";
$student->surname = "Pokharel";
$student->country = "Nepal";

echo "Student Name: " . $student->getName() . "<br>";
echo "Student Surname: " . $student->getSurname() . "<br>";
echo "Student Country: " . $student->country . "<br>";
echo $student->helloWorld();
echo $student->displayTuition();
echo "<br>";

$partTimeStudent = new PartTimeStudent();
$partTimeStudent->name = "Aaradhya";
$partTimeStudent->surname = "Singh";
$partTimeStudent->country = "India";

echo "Part-Time Student Name: " . $partTimeStudent->getName() . "<br>";
echo "Part-Time Student Surname: " . $partTimeStudent->getSurname() . "<br>";
echo "Part-Time Student Country: " . $partTimeStudent->country . "<br>";
echo $partTimeStudent->helloWorld();
echo $partTimeStudent->helloParent();
?>
