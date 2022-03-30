(function () {
    let dis=document.getElementsByName('Description')[0];
    if(dis!=null){
        CKEDITOR.replace( 'Description' );
    }

    /******************************Nav Opener************************/
    let opener = document.querySelector('.opener');
    let header = document.querySelector('.header');
    if(opener!=null){
        opener.addEventListener("click",function () {
            opener.classList.toggle("active");
            opener.firstElementChild.classList.toggle("fa-times");
            opener.firstElementChild.classList.toggle("fa-bars");
            header.classList.toggle("active");
        });
    }


    /****************************Uri Genrater************************/
    let namefield = document.getElementById('name');
    let urifield = document.getElementById('uri');
    if(namefield!=null){
        namefield.addEventListener('keyup',function () {
            flag=false; let uri="";
            let value=this.value.toLowerCase();
            Allowed=["-","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
            value=Array.from(value);
            value.forEach(function (a) {
                Allowed.forEach(function (allowed) {
                    if(allowed===a){
                        flag=true;
                    }
                });
                if(flag){
                    uri+=a;
                    flag=false;
                }else {
                    if(uri[uri.length-1]!=="-"){
                        uri+='-';
                    }
                }
            });
            urifield.value=uri;
        });
    }


    /****************************Image Previewer***************************/
    let pre=document.getElementById("img_input");
    if (pre!=null){
        pre.addEventListener("change",preview_img);
        function preview_img(a) {
            let file = a.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.addEventListener("load", function (a) {
                    document.getElementById("img").src = a.target.result;
                });
                reader.readAsDataURL(file);
            }else {
                document.getElementById("img").src =srcs;
            }
        }
    }

})();


    /***************************Insert Form Opener And Closer*************/
    function OpenAddformEventMaker() {
        let openPopup=document.querySelector(".open-popup");
        if(openPopup !== undefined && openPopup !== ""){
            openPopup.addEventListener("click",function (e) {
                OpenAddform(0);
            });
        }
    }
    function CloseAddformEventMaker() {
        let closePopup=document.querySelector(".close-popup");
        if(closePopup !== undefined && closePopup !== ""){
            closePopup.addEventListener("click",function (e) {
                CloseAddform();
            });
        }
    }
    function CloseAddform(){
        let formContainer=document.querySelector(".form-container");
        formContainer.classList.remove("active-form");
    }
    function OpenAddform(endpoint){
        let formContainer=document.querySelector(".form-container");
        formContainer.querySelector("#endpoint").value=endpoint;
        formContainer.classList.add("active-form");
    }

    CloseAddformEventMaker();
    OpenAddformEventMaker();
