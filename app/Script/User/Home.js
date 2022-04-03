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
function LoadGridData(target) {
    if(target.scrollHeight-target.clientHeight===target.scrollTop){

    }
}

LoadThreeGrid();
LoadFourGrid();