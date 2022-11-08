$("#nombre_cargo").blur(function () {
    expresionNombre = /^[a-z ,.'-]+$/i;
    var dato = $('#nombre_cargo').val();
    if (expresionNombre.test(dato)) {
    var verificar = true;
    $.ajax({
      type: "POST",
      url: "?url=cargo&opcion=validar",
      data: ('nombre_cargo=' + dato + '&verificar=' + verificar),
      beforeSend: function () {
        $('#imagen').show();
        $('.mensajes').html('Verificando...');

      },
      success: function (respuesta) {
        const split = respuesta.split('%%');

        $('#imagen').hide();
            if (split[1] == "0") {
              $('.show .mensajes').html('Verificado correctamente');
              document.getElementById("nombre_cargo").style.borderColor = "#92FF89";
              document.getElementById("nombre_cargo").style.background = "white";
              document.getElementById("submit").style.background = "#198754";
              $('#submit').prop('disabled', false);
            }else{
              $('.show .mensajes').html('¡Error! el nombre ya existe.');
              document.getElementById("nombre_cargo").style.borderColor = "red";
              document.getElementById("nombre_cargo").style.background = "#ED9785";
              document.getElementById("submit").style.background = "red";
              $('#submit').prop('disabled', true);
            }
      }
    })
    }else{
      $('.mensajes').html('¡Error! Formato del nombre es incorrecto.');
      document.getElementById("nombre_cargo").style.borderColor = "red";
      document.getElementById("nombre_cargo").style.background = "#ED9785";
      document.getElementById("submit").style.background = "red";
      $('#submit').prop('disabled', true);
    }
});
function ajaxRegistrar(datos){
  $.ajax({
            type: "POST",
            url: "?url=cargo&opcion=registrar",
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
      url: "?url=cargo&opcion=modificar",
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
      if (expresion_sueldo(datos)&&expresion_prima(datos)) {
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
      if (expresion_sueldo(datos)&&expresion_prima(datos)) {
        ajaxModificar(datos);
      }
    }
})
  
function eliminar(id){
              Swal.fire({
                title: '¿Deseas realmente eliminar este elemento?',
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
                    url: "?url=cargo&opcion=eliminar",
                    data: 'id=' + btoa(id),
                    beforeSend: function(){
                    },
                    success: function(respuesta){
                      console.log(respuesta);
                        Swal.fire(
                          '¡Eliminado!',
                          'El elemento se ha eliminado con exito',
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
                      'El Elemento ha sido salvado.',
                      'error'
                      )

                }
              })
}
