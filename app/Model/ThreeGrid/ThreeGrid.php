<?php
namespace app\Model\ThreeGrid;

use app\Model\Categories\Category;
use app\Model\Model;

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
}