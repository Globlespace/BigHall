let ThredGridLoaded=0;
let FourGridLoaded=0;
function LoadThreeGrid() {
    LoadData(
        HTTP_HOST+"ThreeGrid/"+ThredGridLoaded,
        function (Data) {
            let ThreeGrig=document.querySelector(".grid");
            if(Data !== false && Data !== ""){
                ThreeGrig.innerHTML=ThreeGrig.innerHTML+Data;
                ThredGridLoaded+=4;
            }
        }
    );
}
function LoadFourGrid() {
    LoadData(
        HTTP_HOST+"FourGrid/"+FourGridLoaded,
        function (Data) {
            let FourGrig=document.querySelector(".grid");
            if(Data !== false && Data !== ""){
                FourGrig.innerHTML=FourGrig.innerHTML+Data;
                FourGridLoaded+=4;
            }
        }
    );
}
function LoadThreeAndFourGridRandomly() {
    if(Math.round(Math.random())===0){
        LoadThreeGrid();
    }else {
        LoadFourGrid();
    }
}
function LoadGridData(target) {
    if(target.scrollHeight-target.clientHeight<=target.scrollTop){
        LoadThreeAndFourGridRandomly();

    }
}
function OnBodyScrollEventMaker(){
   let body= document.querySelector("body");
    body.addEventListener("scroll",function (event) {
        LoadGridData(event.target);
    });
}
LoadThreeGrid();
LoadFourGrid();
OnBodyScrollEventMaker();