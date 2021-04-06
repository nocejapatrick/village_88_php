<?php 
class Bike{
  
  private $price;
  private $max_speed;
  private $miles;

  public function __construct($price,$max_speed,$miles = 0) 
  {
    $this->price = $price;
    $this->max_speed = $max_speed;
    $this->miles = $miles;
  }

  public function displayInfo(){
      echo "Price: ". $this->price. "<br>";
      echo "Maximum Speed: ". $this->max_speed. "<br>";
      echo "Total Miles Driven: ". $this->miles. "<br>";
  }

  public function drive(){
      echo "Driving<br>";
      $this->miles += 10;
      return $this;
  }

  public function reverse(){
      echo "Reversing<br>";
      $this->miles -= 5;
      
      if($this->miles <= 0){
        $this->miles = 0;
      }

      return $this;
      
  }

}


$BikeOne = new Bike(100,200);
$BikeOne->drive()->drive()->drive()->reverse()->displayInfo();

echo "<br><br>";
$BikeTwo = new Bike(145,400);
$BikeTwo->drive()->drive()->reverse()->reverse()->displayInfo();

echo "<br><br>";
$BikeThree = new Bike(145,400);
$BikeThree->reverse()->reverse()->reverse()->displayInfo();
?>