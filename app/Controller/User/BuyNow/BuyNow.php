<?php

namespace  app\Controller\User\BuyNow;

use app\Controller\controller;

class BuyNow extends controller
{
    public function BuyNowPage(){
        $this->setLayout="UserMain.php";
        $this->view(BuyNow."BuyNow");
    }
}