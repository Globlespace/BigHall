<?php

namespace app\Controller\User\Category;
class Category extends \app\Controller\controller
{
    function index(){
        $this-> setLayout="UserMain.php";
        $this-> view(Category."Category");
    }
}