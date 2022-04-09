<?php

namespace app\Controller\Admin\ProductTypes;

use app\Controller\controller;
use framework\Request\Request;

class ProductTypes extends controller
{
    function ProductTypesView(){

        $this->view(ProductTypes."ProductTypes");
    }
    function ProductTypesGet(){
        $i=0;
        while ($i<10){
            $i++;
            ?>
            <div class="tr">
                <div id="notedittable" name="cid"><?=$i?></div>
                <div name="cname">ss</div>
                <div id="notedittable" name="csname">ss</div>
                <div id="description" name="description"></div>
                <div class="relative">
                    <button data-title="Update your changes" class="updaterow btn btn-outline-primary">
                        <i class="fa fa-pencil-square-o"></i>
                    </button>
                    <button data-title="Click to Delete" class="delete btn btn-outline-danger">
                        <i class="fa fa-trash-o"></i>
                    </button>
                </div>
            </div>
            <?php
        }
    }
    function ProductTypeInsert(){

        echo "i";
    }
    function ProductTypeUpdate(){
        echo "u";
    }
    function ProductTypeDelete(Request $request){
        echo "d";
    }
}