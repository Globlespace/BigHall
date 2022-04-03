/*************************Custom Conformer************************/
async function popup(CONTENT="",ACCEPT="Confirm",REJECT="Cancel") {
    const popup=document.querySelector(".popup");
    if(popup!=null){
        popup.style.transform="translate(-50%,0)";
        if(CONTENT!==""){
            popup.querySelector(".popup-content").innerHTML=CONTENT;
        }
        if(ACCEPT!==""){
            popup.querySelector("#confirm").innerHTML=ACCEPT;
            popup.querySelector("#confirm").style.display="unset";
        }
        if(ACCEPT=="!"){
            popup.querySelector("#confirm").style.display="none";
        }
        if(REJECT!==""){
            popup.querySelector("#cancel").style.display="unset";
            popup.querySelector("#cancel").innerHTML=REJECT;
        }
        if(REJECT=="!"){
            popup.querySelector("#cancel").style.display="none";
        }
        return  await new Promise(function (resolve,reject) {
            const confirm=document.querySelector("#confirm");
            const cancel=document.querySelector("#cancel");
            confirm.addEventListener("click",function () {
                popup.style.transform="translate(-50%,-110%)";
                resolve();
            });
            cancel.addEventListener("click",function () {
                popup.style.transform="translate(-50%,-110%)";
                reject();
            });
        });
    }
}

/*************************Notifier***********************/

class Notifier {
    constructor(NotificationWaitingTime=200){
        this.deltaTime=100;
        this.NotificationWaitingTime=NotificationWaitingTime;
        this.#CreateElements();
        this.#Design();
        this.#PutInDocument();
        this.#Close();
        this.NotificationTime= this.NotificationWaitingTime;
    }
    #CreateElements(){
        this.FullNotifier=document.createElement("div");
        this.NotifierBody=document.createElement("div");
        this.NotifierFooter=document.createElement("div");
        this.NotifierFooterLine=document.createElement("div");
    }
    #PutInDocument(){
        let FullNotifier = document.querySelector(".FullNotifier");
        if(FullNotifier === undefined || FullNotifier === null){
            document.body.appendChild(this.FullNotifier);
        }    }
    #SetDefaultParem(){
        this.bgcolor="#4e73df";
        this.x="20px";
        this.y="100px";
        this.FooterHeight="3px";
        this.FooterLineColor="red";
        this.TransistionTime=10;
        this.NotifierBodyColor="white";
        this.isFullyCompelete=true;

    }
    #Open =()=>{
        if(this.deltaTime>=0){
            this.FullNotifier.style.transform ="translateX(calc("+this.deltaTime+"%))";
            this.deltaTime-=this.TransistionTime;
            requestAnimationFrame(this.#Open);
        }else {
            this.deltaTime=0;
           this.#StartNotifierOpenTime();
        }

    }
    #Close=()=>{
        if(this.deltaTime<=100){
            this.FullNotifier.style.transform ="translateX(calc("+this.deltaTime+"% + "+this.x+"))";
            this.deltaTime+=this.TransistionTime;
            requestAnimationFrame(this.#Close);
        }else {
            this.deltaTime=100;
            this.isFullyCompelete=true;
        }
    }
    #Design(){
        this.#SetDefaultParem();
        this.#DesignFullNotifier();
        this.#DesignBody();
        this.#DesignFooter();
    }
    #DesignFullNotifier(){
        this.FullNotifier.classList.add("FullNotifier");
        this.FullNotifier.style.borderBottomLeftRadius="4px";
        this.FullNotifier.style.borderTopLeftRadius="4px";
        this.FullNotifier.style.minWidth="200px";
        this.FullNotifier.style.maxWidth="500px";
        this.FullNotifier.style.minHeight="50px";
        this.FullNotifier.style.display="flex";
        this.FullNotifier.style.flexDirection="column";
        this.FullNotifier.style.position="fixed";
        this.FullNotifier.appendChild(this.NotifierBody);
        this.FullNotifier.appendChild(this.NotifierFooter);
        this.FullNotifier.style.backgroundColor=this.bgcolor;
        this.FullNotifier.style.top=this.y;
        this.FullNotifier.style.right=this.x;
    }
    #DesignBody(){
        this.NotifierBody.classList.add("NotifierBody");
        this.NotifierBody.style.width="100%";
        this.NotifierBody.style.color=this.NotifierBodyColor;
        this.NotifierBody.style.padding="10px 20px";
        this.NotifierBody.style.fontSize="1rem";
        this.NotifierBody.style.height="calc("+this.FullNotifier.style.minHeight+" - "+this.FooterHeight+")";
    }
    #DesignFooter(){
        this.NotifierFooter.classList.add("NotifierFooter");
        this.NotifierFooter.style.width="100%";
        this.NotifierFooter.style.height=this.FooterHeight;
        this.NotifierFooter.style.backgroundColor="#0000006b";
        this.NotifierFooterLine.style.width="0%";
        this.NotifierFooterLine.style.height="100%";
        this.NotifierFooterLine.style.backgroundColor=this.FooterLineColor;
        this.NotifierFooterLine.style.cssFloat="right";
        this.NotifierFooter.style.borderBottomLeftRadius="4px";
        this.NotifierFooter.appendChild(this.NotifierFooterLine);

    }
    #StartNotifierOpenTime=()=>{
        if(this.NotificationTime>=0){
            this.#StartNotifierTimer();
            this.NotificationTime--;
            requestAnimationFrame(this.#StartNotifierOpenTime);
        }else {
            this.NotificationTime=this.NotificationWaitingTime;
           this.#Close();
        }
    }
    #StartNotifierTimer(){
        this.NotifierFooterLine.style.width=(this.NotificationTime/this.NotificationWaitingTime)*100+"%";
    }
    Notify(Content){
        if(this.isFullyCompelete){
            this.isFullyCompelete=false;
            this.NotifierBody.innerHTML=Content;
            this.#Open();
        }

    }
}



/*********************** loader *********************/

function loading_open() {
    let loader=document.querySelector(".loader");
    loader.classList.add("open");
}
function loading_close() {
    let loader=document.querySelector(".loader");
    loader.classList.remove("open");
}