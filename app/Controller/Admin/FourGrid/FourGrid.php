<?php
namespace app\Controller\Admin\FourGrid;

use app\Controller\controller;
use framework\Request\Request;

class FourGrid extends controller
{
    function FourGridView(){
        $this->view(FourGrid."FourGrid");
    }
    function FourGridGet(Request $request){
        $FourGrid=new \app\Model\Fourgrid\FourGrid();
        $FourGrid->GetFourGrid($request->values["from"]);

    }
    function FourGridGetById(Request $request){
        $ProModel=new \app\Model\FourGrid\FourGrid();
        $ProModel->get($request->id);
        if ($ProModel->next()){
            $ProModel->Data=array(
                "Id"=>$ProModel->id,
                "Name"=>$ProModel->Name,
                "Pro_id_1"=>$ProModel->Pro_id_1,
                "Pro_id_2"=>$ProModel->Pro_id_2,
                "Pro_id_3"=>$ProModel->Pro_id_3,
                "Pro_id_4"=>$ProModel->Pro_id_4,
                "Description"=>$ProModel->Description,
                "Catid"=>$ProModel->Catid,
            );
            $ProModel->Message="Product Found";

            $ProModel->Success=true;
            $ProModel->Code=200;
        }else{
            $ProModel->Success=false;
            $ProModel->Message="No Product Found";
            $ProModel->Code=404;
        }

        $ProModel->Json();
    }
    function FourGridInsert(Request $request){

        $ProModel=new \app\Model\FourGrid\FourGrid();
        $this->fillData($request,$ProModel);
        $ProModel->InsertFourGrid();
        $ProModel->Json();
    }
    function FourGridUpdate(Request $request){
        $ProModel=new \app\Model\FourGrid\FourGrid();
        $this->fillData($request,$ProModel);
        $ProModel->update("Id=".$request->id);
        if($ProModel->mysql_error_no==1062){
            $ProModel->Success=false;
            $ProModel->Message="FourGrid Already Exist";
        }else{
            $ProModel->Success=true;
            $ProModel->Message="FourGrid Updated Successfully";
        }
        $ProModel->Json();
    }
    function FourGridDelete(Request $request){
        $ProModel=new \app\Model\FourGrid\FourGrid();
        $ProModel->Id=$request->id;
        $ProModel->delete();
        $ProModel->Success=true;
        $ProModel->Message="FourGrid Deleted Successfully";
        $ProModel->Json();
    }

}