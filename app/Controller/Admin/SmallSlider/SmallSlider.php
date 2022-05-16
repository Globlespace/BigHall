<?php
namespace app\Controller\Admin\SmallSlider;

use app\Controller\controller;
use framework\Helper\FileUploader;
use framework\Request\Request;

class SmallSlider extends controller
{
    function SmallSliderView(){
        $this->view(SmallSlider."SmallSlider");
    }
    function SmallSliderGet(Request $request){
        $ProModel=new \app\Model\SmallSlider\SmallSlider();
        $ProModel->GetSlider($request->values["from"]);
    }
    function SmallSliderGetById(Request $request){
        $ProModel=new \app\Model\SmallSlider\SmallSlider();
        $ProModel->get("Id",$request->id);
        if ($ProModel->next()){
            $ProModel->Data=array(
                "id"=>$ProModel->Id,
                "Name"=>$ProModel->Name,
                "Image"=>$ProModel->Image,
                "ProId"=>$ProModel->ProId
            );
            $ProModel->Message="SmallSlider Found";

            $ProModel->Success=true;
            $ProModel->Code=200;
        }else{
            $ProModel->Success=false;
            $ProModel->Message="No SmallSlider Found";
            $ProModel->Code=404;
        }

        $ProModel->Json();
    }
    function SmallSliderInsert(Request $request){

        $ProModel=new \app\Model\SmallSlider\SmallSlider();
        $Path=$this->ProImageUpload();
        $ProModel->Image=$Path;
        $ProModel->Name=$request->values["Name"];
        $ProModel->ProId=$request->values["ProId"];
        $ProModel->InsertSlider();
        $ProModel->Json();
    }
    private function ProImageUpload(){
        if(FileUploader::upload("Image","image")){
            return FileUploader::$returnedPath;
        }else{
            return false;
        }
    }
    function SmallSliderUpdate(Request $request){

        // make two objects of image Model
        $ProModel=new \app\Model\SmallSlider\SmallSlider();
        $slf=clone $ProModel;

        // Get Image path
        $slf->get("Id",$request->id);
        $slf->next();

        //  Upload New Image
        $Path=$this->ProImageUpload();

        //Update Database
        $ProModel->Image=$Path;
        $ProModel->Name=$request->values["Name"];
        $ProModel->ProId=$request->values["ProId"];
        $ProModel->update("id=".$request->id);

        // Delete Old Image from Server
        $this->deleteimage($slf->Image);

        // Make Response
        $ProModel->Success=true;
        $ProModel->Message="Slider Updated Successfully";
        $ProModel->Json();
    }
    function SmallSliderDelete(Request $request){
        // make two objects of image Model
        $ProModel=new \app\Model\SmallSlider\SmallSlider();
        $slf=clone $ProModel;

        // Get Image path
        $slf->get("Id",$request->id);
        $slf->next();

        // Delete from Database
        $ProModel->Id=$request->id;
        $ProModel->delete();

        // Delete Image from Server
        $this->deleteimage($slf->Image);

        // Make Response
        $ProModel->Success=true;
        $ProModel->Message="Slider Deleted Successfully";
        $ProModel->Json();
    }
    function deleteimage($path){
        $FullPath=UPLOAD_IMG_DIR.$path;
        return unlink($FullPath);
    }
}