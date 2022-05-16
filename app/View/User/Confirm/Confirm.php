<link href="<?=STYLE?>style.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
    var HTTP="<?=HTTP_HOST?>";
</script>
<main class="loginpage entry-form-main">
    <div class="entry-form">
        <div class="create " id="confirm">
            <div id="msg">  </div>
            <form id="ConfirmForm" action="<?=HTTP_HOST?>Confirm" method="post" class="form-main">
                <div class="codebtn">
                    <input type="hidden" id="email" name="Email" value="<?=$Email?>">
                    <input type="text" placeholder="Code" name="Code">
                    <input type="button" id="resend" value="Resend">
                </div>
                <input type="submit" id="registersubmit" value="Confirm">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?=SCRIPT?>User/confirm.js" type="text/javascript"></script>
</main>

