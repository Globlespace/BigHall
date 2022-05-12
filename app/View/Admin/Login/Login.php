
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Form</title>
    <link rel="stylesheet" type="text/css" href="<?=STYLE?>AdminLogin.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?=SCRIPT?>sweetalert2.all.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<script>
    var HTTP="<?=HTTP_HOST?>";
</script>
<img class="wave" src="<?=IMAGES?>wave.png">
<div class="container">
    <div class="loader">
        <img src="<?=IMAGES?>Preloader_3.gif">
    </div>
    <div class="img">
        <img src="<?=IMAGES?>bg.svg">
    </div>
    <div class="login-content">
        <form id="login" action="login.php" >
            <img src="<?=IMAGES?>avatar.svg">
            <h2 class="title">Admin Login</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Username</h5>
                    <input id="username" type="text" class="input"/>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <input id="password" type="password" class="input">
                </div>
            </div>
            <a href="#">Forgot Password?</a>
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
</div>
<script type="text/javascript" src="<?=SCRIPT?>EssentialFunctions.js"></script>
<script type="text/javascript" src="<?=SCRIPT?>AdminLogin.js"></script>
</body>
</html>
