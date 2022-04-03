
function LoadData(url, jsondata) {
    const xhttp=new XMLHttpRequest();
    xhttp.onload = function() {
        jsondata(this.responseText);
    }
    xhttp.open("GET", url);
    xhttp.send();
}
function SendData(url, jsondata, data) {
    const xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState === 4 ) {
            if (this.status === 200) {
                jsondata(JSON.parse(this.responseText));
            }
        }
    }
    xhttp.open("POST", url);
    xhttp.send(data);
}
