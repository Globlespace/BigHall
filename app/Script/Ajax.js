
/***********************Ajax Function***********************/
async function Ajax(METHOD="POST",URL,DATA){
    return await new  Promise((resolve,reject)=>{
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState === 4 ) {
                if (this.status === 200) {
                    resolve(this.responseText);
                } else {
                    reject(this.status);
                }
            }
        };
        xhttp.open(METHOD, URL, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(DATA);

    });
}