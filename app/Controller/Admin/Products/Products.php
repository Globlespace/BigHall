<?php


namespace app\Controller\Admin\Products;

use app\Controller\controller;

use app\Model\Model;
use app\Model\Products\Product;
use framework\Request\Request;

class Products extends controller
{
    function ProductsView(){

        $this->view(Products."Products");
    }
    function ProductsGet(Request $request)
    {
        $ProModel=new Product();
        $ProModel->GetProducts($request->values["from"]);
    }
    function ProductInsert(Request $request){

        $ProModel=new Product();
        $this->fillData($request,$ProModel);
        $ProModel->InsertProduct();
        $ProModel->Json();
    }
    function ProductGetById(Request $request){
        $ProModel=new Product();
        $ProModel->get($request->id);
        if ($ProModel->next()){
            $ProModel->Data=array(
                "Id"=>$ProModel->id,
                "Product"=>$ProModel->Name,
                "Uri"=>$ProModel->URI,
                "Description"=>$ProModel->Description,
                "Details"=>$ProModel->Details,
                "Catid"=>$ProModel->Catid,
                "Tags"=>$ProModel->Tags
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
    function ProductUpdate(Request $request){
        $ProModel=new Product();
        $this->fillData($request,$ProModel);
        $ProModel->update("id=".$request->id);
        $ProModel->Success=true;
        $ProModel->Message="Product Updated Successfully";
        $ProModel->Json();
    }
    function ProductDelete(Request $request){
        $ProModel=new Product();
        $ProModel->id=$request->id;
        $ProModel->delete();
        $ProModel->Success=true;
        $ProModel->Message="Product Deleted Successfully";
        $ProModel->Json();
    }
    function fillData(Request &$From, Model &$To)
    {
        parent::fillData($From, $To);
        $To->Name=$From->values["Product"];
        $To->URI=$From->values["Uri"];
    }
}