$("#cedula").blur(function () {
    expresionCedula = /^[0-9]{5,9}$/;
    var dato = $('#cedula').val();
    if (expresionCedula.test(dato)) {
    var verificar = true;
    $.ajax({
      type: "POST",
      url: "?url=trabajador&opcion=validar",
      data: ('cedula=' + dato + '&verificar=' + verificar),
      beforeSend: function () {
        $('#imagen').show();
        $('.mensajes').html('Verificando...');

      },
      success: function (respuesta) {
        const split = respuesta.split('%%');

        $('#imagen').hide();
            if (split[1] == "0") {
              $('.show .mensajes').html('Verificado correctamente');
              document.getElementById("cedula").style.borderColor = "#92FF89";
              document.getElementById("cedula").style.background = "white";
              document.getElementById("submit").style.background = "#198754";
              $('#submit').prop('disabled', false);
            }else{
              $('.show.mensajes').html('¡Error! la cedula ya existe.');
              document.getElementById("cedula").style.borderColor = "red";
              document.getElementById("cedula").style.background = "#ED9785";
              document.getElementById("submit").style.background = "red";
              $('#submit').prop('disabled', true);
            }
      }
    })
    }else{
      $('.mensajes').html('¡Error! Formato de la cedula incorrecto.');
      document.getElementById("cedula").style.borderColor = "red";
      document.getElementById("cedula").style.background = "#ED9785";
      document.getElementById("submit").style.background = "red";
      $('#submit').prop('disabled', true);
    }
  });
function ajaxRegistrar(datos){
  $.ajax({
            type: "POST",
            url: "?url=trabajador&opcion=registroTrabajador",
            data: datos,
            beforeSend: function(){
              $('#imagen').show();
              $('.mensajes').html('Procesando datos...');
            },
            success: function(respuesta){
              console.log(respuesta);
              let resp = respuesta.split('%');
              $('#imagen').hide();
              if (resp[1] == 1) {
                $('.mensajes').html('Se ha registrado exitosamente.');
                Swal.fire(
                  '¡Registrado!',
                  'Se ha registrado con exito.',
                  'success'
                  ).then(() => {
                    // Aquí la alerta se ha cerrado
                    window.location.reload();
                });
                
              }else{
                Swal.fire(
                  'Oppss..!',
                  'Lo lamentamos, ocurrió un error al intentar registrar.',
                  'error'
                  )
              }
            }
          })
}
function ajaxModificar(datos){
    $.ajax({
      type: "POST",
      url: "?url=trabajador&opcion=modificarTrabajador",
      data: datos,
      beforeSend: function(){
        $('#imagen').show();
        $('.mensajes').html('Procesando datos...');
      },
      success: function(respuesta){
        console.log(respuesta);
        let resp = respuesta.split('%');
        $('#imagen').hide();
        if (resp[1] == 1) {
          $('.mensajes').html('Se ha modificado exitosamente.');
          Swal.fire(
            '¡Modificado!',
            'Se ha modificado con exito.',
            'success'
            ).then(() => {
              //Aquí la alerta se ha cerrado
              window.location.reload();

          });
        }else{
          Swal.fire(
            'Oppss..!',
            'Lo lamentamos, ocurrió un error al intentar modificar.',
            'error'
            )
        }
      }
    })
 }

$(".formulario_registrar").on('submit', function(e){
    e.preventDefault();
    var n = 0;
      fields = $(this).serializeArray();
      datos = {};
      jQuery.each(fields, function(i, item){
        datos[item['name']]=btoa(item['value']);
        if (validaVacio(item['value'])) {
          $('.show input[name='+item['name']+']').css('borderColor', 'red');
          n++;
        }else{
          $('.show input[name='+item['name']+']').css('borderColor', '#ced4da');
        }
      });
    if (n > 0) {
      Swal.fire('Oppss..!','¡Error! Todos los campos son obligatorios.','error')
      return false; 
    }else{
      if (expresion_fecha_ingreso(datos)&&expresion_fecha_nacimiento(datos) &&expresion_celular(datos)
        && expresion_cedula(datos)&&expresion_correo(datos) &&expresion_nombre(datos)
        && expresion_apellido(datos)) {
          ajaxRegistrar(datos);
      }
    }
})
$(".formulario_modificar").on('submit', function(e){
    e.preventDefault();
    var n = 0;
      fields = $(this).serializeArray();
      datos = {};
      jQuery.each(fields, function(i, item){
        datos[item['name']]=btoa(item['value']);
        if (validaVacio(item['value'])) {
          $('.show input[name='+item['name']+']').css('borderColor', 'red');
          n++;
        }else{
          $('.show input[name='+item['name']+']').css('borderColor', '#ced4da');
        }
      });
    if (n > 0) {
      Swal.fire('Oppss..!','¡Error! Todos los campos son obligatorios.','error')
      return false; 
    }else{
      if (expresion_fecha_ingreso(datos)&&expresion_fecha_nacimiento(datos) &&expresion_celular(datos)
        && expresion_cedula(datos)&&expresion_correo(datos) &&expresion_nombre(datos)
        && expresion_apellido(datos)) {
        ajaxModificar(datos);
      }
    }
})





function eliminar(id){
              Swal.fire({
                title: '¿Deseas realmente eliminar éste trabajador?',
                text: "¡No podrás revertir éste paso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡eliminar!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    type: "POST",
                    url: "?url=trabajador&opcion=eliminar",
                    data: 'id=' + btoa(id),
                    beforeSend: function(){
                    },
                    success: function(respuesta){
                      console.log(respuesta);
                        Swal.fire(
                          '¡Eliminado!',
                          'El trabajador ha eliminado con exito',
                          'success'
                          ).then(() => {
                            // Aquí la alerta se ha cerrado
                            window.location.reload();
                        }); 
                    }
                  })
                } else {

                  Swal.fire(
                      '¡Eliminación cancelada!',
                      'El trabajador ha sido salvado.',
                      'error'
                      )

                }
              })
            }
