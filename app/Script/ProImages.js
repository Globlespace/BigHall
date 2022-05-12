let pre=document.getElementById("Image");
if (pre!=null){
    pre.addEventListener("change",preview_img);
    function preview_img(a) {
        let file = a.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.addEventListener("load", function (a) {
                document.getElementById("image_prv").src = a.target.result;
            });
            reader.readAsDataURL(file);
        }else {
            document.getElementById("image_prv").src =srcs;
        }
    }
}
function SubmitDataWithFile(self) {
    let endpoint = self.querySelector("#endpoint").value;
    let id = self.querySelector("#id").value;
    let form=$("#ProImageSubmit")[0];
    let formdata=new FormData(form);
    let url=form.action;
    DataLoadedCount=0;
    if(endpoint==1){
       url+="/"+id+'/Update'
    }
    $.ajax({
        url: url,
        type: "POST",
        data: formdata,
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        beforeSend: function () {
            loading_open();
        },
        success: function (result) {
            getDataBulkNoAppend();
            CloseAddform();
            Nf.Notify(result.Message);
        },
        complete: function () {
            loading_close();
        }
    });
    return false;
}