<?php

session_start();
require_once('connect.php');


class Formule{
    public $id;
    public $name;
    public $code;
    public $tarif;
    public $productId;

    public function __construct() 
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->tarif = $tarif;
        $this->productId = $productId;
    }

    public function getTarif() 
    {
        return $this->tarif."€";
    }

    public function setTarif() 
    {
        $this->tarif++;
    }

    public function discount($discount) 
    {
        $this->tarif -= $this->tarif *($discount / 100) ;
    }   
}





