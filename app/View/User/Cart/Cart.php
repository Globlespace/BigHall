<@Page>
<link href="<?= STYLE?>Cart.css" rel="stylesheet" />
    <main>
        <div class="cart-head-line">
            <h1>Check<span>out</span></h1>
        </div>
        <div class="con-cart">
            <div class="main-cart">
                <div class="cart-product-list">
                    <div class=" product-head">
                        <span>PRODUCT</span>
                    </div>
                    <div class="quantity-head">
                        <span>QUANTITY</span>
                    </div>
                    <div class="price-head">
                        <span>PRICE</span>
                    </div>

                    <?php
                        $USERID=$_SESSION["USERID"];
                        $cart=new \app\Model\Cart\Cart();
                        $query="SELECT * FROM `cart` c JOIN product_types pt ON c.ProType_id = pt.id WHERE c.User_Id=$USERID;";
                        $cart->query($query);
                        while ($cart->next()) {
                            ?>
                            <div class="cart-product-img">
                                <img src="<?= IMAGES ?>img-2.jpg" alt=""/>
                            </div>
                            <div class="cart-description">
                                <div class="here-dis">
                                    <span><?=$cart->Name?></span>
                                </div>
                                <!--<div class="cart-size">
                                    <div class="c-size">
                                        <h5>Size:</h5>
                                        <span>XL</span>
                                    </div>
                                    <div class="c-brand">
                                        <h5>Brand:</h5>
                                        <span>Gucci</span>
                                    </div>
                                </div>-->
                            </div>
                            <div class="cart-quantity">
                                <input onchange="CartQtyChange(<?=$cart->ProType_id?>)" type="number" min="1"  style="width: 100px" value="<?=$cart->QtyCart?>" class="quantity-dropdown">
                            </div>
                            <div class="cart-price">
                                <div class="cart-total-price">
                                    <span>₹</span>
                                    <span><?=$cart->Price*$cart->QtyCart?></span>
                                </div>
                                <div class="cart-each-price">
                                    <span>₹</span>
                                    <span><?=$cart->Price?> each</span>
                                </div>
                            </div>
                            <div class="remove-button">
                                <a href="<?=HTTP_HOST?>RemoveFromCart/<?=$cart->ProType_id?>">
                                    <button type="button" class="cart-btn">Remove</button>
                                </a>
                            </div>
                            <?php
                        }
                    ?>
                </div>
                <script>
                    function CartQtyChange(ProType_id) {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                alert(this.responseText);
                            }
                        };

                        xhttp.open("GET","<?=HTTP_HOST?>QtyChangeFromCart/"+ProType_id, true);
                        xhttp.send();
                    }
                </script>
                <div class="cart-main-bottom">
                    <div class="continue-shopping">
                        <button>Continue Shopping</button>
                    </div>
                    <div class="make-purchase">
                        <button>Make Purchase</button>
                    </div>
                </div>
            </div>
            <div class="coupon-add">
                <span>Have Coupon?</span>
                <div class="coupon-input-btn">
                    <input type="text" id="coupon-input">
                    <button class="coupon-btn">Apply</button>
                </div>
            </div>
            <div class="cart-price-div">
                <div class="cart-price-detail">
                    <div class="cart-total-price">
                        <span>Total Price:</span>
                        <div class="s-t-p">
                            <span>₹</span>
                            <span>900.00 </span>
                        </div>
                    </div>
                    <div class="cart-price-discount">
                        <span>Discount:</span>
                        <div class="s-d-p">
                            <span>₹</span>
                            <span>900.00 </span>
                        </div>
                    </div>
                    <div class="last-total">
                        <span>Total:</span>
                        <div class="s-l-t">
                            <span>₹</span>
                            <span>900.00 </span>
                        </div>
                    </div>
                    <div class="cart-cards-icon">
                        <img src="<?= ICONS ?>master-card.png" alt="" />
                        <img src="<?= ICONS ?>payment.png" alt="" />
                        <img src="<?= ICONS ?>paytm.png" alt="" />
                        <img src="<?= ICONS ?>visa.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </main>
<@Page>