<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class Sale extends DataLayer{
    public function __construct(){
        parent::__construct("sale", ["clientId"], "_id", false);
    }

    public function products(){
        return (new SaleProduct())->find("saleId = :sid", "sid={$this->_id}")->fetch(true);
    }

    public function add_product(){
        $prod = new SaleProduct();


    }
}