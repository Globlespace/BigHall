<?php

namespace app\Model\FourGrid;
use app\Model\Categories\Category;
use app\Model\Model;
use app\Model\Products\Product;

class FourGrid extends Model
{
    public function __construct()
    {
        $this->table="fourgrid";
        parent::__construct();
    }
    public function FourGrid($from,$to){

        $Query="select * from $this->table Limit $from , $to";
        $this->query($Query);
        if($this->next()) {

            ?>
            <div class="four-grid-container">
                <?php
                do {
                    $CatModel=new Category();
                    $CatModel->get($this->Catid);
                    $CatModel->next();
                    ?>
                    <section class="four-grid section-style">
                        <div class="four-grid-seeall">
                            <a href="<?=HTTP_HOST?>Category/<?=$CatModel->URI?>">
                                See all
                            </a>
                        </div>
                        <div class="four-grid-first-item">
                            <div>
                                <img src="https://m.media-amazon.com/images/I/21YQPEhsGTL._AC_SR420,420_.jpg" alt="">
                            </div>
                            <div>
                                text
                            </div>
                        </div>
                        <div class="four-grid-second-item">
                            <div>
                                <img src="https://m.media-amazon.com/images/I/41bHFl-bFzL._AC_SR420,420_.jpg" alt="">
                            </div>
                            <div>
                                text
                            </div>
                        </div>
                        <div class="four-grid-third-item">
                            <div>
                                <img src="https://m.media-amazon.com/images/I/41AuCdcitiL._AC_SR420,420_.jpg" alt="">
                            </div>
                            <div>
                                text
                            </div>
                        </div>
                        <div class="four-grid-fourth-item">
                            <div>
                                <img src="https://m.media-amazon.com/images/I/41rF6Dk9NTL._AC_SR420,420_.jpg" alt="">
                            </div>
                            <div>
                                text
                            </div>
                        </div>
                        <div class="four-grid-text-item">
                            <h2>Up To 60% off</h2>
                        </div>
                    </section>
                    <?php
                }while($this->next());
                ?>
            </div>
            <?php
        }
    }
    function GetFourGrid($from){
        $query="select * from ".$this->table." ORDER BY Id desc limit ".$from.",10;";
        $this->query($query);
        while ($this->next()){
            $pro=new Product();

            ?>
            <div class="tr">
                <div id="notedittable" name="cid"><?=$this->Id?></div>
                <div name="cname"><?=$this->Name?></div>
                <div id="Pro_id_1" name="Pro_id_1">
                    <?php
                    $pro->get($this->Pro_id_1);
                    $pro->next();
                    echo $pro->Name
                    ?>
                </div>
                <div id="Pro_id_2" name="Pro_id_2">
                    <?php
                    $pro->get($this->Pro_id_2);
                    $pro->next();
                    echo $pro->Name
                    ?>
                </div>
                <div id="Pro_id_3" name="Pro_id_3">
                    <?php
                    $pro->get($this->Pro_id_3);
                    $pro->next();
                    echo $pro->Name
                    ?>
                </div>
                <div id="Pro_id_4" name="Pro_id_4">
                    <?php
                    $pro->get($this->Pro_id_4);
                    $pro->next();
                    echo $pro->Name
                    ?>
                </div>
                <div id="Description" name="Description"><?=$this->Description?></div>
                <div id="Catid" name="Catid">
                    <?php
                    $cat=new \app\Model\Categories\Category();
                    $cat->get($this->Catid);
                    $cat->next();
                    echo $cat->Name
                    ?>
                </div>
                <div class="relative">
                    <button onclick="EditData(<?=$this->Id?>)" data-title="Edit This Row" class="updaterow btn btn-outline-primary">
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
    function InsertFourGrid(){
        $this->insert();
        if($this->mysql_error_no==1062){
            $this->Message="FourGrid is already in Database";
            $this->Success=false;

        }else{
            $this->Message="FourGrid inserted Successfully";
            $this->Success=true;
        }
    }
}