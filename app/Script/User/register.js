$(document).ready(function (){
    $("#registerform").on("submit",function (e){
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
                },3000);
            },
            success: function(data)
            {
                if(data.Success){
                    location.href=HTTP+"Confirm/"+$(".email").val();
                }
            }
        });

        return false;
    });
});