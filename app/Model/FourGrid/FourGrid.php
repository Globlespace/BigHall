<?php

namespace app\Model\Fourgrid;
use app\Model\Model;

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
        ?>
        <div class="four-grid-container">
            <?php
            while ($this->next()){

                ?>
                <section class="four-grid section-style">
                    <div class="four-grid-seeall">
                        <a href="">
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
            }
            ?>
        </div>
        <?php
    }
}