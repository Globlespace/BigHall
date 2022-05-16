<@Page>
<?php use app\Model\Model;?>

<main>
    <section class="banner">
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
    <section class="slider">
        <div class="card">
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
<script defer src="<?= SCRIPT?>User/Home.js"></script>


<@Page>