<?php
namespace app\Model\Cart;


use app\Model\Model;

class Cart extends Model
{
    public function __construct()
    {
        $this->table="cart";
        parent::__construct();
    }
}