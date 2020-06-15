

let datos;
let uri =  'https://127.0.0.1:8000/verMasJson/';

let boton = document.getElementById('verMas');
boton.addEventListener('click',obtenerCervezas);

let arraySeleccionado = [];

function obtenerCervezas(){
    let numero = compruebaOffset();
    let uriNueva = uri + numero;
    peticion(uriNueva);
}
function compruebaOffset(){
    let numero=0;
    let tr = document.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    numero = tr.length;
    return numero;
}
function peticion(uri){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4) {
            if(xhr.status === 200) {
                //datos = exito(xhr);
                rellenarTabla(exito(xhr));
            }else{
                error(xhr);
            }
        }
    }
    xhr.open('GET',uri);
    xhr.send();
}

function exito(text){
    return JSON.parse(text.response);
}

function error(xhr){
    return `Error: ${xhr.status} (${xhr.statusText})`;
}

function rellenarTabla(cosas){

    let tablaBody = document.getElementsByTagName('tbody')[0];
    datos = cosas.cervezas;

    //console.log(tablaBody);
    console.log("estoy fuera del for");
    console.log(datos);
    console.log(cosas);
    console.log(datos.length);

    for(let indice = 0; indice < datos.length; indice ++){
        let trNueva = document.createElement('tr');
        let tdNombre = document.createElement('td');
        let tdGraduacion = document.createElement('td');
        let tdCategoria = document.createElement('td');
        let tdEtiquetas = document.createElement('td');
        let a = document.createElement('a');
        console.log(datos[indice].id);
        let idCerve = datos[indice].id;

        console.log("estoy dentro del for");
        console.log(datos[indice]);

        a.setAttribute('href',`Cerveza`+idCerve);
        a.innerHTML = datos[indice].nombre;

        tdGraduacion.innerHTML = datos[indice].graduacion;
        tdCategoria.innerHTML = datos[indice].categoria;
        tdEtiquetas.innerHTML = datos[indice].etiquetas;

        tdNombre.appendChild(a);

        trNueva.appendChild(tdNombre);
        trNueva.appendChild(tdGraduacion);
        trNueva.appendChild(tdCategoria);
        trNueva.appendChild(tdEtiquetas);

        tablaBody.appendChild(trNueva);
    }

    }
    function obtener3(id){
        for (let indice = 0; indice > datos.length; indice++){
            arraySeleccionado[indice] = datos[indice];
        }
    }