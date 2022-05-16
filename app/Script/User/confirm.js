$(document).ready(function (){
    $("#ConfirmForm").on("submit",function (e){
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            error:function (data){
                data=JSON.parse(data.responseText);
                $("#msg").addClass("error")
                $("#msg").html(data.Message) // show response from the php script.
                setTimeout( function (){
                    $("#msg").removeClass("error");
                    $("#msg").html('');
                    switch (data.Code) {
                        case "409":
                            location.href=HTTP;
                            break;

                    }
                },3000);
            },
            success: function(data)
            {
                if(data.Success){
                    $("#msg").addClass("success");
                    $("#msg").html(data.Message); // show response from the php script.
                    setTimeout( function (){
                        $("#msg").removeClass("success");
                        $("#msg").html('');
                        location.href=HTTP;
                    },2000);
                }
            }
        });

        return false;
    });
    $("#resend").on("click",function (e){
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var url = HTTP+"Resend";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                Email:$("#email").val()
            }
            , // serializes the form's elements.
            error:function (data){
                data=JSON.parse(data.responseText);
                $("#msg").addClass("error")
                $("#msg").html(data.Message) // show response from the php script.
                setTimeout( function (){
                    $("#msg").removeClass("error");
                    $("#msg").html('');
                    switch (data.Code) {
                        case "409":
                            location.href=HTTP;
                            break;

                    }
                },3000);
            },
            success: function(data)
            {
                if(data.Success){
                    $("#msg").addClass("success");
                    $("#msg").html(data.Message); // show response from the php script.
                    setTimeout( function (){
                        $("#msg").removeClass("success");
                        $("#msg").html('');

                    },2000);
                }
            }
        });
        return false;
    });
});