<?php
class Animal{

    protected $health;

    public function __construct($name)
    {
        $this->health = 100;
        $this->name = $name;
    }

    public function walk(){
        $this->health -= 1;
        return $this;
    }

    public function run(){
        $this->health -= 5;
        return $this;
    }

    public function displayHealth(){
        echo "Name: ".$this->name."<br>";
        echo "Health: ".$this->health."<br>";
    }
}


class Dog extends Animal{

    public function __construct($name)
    {
        parent::__construct($name);
        $this->health = 150;
        
    }

    public function pet(){
        $this->health += 5;
        return $this;
    }
}

class Dragon extends Animal{

    public function __construct($name)
    {
        parent::__construct($name);
        $this->health = 170;
        
    }

    public function fly(){
        $this->health -= 10;
        return $this;
    }

    public function displayHealth(){
        echo "This is a dragon!<br>";
        parent::displayHealth();
    }
}

$animal = new Animal('animal');
$animal->walk()->walk()->walk()->run()->run()->displayHealth();

echo "<br><br>";

$dog = new Dog('dog');
$dog->walk()->walk()->walk()->run()->run()->pet()->displayHealth();

echo "<br><br>";

$dragon = new Dragon('dragon');
$dragon->walk()->walk()->walk()->run()->run()->fly()->fly()->displayHealth();

// $animal->pet();
