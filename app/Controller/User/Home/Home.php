<?php
namespace app\Controller\User\Home;
use app\Controller\controller;
use app\Model\Fourgrid\FourGrid;
use app\Model\ThreeGrid\ThreeGrid;
use framework\Request\Request;

class Home extends controller

{
    function index(){
        $this->setLayout="UserMain.php";
        $this->view(Home."home");
    }
    function ThreeGrid(Request $request){
        $from=$request->from;
        $ThreeGrid=new ThreeGrid();
        $ThreeGrid->ThreeGrid($from,4);

    }
    function FourGrid(Request $request){
        $from=$request->from;
        $FourGrid=new FourGrid();
        $FourGrid->FourGrid($from,4);
    }
}