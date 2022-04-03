<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="<?= STYLE ?>style.css" rel="stylesheet">
    <title>Home</title>
</head>
<body>
<script>
    var HTTP_HOST="<?=HTTP_HOST?>";
</script>
<header class="header container">
    <i class="oc fas fa-bars"></i>
    <nav class="full-nav closed">
        <div class="nav">
            <i style="font-size: 1rem;" class="oc fas fa-times"></i>
            <ul class="nav-bar">
                <li>cat</li>
            </ul>
        </div>
    </nav>
    <div class="logo">logo</div>
    <div class="user-icons">
        <i class="fas fa-bell"></i>
        <i class="fas fa-shopping-cart"></i>
        <i class="fas fa-user-circle"></i>
    </div>
    <div class="search-bar">
        <input class="search field" type="search" placeholder="Search for Products....">
    </div>
    <script>
        let oc = document.querySelectorAll(".oc");
        let fullnav = document.querySelector(".full-nav");
        let body = document.querySelector("body");
        oc.forEach(function (item) {
            item.addEventListener("click", function () {
                fullnav.classList.toggle("closed");
                fullnav.classList.toggle("open");
                body.classList.toggle("hidden");
            });
        });
    </script>
</header>

{{Page}}

<footer>

</footer>
<script src="<?= SCRIPT?>User/main.js"></script>
</body>
</html>