<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class SaleProduct extends DataLayer{
    public function __construct(){
        parent::__construct("sale_product", ["saleId", "productId", "price", "amount"], "_id", false);
    }

    public function add(Sale $sale, Product $prod, float $price, int $amount): SaleProduct{
        $this->saleId = $sale->_id;
        $this->productId = $prod->_id;
        $this->price = $price;
        $this->amount = $amount;

        return $this;
    }
}