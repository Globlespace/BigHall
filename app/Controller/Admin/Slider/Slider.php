<?php
namespace app\Controller\Admin\Slider;

use app\Controller\controller;
use framework\Helper\FileUploader;
use framework\Request\Request;

class Slider extends controller
{
    function SliderView(){
        $this->view(Slider."Slider");
    }
    function SliderGet(Request $request){
        $ProModel=new \app\Model\Slider\Slider();
        $ProModel->GetSlider($request->values["from"]);
    }
    function SliderGetById(Request $request){
        $ProModel=new \app\Model\Slider\Slider();
        $ProModel->get("Id",$request->id);
        if ($ProModel->next()){
            $ProModel->Data=array(
                "id"=>$ProModel->Id,
                "Name"=>$ProModel->Name,
                "Image"=>$ProModel->Image,
                "ProId"=>$ProModel->ProId
            );
            $ProModel->Message="Slider Found";

            $ProModel->Success=true;
            $ProModel->Code=200;
        }else{
            $ProModel->Success=false;
            $ProModel->Message="No Slider Found";
            $ProModel->Code=404;
        }

        $ProModel->Json();
    }
    function SliderInsert(Request $request){

        $ProModel=new \app\Model\Slider\Slider();
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
    function SliderUpdate(Request $request){

        // make two objects of image Model
        $ProModel=new \app\Model\Slider\Slider();
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
    function SliderDelete(Request $request){
        // make two objects of image Model
        $ProModel=new \app\Model\Slider\Slider();
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