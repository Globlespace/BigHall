$(document).ready(function (){
    $("#loginform").on("submit",function (e){
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
                        case 403:
                            location.href=HTTP+"Confirm/"+data.Data.Email;
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
                        const queryString = window.location.search;
                        const urlParams = new URLSearchParams(queryString);
                        const product = urlParams.get('RediredtUri')==null?"":urlParams.get('RediredtUri');
                        location.href=HTTP+product;
                    },2000);
                }
            }
        });

        return false;
    });
});