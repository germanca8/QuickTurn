/*
const API_URL = "http://localhost/api";

const HTMLResponse = document.querySelector("#app");
const seccionName = document.querySelector("#seccionName");

const peticionAjax = async function (event) {
    const contenido = new URLSearchParams();
    const respuesta = fetch(R.ruta1, {
        method: "GET",
    });
    const datos = (await respuesta).text();
    seccionName.innerText = `${datos[0]["nombreSeccion"]}`
}
peticionAjax();
/*
fetch('http://localhost/api/seccions/0138049a-213a-4c1b-a4af-9cc3f5e79e3b/showSeccion')
    .then((response)=> response.json())
    .then(data => {
        console.log(data.nombreSeccion)
    });


const Http = new XMLHttpRequest();
const url = 'http://localhost/api/seccions/showSeccion';
Http.open("GET", url);
Http.send();

Http.onreadystatechange = (e)=>{
    console.log(Http.responseText)
}
 */
