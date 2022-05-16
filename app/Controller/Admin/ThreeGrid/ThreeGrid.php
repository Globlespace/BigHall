<?php
namespace app\Controller\Admin\ThreeGrid;

use app\Controller\controller;
use framework\Request\Request;

class ThreeGrid extends controller
{
    function ThreeGridView(){
        $this->view(ThreeGrid."ThreeGrid");
    }
    function ThreeGridGet(Request $request){
        $threegrid=new \app\Model\ThreeGrid\ThreeGrid();
        $threegrid->GetThreeGrid($request->values["from"]);
    }
    function ThreeGridGetById(Request $request){
        $ProModel=new \app\Model\ThreeGrid\ThreeGrid();
        $ProModel->get($request->id);
        if ($ProModel->next()){
            $ProModel->Data=array(
                "Id"=>$ProModel->id,
                "Name"=>$ProModel->Name,
                "Pro_id_1"=>$ProModel->Pro_id_1,
                "Pro_id_2"=>$ProModel->Pro_id_2,
                "Pro_id_3"=>$ProModel->Pro_id_3,
                "Description"=>$ProModel->Description,
                "Catid"=>$ProModel->Catid,
            );
            $ProModel->Message="ThreeGrid Found";

            $ProModel->Success=true;
            $ProModel->Code=200;
        }else{
            $ProModel->Success=false;
            $ProModel->Message="No ThreeGrid Found";
            $ProModel->Code=404;
        }

        $ProModel->Json();
    }
    function ThreeGridInsert(Request $request){

        $ProModel=new \app\Model\ThreeGrid\ThreeGrid();
        $this->fillData($request,$ProModel);
        $ProModel->InsertThreeGrid();
        $ProModel->Json();
    }
    function ThreeGridUpdate(Request $request){
        $ProModel=new \app\Model\ThreeGrid\ThreeGrid();
        $this->fillData($request,$ProModel);
        $ProModel->update("Id=".$request->id);
        if($ProModel->mysql_error_no==1062){
            $ProModel->Success=false;
            $ProModel->Message="ThreeGrid Already Exist";
        }else{
            $ProModel->Success=true;
            $ProModel->Message="ThreeGrid Updated Successfully";
        }
        $ProModel->Json();
    }
    function ThreeGridDelete(Request $request){
        $ProModel=new \app\Model\ThreeGrid\ThreeGrid();
        $ProModel->Id=$request->id;
        $ProModel->delete();
        $ProModel->Success=true;
        $ProModel->Message="ThreeGrid Deleted Successfully";
        $ProModel->Json();
    }
}