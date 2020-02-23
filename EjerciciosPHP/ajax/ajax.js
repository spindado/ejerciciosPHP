/*const mostrar = () => {
    console.log("click");
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            document.getElementById('pinta').innerHTML = xhr.responseText;
        }
    }
    //xhr.open("GET", "php.php?objeto=hola", true);
    //xhr.send();
    let parametros = "hola";
    xhr.open("POST", "php.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("objeto="+parametros);
};*/

//GET FETCH
/*async function mostrar() {
    let promiseResponse = await fetch("php.php?objeto='hola'");
    const content = await promiseResponse.text();
    document.getElementById('pinta').innerHTML = content;
}*/

//POST FETCH
async function mostrar() {
    // FUNCIONA
    var data = new FormData();
    data.append("objeto","hola");
    let promiseResponse = await fetch("./php.php", {method: "POST", body: data});
    const content = await promiseResponse.text();
    

    document.getElementById('pinta').innerHTML = content;
}

document.getElementById('submit').addEventListener("click", mostrar);