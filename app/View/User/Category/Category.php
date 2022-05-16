<@Page>
<link href="<?= STYLE?>Category.css" rel="stylesheet" />
<style>
    html {
        background-color: white;
    }
</style>
<main>
    <div class="con-heading-one">
        <h1>Products</h1>
    </div>
    <div class="main-container">
        <?php
            $product=new \app\Model\Products\Product();
            $query="SELECT * FROM `products` WHERE Catid=(SELECT id from `categories` WHERE URI ='$Uri')";
            $product->query($query);
            $found=false;
            while ($product->next()){
                $found=true;
                $product_type= new \app\Model\ProductType\product_type();
                $query="SELECT * FROM `product_types` pt JOIN `images` img on pt.Id=img.ProType_id WHERE pt.Pro_Id=$product->id order by img.Id DESC LIMIT 0,1;";
                $product_type->query($query);
                if($product_type->next()){
                   ?>
                    <a href="<?=HTTP_HOST."Product/".$product->URI?>" class="product">
                        <div class="product-img">
                            <img src="<?= UP_IMAGES.$product_type->Image?>" alt="product image" >
                        </div>
                        <div class="product-rate">
                            <div class="assign-price">
                                <spam class="price-symbol">₹</spam>
                                <spam class="price-whole">
                                    <?php
                                    $amount = $product_type->Price - (($product_type->Price / 100) * $product_type->Offer);
                                    echo ($amount);
                                ?></spam>
                            </div>
                            <div class="strike-price">
                                <spam class="price-symbol">₹</spam>
                                <spam class="price-whole"><?= $product_type->Price?></spam>
                            </div>
                        </div>
                        <div class="cat-product-name">
                <span class="assign-title">
                        <?= $product_type->Name?>
                </span>
                        </div>
                        <div class="product-stars">
                            <div class="stars">
                                <i class="fas fa-solid fa-star "></i>
                                <i class="fas fa-solid fa-star "></i>
                                <i class="fas fa-solid fa-star "></i>
                                <i class="fas fa-solid fa-star "></i>
                                <i class="far fa-thin fa-star "></i>
                                <i class="far fa-thin fa-star "></i>
                            </div>
                            <spam class="star-number">
                                2,637
                            </spam>
                        </div>
                    </a>
                <?php
                }
            }
            if(!$found){
                header("Location: ".HTTP_HOST."404");
            }
        ?>

    </div>
</main>
<@Page>