<?php

namespace app\Controller\User\Products;
use app\Controller\controller;

use framework\Request\Request;
class products extends controller
{
    function product(Request $request){
        $this->setLayout="UserMain.php";
        $this->view(Product."product", $request->values);
    }
}