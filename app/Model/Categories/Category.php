<?php
namespace app\Model\Categories;

use app\Model\Model;

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
    function InsertCategory(){
        return $this->insert();
    }
}