<?php


namespace app\Controller\Admin\Products;

use app\Controller\controller;
use framework\Request\Request;

class Products extends controller
{
    function ProductsView(){

        $this->view(Products."Products");
    }
    function ProductsGet(){
        $i=0;
        while ($i<10){
            $i++;
            ?>
            <div class="tr">
                <div id="notedittable" name="cid"><?=$i?></div>
                <div name="cname">ss</div>
                <div id="notedittable" name="csname">ss</div>
                <div id="description" name="description">lllhjh gdfgdsdgsd dfgsfdg dfgfdgdfg fdgdfgdfgdf gdfgdgdfgdfgf dgdfhjlkh</div>
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
    function ProductInsert(){
        echo "i";
    }
    function ProductUpdate(){
        echo "u";
    }
    function ProductDelete(Request $request){
        echo "d";
    }
}