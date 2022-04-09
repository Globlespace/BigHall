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
            <div class="_logo">
                <img src="<?=IMAGES?>logo.png">
            </div>
            <ul class="nav-bar">
                <li>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-2 text-sm font-medium">Dasboard</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-2 text-sm font-medium">Dasboard</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-2 text-sm font-medium">Dasboard</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="logo">
        <img src="<?=IMAGES?>logo.png">
    </div>
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