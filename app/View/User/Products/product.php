<@Page>
    <main>
    <section class="full-product">
        <div class="product section-style">
            <div class="product-name">
                <?php

                $product = new \app\Model\Products\Product();
                $product_type = new \app\Model\ProductType\product_type();
                $type = isset($_GET["pro_type"]) ? $_GET["pro_type"] : 0;
                $product->getbyUri($Uri);
                if(!$product->next()){
                    header("Location: ".HTTP_HOST."404");
                }
                $product_type->getProductByIdAndProductId($product->id, $type);
                if(!$product_type->next()){
                   header("Location: ".HTTP_HOST."404");
                }
                echo $product->Name;
                ?>
            </div>
            <div class="product-slider">
                <?php
                if ($product_type->Offer > 0) {
                    echo '<div class="pro-offer">';
                    echo $product_type->Offer;
                    echo '% off </div>';
                }
                $i = new \app\Model\Images\Image();
                $i->get("ProType_id",$product_type->Id);
                if ($i->next()) {
                    ?>
                    <img src="<?= UP_IMAGES.$i->Image ?>" alt="Product Image">
                    <?php
                }
                ?>
            </div>

        </div>
        <div class="product-information">

            <div class="style-name section-style">
                <div class="product-name product-name-second-copy">
                    <?= $product->Name; ?>
                </div>
                <div class="style-name-title">
                    Style Name:
                    <?php
                    echo $product_type->Name;
                    ?>
                </div>
                <div class="product-varieties myslider-container">
                    <div class="myslider">
                        <?php
                        $query="SELECT * FROM `product_types` where Pro_Id=$product->id ORDER by Price ASC ";
                        $product_type->query($query);
                        $first=true;
                        while ($product_type->next()) {
                           $type= $type==0 && $first ? $product_type->Id : $type;
                            ?>
                            <div class="myslider-item">
                                <a href="<?= HTTP_HOST . 'Product/' . $product->URI . '?pro_type=' . $product_type->Id ?>"
                                   class="product-variety <?= $type==0 && $first ? "selected" : ( $type == $product_type->Id  ? 'selected' : '') ?>">
                                    <span><?= $product_type->Name; ?></span>
                                    <span class="price"><?= ($product_type->Price);; ?></span>
                                    <span class="<?= $product_type->Qty > 0 ? 'instock' : 'outofstock' ?>">
                                        <?php
                                        if ($product_type->Qty > 0) {
                                            echo "in stoke";
                                        } else {
                                            echo "out of stoke";
                                        }
                                        ?>

                                    </span>
                                </a>
                            </div>
                            <?php
                            $first=false;
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="section-style product-total-pricing">
                <div class="discount-price">
                    <span>MRP:</span>
                    <span class="price">
                        <?php
                        $product_type=new \app\Model\ProductType\product_type();
                        $product_type->getProductByIdAndProductId($product->id, $type);
                        $product_type->next();
                        echo ($product_type->Price);
                        ?>
                    </span>

                </div>
                <div class="real-price">
                    <span class="price">
                        <?php
                        $amount = $product_type->Price - (($product_type->Price / 100) * $product_type->Offer);
                        echo ($amount);
                        ?>
                    </span>
                    <span class="save">
                        <span>Save</span>
                        <span class="price">
                            <?php
                            $amount = (($product_type->Price / 100) * $product_type->Offer);
                           echo ($amount);
                            ?>
                        </span>
                    </span>
                </div>


            </div>
            <div class="section-style product-pricing">
                <div>Details</div>
                <table>
                    <?= $product->Details ?>
                </table>
            </div>
            <div class="section-style buy-product">
                <div class="total-price">
                    <span>Total:</span>
                    <span class="price">
                        <?php
                        $amount = ($product_type->Price - (($product_type->Price / 100) * $product_type->Offer));
                        echo ($amount);
                        ?></span>
                </div>
                <span class="<?= $product_type->Qty > 0 ? 'instock' : 'outofstock' ?>">
                    <?php
                    if ($product_type->Qty > 0) {
                        echo "in stoke";
                    } else {
                        echo "out of stoke";
                    }
                    ?>

                </span>
                <div class="buy-product-buttons">

                        <a href="<?=HTTP_HOST?>BuyNow/<?=$type?>">Buy Now</a>

                        <a href="<?=HTTP_HOST?>AddToCart/<?=$type?>">Add To Cart</a>
                </div>
            </div>
            <div class="section-style pro-disc">
                <div class="pro-dis-head">Product Description</div>
                <div class="discription">
                    <?= $product->Description ?>
                </div>
            </div>
        </div>
        <div class="section-style you-may-also-like-slider myslider-container">
            <div class="YouMayAlsoLikeHeading">You May Also Like</div>
            <div class="myslider">
                <?php
                $youmaylikeProducts = new \app\Model\Products\product();
                $youmaylikeProducts->getbytags($product->Tags);
                while ($youmaylikeProducts->next()) {
                    $product_type2= new \app\Model\ProductType\product_type();
                    $query="SELECT * FROM `product_types` pt JOIN `images` img on pt.Id=img.ProType_id WHERE pt.Pro_Id=$youmaylikeProducts->id order by img.Id DESC LIMIT 0,1;";
                    $product_type2->query($query);

                    if($product_type2->next()) {
                        ?>
                        <div class="myslider-item">
                            <style>
                                a{
                                    text-decoration: none;
                                    color: black;
                                }
                            </style>
                            <a href="<?= HTTP_HOST . "Product/" . $youmaylikeProducts->URI ?>" class="YouMayAlsoLike">
                                <img src="<?= UP_IMAGES.$product_type2->Image ?>">
                                <div class="product-name">
                                    <?= $youmaylikeProducts->Name ?>
                                </div>
                                <div class="price"><?= $product_type2->Price ?></div>
                            </a>
                        </div>
                        <?php
                    }
                }
                ?>


            </div>
            <script>
                isdragging = false;
                startScrolling = 0;
                slided = 0;
                newSlided = 0;
                let mysliders = document.querySelectorAll(".myslider");
                mysliders.forEach(function (myslider) {
                    let myslider_con;
                    myslider.addEventListener("mousedown", function (a) {
                        myslider_con = this.parentElement;
                        myslider_con.classList.add("grabbing");
                        startScrolling = a.pageX;
                        isdragging = true;
                    });
                    myslider.addEventListener("mouseup", function () {
                        myslider_con.classList.remove("grabbing");
                        slided = newSlided;
                        isdragging = false;
                    });
                    myslider.addEventListener("mouseenter", function () {
                        myslider_con = this.parentElement;
                    });
                    myslider.addEventListener("mouseout", function () {
                        myslider_con.classList.remove("grabbing");
                        slided = newSlided;
                        isdragging = false;
                    });
                    myslider.addEventListener("mousemove", function (a) {
                        if (isdragging) {
                            newSlided = (a.pageX - startScrolling) + slided;

                            if (newSlided <= (myslider_con.offsetWidth - myslider.offsetWidth)) {
                                newSlided = (myslider_con.offsetWidth - myslider.offsetWidth);
                            } else if (newSlided > 0) {
                                newSlided = 0;
                            }
                            myslider.style.transform = `translateX(${newSlided}px)`;
                        }
                    });
                })

            </script>
        </div>


        <div class="section-style product-QA">
            <h3>Have a Question</h3>
            <input class="question" type="text" placeholder="Type your Question">
            <div class="QA-box">

            </div>
        </div>
    </section>
</main>
<@Page>