<?php

namespace AutoApp\Observers;

class ProductionNotifier implements ObserverInterface{

    public function __construct(private string $korisnik){}


    public function update (string $message): void{
        echo "<br>Obavijest za {$this->korisnik}: {$message}.";
    }





}



?>