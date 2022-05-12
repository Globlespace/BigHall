

<main class="loginpage entry-form-main">
    <div class="entry-form">
        <div class="create " id="confirm">
            <div id="msg">  </div>
            <form id="ConfirmForm" action="<?=HTTP_HOST?>create/Confirm" method="post" class="form-main">
                <div class="codebtn">
                    <input type="hidden" id="email" name="email" value="<?=$email?>">
                    <input type="text" placeholder="Code" name="Code">
                    <input type="button" id="resend" value="Resend">
                </div>
                <input type="submit" id="registersubmit" value="Confirm">
            </form>
        </div>
    </div>
    <script src="<?=SCRIPT?>confirm.js" type="text/javascript"></script>
</main>

