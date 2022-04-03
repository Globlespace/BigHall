$(document).ready(function (){
    $("#ConfirmForm").on("submit",function (e){
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            error:function (e){
                console.log(e);
            },
            success: function(data)
            {
                if(data.Success){
                    location.href=$("#baseurl").val()+"login";
                }else{
                    console.log(data);
                    $("#msg").addClass("error")
                    $("#msg").html(data.Message) // show response from the php script.
                    setTimeout( function (){
                        $("#msg").removeClass("error");
                        $("#msg").html('');
                    },3000);
                }
            }
        });

        return false;
    });
    $("#resend").on("click",function (e){
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var url = $("#baseurl").val()+"create/resend"
        $.ajax({
            type: "POST",
            url: url,
            data: {
                email:$("#email").val()
            }, // serializes the form's elements.
            error:function (e){
                console.log(e);
            },
            success: function(data)
            {
                if(data.Success){
                    $("#msg").addClass("success")
                    $("#msg").html(data.Message) // show response from the php script.
                    setTimeout( function (){
                        $("#msg").removeClass("success");
                        $("#msg").html('');
                    },3000);
                }else{
                    console.log(data);
                    $("#msg").addClass("error")
                    $("#msg").html(data.Message) // show response from the php script.
                    setTimeout( function (){
                        $("#msg").removeClass("error");
                        $("#msg").html('');
                    },3000);
                }
            }
        });

        return false;
    });
});