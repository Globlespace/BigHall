<?php
namespace app\Model\ThreeGrid;

use app\Model\Categories\Category;
use app\Model\Model;
use app\Model\Products\Product;

class ThreeGrid extends Model
{
    public function __construct()
    {
        $this->table="threegrid";
        parent::__construct();
    }
    public function ThreeGrid($from,$to){

        $Query="select * from $this->table Limit $from , $to";
        $this->query($Query);
        if($this->next()) {
            ?>
            <div class="three-grid-container">
                <?php
                do{
                    $CatModel=new Category();
                    $CatModel->get($this->Catid);
                    $CatModel->next();
                    ?>
                    <section class="section-style three-grid">
                        <div class="three-grid-seeall">
                            <a href="<?=HTTP_HOST?>Category/<?=$CatModel->URI?>">
                                See all
                            </a>
                        </div>
                        <div class="three-grid-first-item">
                            <img src="https://images-eu.ssl-images-amazon.com/images/I/41fCWQNJ2XL._AC_SX800_.jpg"
                                 alt="">
                        </div>
                        <div class="three-grid-second-item">
                            <div><img src="https://images-eu.ssl-images-amazon.com/images/I/41h13vPoFqS._AC_SX800_.jpg"
                                      alt=""></div>
                            <div><img src="https://images-eu.ssl-images-amazon.com/images/I/51zran6MmRL._AC_SX800_.jpg"
                                      alt=""></div>
                        </div>
                        <div class="three-grid-text-item">
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
    function GetThreeGrid($from){
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
    function InsertThreeGrid(){
        $this->insert();
        if($this->mysql_error_no==1062){
            $this->Message="ThreeGrid is already in Database";
            $this->Success=false;

        }else{
            $this->Message="ThreeGrid inserted Successfully";
            $this->Success=true;
        }
    }

}