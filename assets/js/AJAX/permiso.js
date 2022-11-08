$(function() {
       $('#submit').on('click', function(e){
        e.preventDefault();

        if (validar()) {
        var trabajador = $('#trabajador').val();
        var desde = $('#desde').val();
        var hasta = $('#hasta').val();
        var descripcion = $('#descripcion').val();
        $.ajax({
          type: "POST",
          url: "http://localhost/Proyecto/permiso/registrar",
          data: ('trabajador=' + trabajador + '&desde='+ desde + '&hasta='+ hasta+ '&descripcion='+ descripcion),
          beforeSend: function(){
            $('#imagen').show();
            $('#mensajes').html('Procesando datos...');
          },
          success: function(respuesta){
            $('#imagen').hide();
            if (respuesta == 1) {
              $('#mensajes').html('Se ha registrado exitosamente.');
              $('#trabajador').val('');
              $('#desde').val('');
              $('#hasta').val('');
              $('#descripcion').val('');
            }else{
              $('#mensajes').html('¡Error! no se registró.');
            }
          }
        })
        }
      })
})
function validar(){
  var trabajador, descripcion, desde, hasta;
  trabajador = document.getElementById("trabajador").value;
  descripcion = document.getElementById("descripcion").value;
  desde = document.getElementById("desde").value;
  hasta = document.getElementById("hasta").value;
  if (trabajador === "0") {
    alert("Debe seleccionar un trabajador.")
 
    return false;
  }else{
    if (descripcion === "0") {
        alert("Seleccione el tipo.")
        
        return false;
    }else{
          if (desde === "") {
        alert("Ingrese la fecha donde comineza el permiso")
       
        return false;
      }else{
         if (hasta === "") {
          alert("Ingrese la fecha donde termina el permiso.")
          
          return false;
        }else{
           if (desde > hasta) {
            alert("La fecha de cominezo no puede ser mayor a la que termina.")
            
            return false;

          }else{
            return true;
          }
        }
      }
    }
  }

}
/* 
##### ACTUALIZACIÓN AJAX ########
*/


$(document).ready(function () {
  $('body').on('click', '.editar', function (e) {
    e.preventDefault();
    postData($(this).attr('href')).then((data)=> {

      $("#idPermiso").val(data.id)
      $("#desdeModificar").val(data.desde)
      $("#hastaModificar").val(data.hasta)
      $("#descripcionModificar").val(data.descripcion)
      $("#datosTrabajador").val(data.nombre + ' ' + data.apellido)
      $('#modal_actualizar').modal('show')
    })
  });


  $("#submitModificar").on('click', function (e) {
    e.preventDefault();
   
      if (validarModificacion()) {
    let form = $("#formularioModificarPermiso")[0];

    console.log(form)

    var data = new FormData(form);

    data.append('ajax',true)


    $("#submitModificar").prop("disabled", true);

    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: "http://localhost/Proyecto/permiso/modificarPermiso",
      processData: false,
      contentType: false,
      data: data,
      beforeSend: function () {
        $('#imagenModificar').show();
        $('#mensajesModificar').html('Procesando datos...');
      },
      success: function (data) {
        $('#imagenModificar').hide();
        $('#mensajesModificar').html('Se ha modificado exitosamente.');
        console.log("SUCCESS : ", data);
        $("#submitModificar").prop("disabled", false);

      },
      error: function (e) {
        $('#imagenModificar').hide();
        $('#mensajesModificar').html(e);
        $("#submitModificar").prop("disabled", false);

      }
    });
      }
    
    
    
  })
})


async function postData(url = '', data=[]) {
            
  const response = await fetch(url, {
    method: 'POST', 
    mode: 'cors', 
    cache: 'no-cache', 
    credentials: 'same-origin', 
    redirect: 'follow', 
    referrerPolicy: 'no-referrer', 
    body: data
  });
  return response.json(); 
}
function validarModificacion(){
  var trabajador, descripcion, desde, hasta;
  trabajador = document.getElementById("datosTrabajador").value;
  descripcion = document.getElementById("descripcionModificar").value;
  desde = document.getElementById("desdeModificar").value;
  hasta = document.getElementById("hastaModificar").value;
  if (trabajador === "0") {
    alert("Debe seleccionar un trabajador.")
 
    return false;
  }else{
    if (descripcion === "0") {
        alert("Seleccione el tipo.")
        
        return false;
    }else{
          if (desde === "") {
        alert("Ingrese la fecha donde comineza el permiso")
       
        return false;
      }else{
         if (hasta === "") {
          alert("Ingrese la fecha donde termina el permiso.")
          
          return false;
        }else{
           if (desde > hasta) {
            alert("La fecha de cominezo no puede ser mayor a la que termina.")
            
            return false;

          }else{
            return true;
          }
        }
      }
    }
  }

}