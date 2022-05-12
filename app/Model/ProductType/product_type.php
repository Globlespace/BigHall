<?php


namespace app\Model\ProductType;


use app\Model\Model;
use app\Model\Products\Product;

class product_type extends Model
{
    function GetProductsTypes($from){
        $query="select * from ".$this->table." ORDER BY id desc limit ".$from.",10;";
        $this->query($query);

        while ($this->next()){
            $ProModel=new Product();
            $ProModel->get("id",$this->Pro_Id);
            $ProModel->next();
            ?>
            <div class="tr">
                <div id="notedittable" name="ptid"><?=$this->Id?></div>
                <div id="name" name="ptname"><?=$this->Name?></div>
                <div id="price" name="ptprice"><?=$this->Price?></div>
                <div id="offer" name="ptprice"><?=$this->Offer?></div>
                <div id="Qty" name="ptqty"><?=$this->Qty?></div>
                <div id="Qty" name="ptqty"><?=$ProModel->Name?></div>
                <div class="relative">
                    <button data-title="Update your changes" onclick="EditData(<?=$this->Id?>)" class="updaterow btn btn-outline-primary">
                        <i class="fa fa-pencil-square-o"></i>
                    </button>
                    <button data-title="Click to Delete" onclick="Delete(<?=$this->Id?>)" class="delete btn btn-outline-danger">
                        <i class="fa fa-trash-o"></i>
                    </button>
                </div>
            </div>
            <?php
        }

    }
    public function getProductByIdAndProductId($pro_id,$orderby=0)
    {
        $query="SELECT * FROM `product_types` where Pro_Id='$pro_id' ORDER by Price ASC ;";
        if($orderby !=0 ){
            $query="SELECT * FROM `product_types` where Pro_Id='$pro_id' && Id='$orderby'";
        }
        $this->query($query);
    }
    function InsertProductType(){
        $this->insert();
        if($this->mysql_error_no==1062){
            $this->Message="Product type is already in Database";

        }else{
            $this->Message="Product type inserted Successfully";
        }
    }

}