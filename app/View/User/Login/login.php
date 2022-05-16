
<link href="<?=STYLE?>style.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
    var HTTP="<?=HTTP_HOST?>";
</script>
<main class="loginpage entry-form-main">
    <div class="entry-form">
        <div class="login">
            <div id="msg">  </div>
            <div class="form-header">
                <input class="radio" id="login" checked name="radio" type="radio">
                <label for="login" >Sign-in</label>
            </div>
            <form id="loginform" action="<?=HTTP_HOST?>Login" method="post"  class="form-main" >
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="submit"  value="Login">
            </form>
        </div>
        <div class="create">
            <div class="form-header">
                <input class="radio" id="Create" name="radio"  type="radio">
                 <label for="Create">Create account</label>
            </div>
            <form id="registerform" action="<?=HTTP_HOST?>Register" method="post" class="form-main">
                <input required type="text" name="name" placeholder="Name">
                <input required type="email" name="email" class="email" placeholder="Email">
                <input required type="number" name="phone" class="email" placeholder="Mobile Number">

                <div class="split">
                    <select required name="city" class="city half" >
                        <Option value="">City</Option>
                        <Option value="srinagar">Srinagar</Option>
                    </select>
                    <input class="half" type="number" min="111111" max="999999" placeholder="PinCode">
                </div>
                <input required type="text" name="address" placeholder="Address">
                <input required type="password" name="password" placeholder="Password">
                <input type="submit" id="registersubmit" value="Register">
            </form>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="<?=SCRIPT?>User/login.js" type="text/javascript"></script>
        <script src="<?=SCRIPT?>User/register.js" type="text/javascript"></script>
    </div>
   <script>
       let radios=document.querySelectorAll(".radio");

       radios.forEach(function (radio){
            if(!radio.checked){
                radio.parentElement.nextElementSibling.style.display="none";
            }
        radio.addEventListener("change",function(){
            radios.forEach(function (radio){
                radio.parentElement.nextElementSibling.style.display="none";
            });
               if(this.checked){
                   this.parentElement.nextElementSibling.style.display="flex";
               }
           });
       });
   </script>
</main>

