function ajaxRegistrar(datos){
  $.ajax({
            type: "POST",
            url: "?url=avanzada&opcion=registrarRol",
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
 $("#formularioRol").on('submit', function(e){
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
      validarExistencia()
    }
    
  })
function ajaxModificar(datos){
    $.ajax({
      type: "POST",
      url: "?url=avanzada&opcion=modificarRol",
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

$("#modificarRol").on('submit', function(e){
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
      validarExistenciaModificar();
    }
  })

function eliminarRol(id){
              Swal.fire({
                title: '¿Deseas realmente eliminar éste rol?',
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
                    url: "?url=avanzada&opcion=eliminarRol",
                    data: 'id=' + btoa(id),
                    beforeSend: function(){
                    },
                    success: function(respuesta){
                      console.log(respuesta);
                        Swal.fire(
                          '¡Eliminado!',
                          'El rol ha sido eliminado con exito',
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
                      'El rol ha sido salvado.',
                      'error'
                      )

                }
              })
            }


function validarExistenciaModificar(){
    expresionNombre = /^[a-z ,.'-]+$/i;
    var dato = $('.show input[name=rol]').val();
    if (expresionNombre.test(dato)) {
    var verificar = true;
    $.ajax({
      type: "POST",
      url: "?url=avanzada&opcion=validar",
      data: ('rol=' + dato + '&verificar=' + verificar),
      beforeSend: function () {
        $('#imagen').show();
        $('.mensajes').html('Verificando...');

      },
      success: function (respuesta) {
        const split = respuesta.split('%%');

        $('#imagen').hide();
            if (split[1] == "0") {
              $('.show .mensajes').html('Verificado correctamente');
              $('.show input[name=rol]').css('borderColor', '#92FF89');
              $('.show input[name=rol]').css('background', 'white');
             ajaxModificar(datos);
            }else{
              $('.show .mensajes').html('¡Error! el nombre ya existe.');
              $('.show input[name=rol]').css('borderColor', 'red');
              $('.show input[name=rol]').css('background', '#ED9785');
             return false;
            }
      }
    })
    }else{
      $('.mensajes').html('¡Error! Formato del nombre es incorrecto.');
      document.getElementById("rol").style.borderColor = "red";
      document.getElementById("rol").style.background = "#ED9785";
      document.getElementById("submit").style.background = "red";
      return false;
    }
};
function validarExistencia(){
    expresionNombre = /^[a-z ,.'-]+$/i;
    var dato = $('.show input[name=rol]').val();
    if (expresionNombre.test(dato)) {
    var verificar = true;
    $.ajax({
      type: "POST",
      url: "?url=avanzada&opcion=validar",
      data: ('rol=' + dato + '&verificar=' + verificar),
      beforeSend: function () {
        $('#imagen').show();
        $('.mensajes').html('Verificando...');

      },
      success: function (respuesta) {
        const split = respuesta.split('%%');

        $('#imagen').hide();
            if (split[1] == "0") {
              $('.show .mensajes').html('Verificado correctamente');
              $('.show input[name=rol]').css('borderColor', '#92FF89');
              $('.show input[name=rol]').css('background', 'white');
             ajaxRegistrar(datos);
            }else{
              $('.show .mensajes').html('¡Error! el nombre ya existe.');
              $('.show input[name=rol]').css('borderColor', 'red');
              $('.show input[name=rol]').css('background', '#ED9785');
             return false;
            }
      }
    })
    }else{
      $('.mensajes').html('¡Error! Formato del nombre es incorrecto.');
      document.getElementById("rol").style.borderColor = "red";
      document.getElementById("rol").style.background = "#ED9785";
      document.getElementById("submit").style.background = "red";
      return false;
    }
};