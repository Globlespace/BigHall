<?php
namespace app\Model\Categories;

use app\Model\Model;
use app\Model\Products\Product;

class Category extends Model
{
    public function __construct()
    {
        $this->table="categories";
        parent::__construct();
    }
    function GetCategories($from){
        $query="select * from ".$this->table." ORDER BY id desc limit ".$from.",10;";
        $this->query($query);
        while ($this->next()){
            ?>
                <div class="tr">
                    <div id="notedittable" name="cid"><?=$this->id?></div>
                    <div name="cname"><?=$this->Name?></div>
                    <div name="uri"><?=$this->URI?></div>
                    <div id="description" name="description"><?=$this->Description?></div>
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
    function GetCategoriesForHome(){
        $query="select * from `".$this->table."` ORDER BY id desc ";
        $this->query($query);

        while ($this->next()){
            $product=new Product();
            $query="
                    SELECT * FROM  `products` p
                    JOIN `product_types` pt
                    ON p.id=pt.Pro_Id
                    JOIN `images` i
                    ON pt.Id=i.ProType_id
                    WHERE p.Catid=$this->id
                    ORDER BY p.id DESC
                    LIMIT 0,1;
                  ";
            $product->query($query);
            if($product->next()){

                ?>
                <a href="<?=HTTP_HOST."Category/".$this->URI?>" class="product">
                    <div class="product-img">
                        <img src="<?= UP_IMAGES.$product->Image?>" alt="product image" >
                    </div>

                    <div class="cat-product-name">
                    <span class="assign-title">
                        <?=
                            $this->Name
                        ?>
                    </span>
                    </div>

                </a>
                <?php

            }
        }
    }
    function InsertCategory(){
        return $this->insert();
    }
}