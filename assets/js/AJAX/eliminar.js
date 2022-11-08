//obtengo el controlador a travez de la URL
let controller = window.location.pathname.slice(1).split('/').filter((path) => path !== 'Proyecto')[0]
const data = {
  controlador: controller,
  metodo: form.dataset.eliminar //obtengo la funcion de eliminar a travez de las etiquetas data
}

document.addEventListener("DOMContentLoaded", function() {

  const boton = document.querySelectorAll('.eliminar')

  boton.forEach(boton => {
    boton.addEventListener('click', (e) => {
      let respuesta = confirm('¿Esta seguro de eliminar esta entidad?')
      let id = boton.dataset.id;
      if (respuesta) {
        //solicitud AJAX
        let url = 'http://localhost/Proyecto/' + data['controlador'] + '/' + data['metodo'] + '/' + id

        httpRequest(url, function() {
          const tbody = document.querySelector("#tbody-" + data['controlador'])
          const fila = document.querySelector("#fila-" + id)
          tbody.removeChild(fila);
          checkFilas();

        })
      } else {
        e.preventDefault()
      }
    })
  })
})
//Function encargada de comunicarse con el servidor
function httpRequest(url, callback) {
  const http = new XMLHttpRequest(); //objeto que nos permite hacer requests

  http.open("GET", url)
  http.send()

  http.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      callback.apply(http)
    }
  }
}

//function para ver si hay entradas en la tabla
function checkFilas () {
  const boton = document.querySelectorAll('.eliminar')

  if ( !boton[0] ) {

    const tbody = document.querySelector("#tbody-" + data['controlador'])
    const box = document.querySelector(".bottom")

    p.appendChild(text);
    box.before(p)
    p.classList.add('vacio')
  }
}

checkFilas();
