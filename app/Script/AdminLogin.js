$(document).ready(function () {

    $("#login").on("submit",function () {
        var username=document.getElementById("username").value;
        var password=document.getElementById("password").value;
        let url=HTTP+"admin/Login";
        var data={
            USER:username,
            PASS:password
        };
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType:"JSON",
            beforeSend: function () {
                loading_open();
            },
            error:function(result){
                resultData=result.responseText;
                resultData=JSON.parse(resultData);
                Swal.fire({
                    html:resultData.Message,
                    type: 'error',
                    title: 'Oops...',
                    footer: '<a href="home.php">Forget password?</a>'
                });
            },
            success: function (result) {
                document.location="Dashboard";
            },
            complete: function () {
                loading_close();

            }
        });
        return false;
    });
    const inputs = document.querySelectorAll(".input");
    function addcl(){
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }
    function remcl(){
        let parent = this.parentNode.parentNode;
        if(this.value == ""){
            parent.classList.remove("focus");
        }
    }
    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
});
});
