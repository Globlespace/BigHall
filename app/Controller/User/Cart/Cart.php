<?php
/**
 * Created by PhpStorm.
 * User: syedhuzaif
 * Date: 4/9/2022
 * Time: 5:13 PM
 */
namespace app\Controller\User\Cart;
use app\Controller\controller;

class Cart extends controller
{
    function cartindex(){
        $this->setLayout="UserMain.php";
        $this-> view(Cart."Cart");
    }
}