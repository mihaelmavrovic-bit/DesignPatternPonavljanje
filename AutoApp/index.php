<?php

require_once "autoload.php";

use AutoApp\Factory\CarFactory;
use AutoApp\Observers\ProductionNotifier;

// ===== Factory =====
$factory = new CarFactory();

// =====dodati observere======

$factory->attachObserver(new ProductionNotifier("Marko"));
$factory->attachObserver(new ProductionNotifier("Ivana"));


// ====proizvodnja====
$factory->createCar("Audi A4",2022,"Dizel");
$factory->createCar("Tesla Model 3",2023,"Električni");
$factory->createCar("VW Golf",2021,"Benzin");


// ============ITERATOR==========

echo "<hr>";
echo "<h3>Popis svih proizvedenih automobila</h3>";

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

$cars->rewind(); 

$firstCar = $cars->current();
echo "<br>Prvi proizvedeni auto: " .$firstCar->info();

$last = $cars->last();
echo "<br>Zadnji proizvedeni: ".$last->info();  


?>