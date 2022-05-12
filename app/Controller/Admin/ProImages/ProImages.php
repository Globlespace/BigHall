<?php

namespace app\Controller\Admin\ProImages;

use app\Controller\controller;
use app\Model\Images\Image;
use framework\Helper\FileUploader;
use framework\Request\Request;

class ProImages extends controller
{
    function ProImageView(){

        $this->view(ProImages."ProImages");
    }
    function ProImagesGet(Request $request){
        $ProModel=new Image();

        $ProModel->GetProImage($request->values["from"]);

    }
    function ProImagesGetById(Request $request){
        $ProModel=new Image();
        $ProModel->get("Id",$request->id);
        if ($ProModel->next()){
            $ProModel->Data=array(
                "id"=>$ProModel->Id,
                "Image"=>$ProModel->Image,
                "ProductType_id"=>$ProModel->ProType_id
            );
            $ProModel->Message="Product Type Found";

            $ProModel->Success=true;
            $ProModel->Code=200;
        }else{
            $ProModel->Success=false;
            $ProModel->Message="No Product Found";
            $ProModel->Code=404;
        }

        $ProModel->Json();
    }
    function ProImagesInsert(Request $request){

        $ProModel=new Image();
        $Path=$this->ProImageUpload();
        $ProModel->Image=$Path;
        $ProModel->ProType_id=$request->values["ProductType_id"];
        $ProModel->InsertProImage();
        $ProModel->Json();
    }
    private function ProImageUpload(){
        if(FileUploader::upload("Image","image")){
            return FileUploader::$returnedPath;
        }else{
            return false;
        }
    }
    function ProImagesUpdate(Request $request){

        // make two objects of image Model
        $ProModel=new Image();
        $slf=clone $ProModel;

        // Get Image path
        $slf->get("Id",$request->id);
        $slf->next();

        //  Upload New Image
        $Path=$this->ProImageUpload();

        //Update Database
        $ProModel->Image=$Path;
        $ProModel->ProType_id=$request->values["ProductType_id"];
        $ProModel->update("id=".$request->id);

        // Delete Old Image from Server
        $this->deleteimage($slf->Image);

        // Make Response
        $ProModel->Success=true;
        $ProModel->Message="Image Updated Successfully";
        $ProModel->Json();
    }
    function ProImagesDelete(Request $request){
        // make two objects of image Model
        $ProModel=new Image();
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
        $ProModel->Message="Product Deleted Successfully";
        $ProModel->Json();
    }
    function deleteimage($path){
        $FullPath=UPLOAD_IMG_DIR.$path;
        return unlink($FullPath);
    }

}