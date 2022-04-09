<?php


namespace app\Model\ProductType;


use app\Model\Model;

class product_type extends Model
{
    function GetProducts($from){
        $query="select * from ".$this->table." ORDER BY id desc limit ".$from.",10;";
        $this->query($query);

        while ($this->next()){
            $CatModel=new Category();
            $CatModel->get("id",$this->Catid);
            $CatModel->next();
            ?>
            <div class="tr">
                <div id="notedittable" name="cid"><?=$this->id?></div>
                <div name="cname"><?=$this->Name?></div>
                <div name="uri"><?=$this->URI?></div>
                <div id="description" name="Description"><?=$this->Description?></div>
                <div name="Details"><?=$this->Details?></div>
                <div name="Catid"><?=$CatModel->Name?></div>
                <div name="Tags"><?=$this->Tags?></div>
                <div class="relative">
                    <button onclick="EditData(<?=$this->id?>)" data-title="Edit This Row" class="updaterow btn btn-outline-primary">
                        <i class="fa fa-pencil-square-o"></i>
                    </button>
                    <button data-title="Click to Delete" onclick="Delete(<?=$this->id?>)" class="delete btn btn-outline-danger">
                        <i class="fa fa-trash-o"></i>
                    </button>
                </div>
            </div>
            <?php
        }

    }

}