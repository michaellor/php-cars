<?php
class Car
{
    public $make_model;
    public $price;
    public $miles;

    function worthBuying($max_price)
    {
        return $this->price <= ($max_price + 100);
    }//this function compares the price of each car to the user's input (max_price)
    //retun true or false
}

$porsche = new Car();
$porsche->make_model = "2014 Porshe 911";
$porsche->price = 110000;
$porsche->miles = 7864;

$ford = new Car();//a car object
$ford->make_model = "2011 Ford F450";//properties
$ford->price = 55000;
$ford->miles = 14241;

$lexus = new Car();
$lexus->make_model = "2013 Lexus RX 350";
$lexus->price = 44700;
$lexus->miles = 20000;

$mercedes = new Car();
$mercedes->make_model = "Mercedes Benz CLS550";
$mercedes->price = 39900;
$mercedes->miles = 37979;

$cars = array($porsche, $ford, $lexus, $mercedes);

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
          echo "<li> $car->make_model </li>";
          echo "<ul>";
              echo "<li> $car->price </li>";
              echo "<li> $car->miles </li>";
          echo "</ul>";
      }
     ?>
  </ul>
</body>
</html>
