<?php
/**
 * Created by PhpStorm.
 * User: syedhuzaif
 * Date: 4/3/2022
 * Time: 6:01 PM
 */
namespace app\Controller\User\Category;
class Category extends \app\Controller\controller
{
    function index(){
        $this-> setLayout="UserMain.php";
        $this-> view(Category."Category");
    }
}