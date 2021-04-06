<?php 
class Car{
    private $price;
    private $speed;
    private $fuel;
    private $mileage;
    private $tax;

    public function __construct($price,$speed,$fuel,$mileage)
    {
        $this->price = $price;
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->mileage = $mileage;
        $this->tax = $this->returnTax();
        $this->Display_all();
    }

    private function returnTax(){
        if($this->price > 10000){
            return 0.15;
        }else{
            return 0.12;
        }
    }

    public function Display_all(){
        echo "Price: ". $this->price . "<br>";
        echo "Speed: ". $this->speed . "mph<br>";
        echo "Fuel: ". $this->fuel . "<br>";
        echo "Mileage: ". $this->mileage . "mpg<br>";
        echo "Tax: ". $this->tax . "<br>";
    }
}

$CarOne = new Car(2000,35,"Full",15);
echo "<br><br>";

$CarTwo = new Car(2000,5,"Not Full",105);
echo "<br><br>";

$CarThree = new Car(2000,15,"Kind of Full",95);
echo "<br><br>";

$CarFour = new Car(2000,25,"Full",25);
echo "<br><br>";

$CarFive = new Car(2000,45,"Empty",25);
echo "<br><br>";

$CarSix = new Car(20000000,35,"Empty",15);
echo "<br><br>";

?>