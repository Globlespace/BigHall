<?php

namespace app\Controller\User\Category;
use framework\Request\Request;

class Category extends \app\Controller\controller
{
    function index(Request $request){
        $this-> setLayout="UserMain.php";
        $this-> view(Category."Category",$request->values);
    }
    function Categories(Request $request){
        $this-> setLayout="UserMain.php";
        $this-> view(Category."Categories",$request->values);
    }
}