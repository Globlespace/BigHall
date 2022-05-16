
let DataLoadedCount=0;
/************************Server Request Start***********************************/
async function GetDataById(Uri,id) {
    return await Ajax("GET",Uri+"/"+id);
}
async function getDataFromServerBulk(Uri,DataLoadedCount) {
    return await Ajax("Get",(Uri+/Bulk/+DataLoadedCount));
}
async function InsertData(Uri,Data) {
    return await Ajax("POST",Uri,Data);
}
async function UpdateData(Uri,Data) {
   return await Ajax("POST",Uri+"/"+Data.id+"/Update",Data);
}
async function DeleteData(Uri,id) {
    return await Ajax("DELETE",Uri+"/"+id);
}

/*************************Server Request End*************************/
let Nf=new Notifier();
function SubmitData(self) {
    loading_open();
    let Data=getData(self);
    let endpoint = self.querySelector("#endpoint").value;
    if(endpoint==0){
        InsertData(self.attributes.action.baseURI,Data).then(function (a) {
            a=JSON.parse(a);
            DataLoadedCount=0;
            getDataBulkNoAppend();
            CloseAddform();
            loading_close();
            if(a.Success=="true"){
                Nf.bgcolor="#4e73df";
                Nf.FooterLineColor="#e74a3b";
            }else{
                Nf.bgcolor="#e74a3b";
                Nf.FooterLineColor="#4e73df";
            }
            Nf.Notify(a.Message);
        });
    }else {
        UpdateData(self.attributes.action.baseURI,Data).then(function (a) {
            a=JSON.parse(a);
            DataLoadedCount=0;
            getDataBulkNoAppend();
            CloseAddform();
            loading_close();
            if(a.Success){
                Nf.bgcolor="#4e73df";
                Nf.FooterLineColor="#e74a3b";
            }else{
                Nf.bgcolor="#e74a3b";
                Nf.FooterLineColor="#4e73df";
            }
            Nf.Notify(a.Message);
        });
    }
    return false;
}
function getdataBulkAppent() {
    loading_open();
    let target=document.querySelector("#data-shower");
    let promise= getDataFromServerBulk(target.attributes.dataurl.baseURI,DataLoadedCount);
    promise.then(html=>{
        if(html !== false){
            target.innerHTML=target.innerHTML+html;
            DataLoadedCount+=10;
        }
        loading_close();
    })
}
function getdataBulkOnScroll(target) {

    if(target.scrollHeight-target.clientHeight===target.scrollTop){
        loading_open();
        let promise=getDataFromServerBulk(target.attributes.dataurl.baseURI,DataLoadedCount);
        promise.then(html=>{
            if(html !== false && html !== ""){
                target.innerHTML=target.innerHTML+html;
                DataLoadedCount+=10;
            }
            loading_close();
        })

    }
}
function getDataBulkNoAppend() {
    let target=document.querySelector("#data-shower");
    let promise= getDataFromServerBulk(target.attributes.dataurl.baseURI,DataLoadedCount);
    promise.then(html=>{
        if(html !== false){
            target.innerHTML=html;
            DataLoadedCount+=10;
        }
    })
}

function Delete(id) {
    popup("Are You Sure You Want to Delete","Yes I'm Sure","Cancel")
        .then(function (e) {
            loading_open();
            let target=document.querySelector("#data-shower");
            let promise= DeleteData(target.attributes.dataurl.baseURI,id);
                promise.then(function (result) {
                    result=JSON.parse(result);
                    DataLoadedCount=0;
                    getDataBulkNoAppend();
                    loading_close();
                    if(result.Success){
                        Nf.bgcolor="#4e73df";
                        Nf.FooterLineColor="#e74a3b";
                    }else{
                        Nf.bgcolor="#e74a3b";
                        Nf.FooterLineColor="#4e73df";
                    }
                    Nf.Notify(result.Message);
                });
        });
}
function EditData(id) {
    loading_open();
    let target=document.querySelector("#data-shower");
    let Data=GetDataById(target.attributes.dataurl.baseURI,id);
    Data.then((d)=>{
        d=JSON.parse(d);
        let Fields=document.querySelectorAll(".j_Field");
        Fields.forEach(function (Field) {
            if(Field.tagName==="TEXTAREA"){

                let F=CKEDITOR.instances[Field.name.toLowerCase()];
                if(F!==undefined){
                    F.insertHtml(d.Data[Field.name]);
                    return;
                }
                Field.innerHTML=d.Data[Field.name];
                return;
            }
            Field.value=d.Data[Field.name];
        });
        let formContainer=document.querySelector(".form-container");
        formContainer.querySelector("#id").value=id;
        OpenAddform(1);
        loading_close();
    });
}


function onSubmitEventMaker(){

   let addForm= document.querySelector(".addForm");
   addForm.addEventListener("submit",function (event) {
       event.preventDefault();

           SubmitData(this);


   });
}
getdataBulkAppent();
onSubmitEventMaker();
function getData(self) {
    let Data="";
    let Fields=self.querySelectorAll(".j_Field");
    Fields.forEach(function (Field  ) {
        if(Field.tagName==="TEXTAREA"){
            let F=CKEDITOR.instances[Field.name.toLowerCase()];
            if(F!==undefined){
                Field.value=F.getData();
            }

        }
        Data+=Field.name+"="+Field.value+"&&";
    });
    Data.slice(0, -2);
    return Data;
}