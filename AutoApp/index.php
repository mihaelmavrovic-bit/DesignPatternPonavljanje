<?php

require_once "autoload.php";



use AutoApp\Factory\CarFactory;
use AutoApp\Observers\ProductionNotifier;
 use AutoApp\Observers\ObserverInterface;


// ===== Factory =====
$factory = new CarFactory();

// =====dodati observere======

$factory = attachObserver(new ProductionNotifier("Marko"));
$factory = attachObserver(new ProductionNotifier("Ivan"));


// ====proizvodnja====
$factory->createCar("Audi A4",2022,"Dizel");
$factory->createCar("Tesla Model 3",2023,"Električni");
$factory->createCar("VW Gold",2021,"Benzin");

echo "<hr>";
echo "<h3>Popis svih automobila</h3>";

$cars = $factory->getcars();
foreach( $cars as $car ) {
    echo $car->info(). "<br>";


}

echo "<hr>";
echo "<br>Ukupno proizvedeno auta: " .$cars->count();


echo "<h3>Ručno iteriranje bez foreach-a</h3>";

$cars->rewind();

while( $cars->valid() ) {
    $auto = $cars->current();
    echo $auto->info(). "<br>";
    $cars->next();

}

$firstCar = $cars->current();
echo "<br>PRvi proizvedeni auto: " .$firstCar->info();

$last = $cars->last();
echo "<br>Zadnji proizvedeni: ".$last->info(); 


?>