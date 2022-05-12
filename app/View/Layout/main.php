<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?=STYLE?>adminStyle.css" />
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>admin panel</title>
</head>
<body>
<div class="loader">
    <img src="<?=IMAGES?>Preloader_3.gif">
</div>
<input id="HTTP_HOST" type="hidden" value="<?=HTTP_HOST?>">
<div class="popup">
    <div class="popup-content">
    </div>
    <div class="popup-buttons">
        <button id="confirm" class="btn btn-outline-primary">Confirm</button>
        <button id="cancel" class="ml-1 btn btn-outline-danger">Cancel</button>
    </div>
</div>
<script>
    function opensetting() {
        let opnsetting = document.querySelector(".setting-items");
        opnsetting.classList.toggle("setting-open");
    }
    function opennotificatin() {
        let opnprofile = document.querySelector(".notification-content");
        opnprofile.classList.toggle("notification-content-open");
    }
    function openprofile() {
        let opnprofile = document.querySelector(".user-details");
        opnprofile.classList.toggle("profile-open");
    }
</script>
<div class="admin-pages">
    <section class="header">
        <div class="logo">
            <div class="logo-img">
                <a href="<?=HTTP_HOST?>admin"><img src="<?= IMAGES?>logo.png" alt="logo" /></a>
            </div>
        </div>
        <div class="dashboard">
            <a href="<?= HTTP_HOST?>admin"> <i class="fa fa-tachometer"> </i>dashboard</a>
        </div>
        <div class="navigation">
            <span>navigation</span>
        </div>
        <div class="categories">
            <a href="<?= HTTP_HOST?>admin/Categories"><i class="fa fa-clone"></i>Categories</a>
        </div>
        <div class="product">
            <a href="<?= HTTP_HOST?>admin/Products"><i class="fa fa-shopping-bag"></i>Product</a>
        </div>
        <div class="product">
            <a href="<?= HTTP_HOST?>admin/ProductTypes"><i class="fa fa-shopping-bag"></i>ProductTypes</a>
        </div>
        <div class="images">
            <a href="<?= HTTP_HOST?>admin/ProImages"><i class="fa fa-image"></i>Images</a>
        </div>
        <div class="images">
            <a href="<?= HTTP_HOST?>admin/mailalluser"><i class="fa fa-envelope-o" aria-hidden="true"></i>Product Mail</a>
        </div>
        <div class="slider">
            <a href="<?= HTTP_HOST?>admin/sliders"><i class="fa fa-sliders"></i>Sliders</a>
        </div>

        <div class="setting">
        <span onclick="opensetting()">
            <i class="fa fa-gear"></i>
            Setting
            <i class="ml-5 fa fa-angle-down"></i>
        </span>
            <div class="setting-items">
                <a href="">item1</a>
                <a href="">item2</a>
                <a href="">item3</a>
            </div>
        </div>
    </section>
    <div class="opener">
        <i class="fa fa-bars"></i>
    </div>
    <section class="full-page">
        <header>
            <section class="admin-header">
                <section class="search-section">
                    <form>
                        <input type="text" placeholder="Search for" />
                        <button class="btn" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </section>
                <section class="admin-msg-notification">
                    <div class="notification">
                        <a href="#">
                            <i onclick="opennotificatin()" class="fa fa-bell"></i>
                        </a>
                        <span class="notification-count">
                        0
                    </span>
                        <div class="notification-content">
                        </div>
                    </div>
                    <div class="message">
                        <a href=""><i class="fa fa-envelope"></i></a>
                    </div>
                </section>
              <section class="profile-admin">
                    <?php
                   /*$adminloginModel=new \app\Model\adminlogin();
                    $results=$adminloginModel->get(["admin_img","admin_username"]);*/
                   $results=false;
                    ?>
                    <div class="user-name"><?php
                       if($results){
                            echo  $results[0]["admin_username"];
                        }
                        ?></div>
                    <div class="user">
                <span onclick="openprofile()">
                    <img src="
                    <?php
                    if($results){
                        echo UP_IMAGES.$results[0]["admin_img"];
                    }
                    ?>" alt="user"/>
                </span>
                        <div class="user-details">
                            <a href="<?=HTTP_HOST?>admin/profile"><i class="fa fa-user"></i>Profile</a>
                            <a href="<?=HTTP_HOST?>admin/setting"><i class="fa fa-gear"></i>Setting</a>
                            <a href="<?=HTTP_HOST?>adminLoginOut"><i class="fa fa-sign-out"></i>Logout</a>
                        </div>
                    </div>
                </section>
            </section>
        </header>
        <main class="main-page">
            {{Page}}
        </main>
        <footer>
            <p>
                Copyright ©<script>document.write(new Date().getFullYear());</script>
                <i class="icon-heart text-danger" aria-hidden="true">
                </i> by <a href="http://Bighall.com" target="_blank">BigHall</a>
            </p>
        </footer>
    </section>
</div>
<script  src="<?=SCRIPT?>Ajax.js"></script>
<script  src="<?=SCRIPT?>EssentialFunctions.js"></script>
<script  src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script  src="<?=SCRIPT?>DataUploader.js"></script>
<script  src="<?=SCRIPT?>admin_script.js"></script>
</body>
</html>