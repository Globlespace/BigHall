<@Page>
<?php use app\Model\Model;?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
<main>

    <section class="owl-carousel banner">
               <!-- <img src="https://m.media-amazon.com/images/I/611eqXMVAlL._SX3000_.jpg" alt=""> -->
               <?php
               $query="SELECT * FROM `sliders`;";
               $result=mysqli_query(Model::Connection(),$query);
               for($i=0; mysqli_num_rows($result)>$i; $i++){
                   $row=mysqli_fetch_assoc($result);
                   ?>

                   <img src="<?=UP_IMAGES.$row["Image"]?>" alt="">

                   <?php
               }
               ?>
    </section>
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:1,
            loop:false,
            autoplay:true,
            autoplayTimeout:10000,
            autoplayHoverPause:true
        });
    </script>
    <section class="slider myslider-container">
        <div class="myslider">
            <div class="card myslider-item">

            </div>
            <?php
            $Smallslider=new \app\Model\SmallSlider\SmallSlider();
            $Smallslider->get();
            while ($Smallslider->next()){
                ?>
                <div style="background-color: #1c7430" class="card myslider-item">

                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <section class="bannerSpace"></section>
    <section class="section-style order-timer">
        <div class="timer">
        </div>
    </section>
   <div class="grid">

   </div>
</main>
<script src="<?=SCRIPT?>Slider.js">


</script>
<script defer src="<?= SCRIPT?>User/Home.js"></script>


<@Page>