<?php
class Car
{
    private $make_model;
    private $price;
    public $miles;

    function setMakeModel($new_model)
    {
      $this->make_model = $new_model;
    }

    function getMakeModel()
    {
      return $this->make_model;
    }

    function setPrice($new_price)
    {
        $this->price = (float) $new_price;
    }

    function getPrice()
    {
        return $this->price;
    }

    function __construct($make_model, $price, $miles)
    {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
    }

    function worthBuying($max_price)
    {
        if ($this->price <= $max_price) {
          return true;
        }

    }//this function compares the price of each car to the user's input (max_price)
    //retun true or false
}

$porsche = new Car("2014 Porshe 911", 110000, 7864);
$subaru = new Car("2002 Subaru Outback", 3800, 128000);
$toyota = new Car("1994 Toyota Tacoma", 5000, 195000);
$ford = new Car("1997 Ford Wrangler", 1000, 300000);

$porsche->setMakeModel("2014 Porsche 911");
$subaru->setMakeModel("2002 Subaru Forester");
$toyota->setMakeModel("1994 Toyota Tacoma");
$ford->setMakeModel("1997 Ford Wrangler");

$porsche->setPrice(110000.07);
$subaru->setPrice(3400.34);
$toyota->setPrice(5000.99);
$ford->setPrice(1001.19);


$cars = array($porsche, $subaru, $toyota, $ford);

$cars_matching_array = array();
foreach ($cars as $car) {
    if ($car->worthBuying($_GET["price"])) {
        array_push($cars_matching_array, $car);
  }
}//for each car in our cars array, we will run the "worthBuying" function on it.
//if the function returns true, then it will push that car into the cars_matching_array.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
  <h1>Here are some delicious vehicles</h1>
  <ul>
    <?php
      foreach ($cars_matching_array as $car) {
          $make_model = $car->getMakeModel();
          $price = $car->getPrice();
          echo "<li>$make_model</li>";
          echo "<ul>";
              echo "<li> $price </li>";
              echo "<li> $car->miles </li>";
          echo "</ul>";
      }
     ?>
  </ul>
</body>
</html>
