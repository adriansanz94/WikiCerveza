

let datos = [];
let uri =  'https://127.0.0.1:8000/verMasJson';

let boton = document.getElementById('verMas');
boton.addEventListener('click',obtenerCervezas);

let arraySeleccionado = [];

function obtenerCervezas(){
    peticion(uri);
    rellenarTabla();
}

function peticion(uri){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4) {
            if(xhr.status === 200) {
                datos = exito(xhr);
                console.log(datos);

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

function rellenarTabla(){
    let tablaBody = document.getElementsByTagName('tbody')[0];

    //let tdCategoria = document.createElement('td');
    //let tdEtiqueta = document.createElement('td');

    //tdNombre.innerHTML = 'jack sparrow';

    //trNueva.appendChild(tdNombre);
    //tablaBody.appendChild(trNueva);

    //console.log(tablaBody);
    console.log("estoy fuera del for");
    console.log(datos.length);

    for(let indice = 0; indice < datos.length; indice ++){
        let trNueva = document.createElement('tr');
        let tdNombre = document.createElement('td');
        let tdGraduacion = document.createElement('td');

        console.log("estoy dentro del for");
        console.log(datos[indice]);
        tdNombre.innerHTML = datos[indice].nombre;
        tdGraduacion.innerHTML = datos[indice].graduacion;

        trNueva.appendChild(tdNombre);
        trNueva.appendChild(tdGraduacion);

        tablaBody.appendChild(trNueva);
    }

    }
    function obtener3(id){
        for (let indice = 0; indice > datos.length; indice++){
            arraySeleccionado[indice] = datos[indice];
        }
    }