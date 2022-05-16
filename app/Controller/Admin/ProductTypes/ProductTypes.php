<?php

namespace app\Controller\Admin\ProductTypes;

use app\Controller\controller;
use app\Model\Model;
use app\Model\ProductType\product_type;
use framework\Request\Request;

class ProductTypes extends controller
{
    function ProductTypesView(){

        $this->view(ProductTypes."ProductTypes");
    }
    function ProductTypesGet(Request $request){
        $ProModel=new product_type();
        $ProModel->GetProductsTypes($request->values["from"]);

    }
    function ProductTypesGetById(Request $request){
        $ProModel=new product_type();
        $ProModel->get($request->id);
        if ($ProModel->next()){
            $ProModel->Data=array(
                "Id"=>$ProModel->Id,
                "ProductType"=>$ProModel->Name,
                "Price"=>$ProModel->Price,
                "Description"=>$ProModel->Description,
                "Offer"=>$ProModel->Offer,
                "Qty"=>$ProModel->Qty,
                "Pro_id"=>$ProModel->Pro_Id
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
    function ProductTypeInsert(Request $request){

        $ProModel=new product_type();
        $this->fillData($request,$ProModel);
        $ProModel->InsertProductType();
        $ProModel->Json();
    }
    function ProductTypeUpdate(Request $request){

        $ProModel=new product_type();
        $this->fillData($request,$ProModel);
        $ProModel->update("id=".$request->id);
        if($ProModel->mysql_error_no==1062){
            $ProModel->Success = false;
            $ProModel->Message = "ProductType Already Exist";
        }else {
            $ProModel->Success = true;
            $ProModel->Message = "ProductType Updated Successfully";
        }
        $ProModel->Json();
    }
    function ProductTypeDelete(Request $request){
        $ProModel=new product_type();
        $ProModel->Id=$request->id;
        $ProModel->delete();
        $ProModel->Success=true;
        $ProModel->Message="Product Deleted Successfully";
        $ProModel->Json();
    }
    function fillData(Request &$From, Model &$To)
    {
        parent::fillData($From, $To);
        $To->Id=$From->values["id"];
        $To->Name=$From->values["ProductType"];
        $To->Pro_Id=$From->values["Pro_id"];
    }
}