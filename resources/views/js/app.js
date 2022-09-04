const Http = new XMLHttpRequest();
const url = 'http://localhost/api/seccions/showSeccion';
const seccion = document.querySelector("#seccion");

Http.open("GET", url);
Http.send();

Http.onreadystatechange = (e)=>{
    seccion.value = Http.responseText.valueOf();
    console.log(Http.responseText)
}
