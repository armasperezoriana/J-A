         // Initialize the DataTable
        $(document).ready(function() {
      $('#tableID').DataTable({
        
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      });

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
              $('.mensajes').html('Verificado correctamente');
              document.getElementById("nombre_cargo").style.borderColor = "#92FF89";
              document.getElementById("nombre_cargo").style.background = "white";
              document.getElementById("submit").style.background = "#198754";
              $('#submit').prop('disabled', false);
            }else{
              $('.mensajes').html('¡Error! el nombre ya existe.');
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

      
  $(".formulario_modificar").on('submit', function(e){
    e.preventDefault();
    fields = $(this).serializeArray();
        datos = {};
        jQuery.each(fields, function(i, item){
            datos[item['name']]=item['value'];
        });
    
    $.ajax({
      type: "POST",
      url: "?url=security&opcion=modificar",
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
            'El cargo se ha sido modificado con exito.',
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
    
  })

         $(".formulario_registrar").on('submit', function(e){
          e.preventDefault();
          fields = $(this).serializeArray();
              datos = {};
              jQuery.each(fields, function(i, item){
                  datos[item['name']]=item['value'];
              });

        if (/*validar()*/2>1) {
          $.ajax({
            type: "POST",
            url: "?url=security&opcion=registrar",
            data: datos,
            beforeSend: function(){
              $('#imagen').show();
              $('.mensajes').html('Procesando datos...');
            },
            success: function(respuesta){
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
      })

});


      function validar() {
        
        
        var cargo = $('#cargo').val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var cedula = $('#cedula').val();
        var correo = $('#correo').val();
        var fecha = $('#fecha').val();
        var t_celular = $('#t_celular').val();
        var celular = $('#celular').val();
        var fecha_nacimiento = $('#fecha_nacimiento').val();
        if(expresion_cedula(cedula) && expresion_nombre(nombre) && expresion_apellido(apellido) && expresion_correo(correo) && 
        expresion_celular(celular) && expresion_fecha_nacimiento(fecha_nacimiento) && expresion_fecha_ingreso(fecha)){

          return true;
        }else{
          Swal.fire(
            'Oppss..!',
            'Debe llenar todos los campos.',
            'error'
           )
          return false;
        }
      }
      function expresion_fecha_ingreso(fecha){
        if (fecha == null ||fecha =="" ) {
          $('.mensajes').html('¡Error! Formato de la fecha de ingreso incorrecto.'); 
          document.getElementById("fecha").style.borderColor = "red";
          return false;
        }else{
          $('.mensajes').html('');
          document.getElementById("fecha").style.borderColor = "#ced4da"; 
          return true;
        }
      }
      function expresion_fecha_nacimiento(fecha_nacimiento){
        if (fecha_nacimiento == null ||fecha_nacimiento =="" ) {
          document.getElementById("fecha_nacimiento").focus();
          $('.mensajes').html('¡Error! Formato de la fecha de nacimiento incorrecto.'); 
          document.getElementById("fecha_nacimiento").style.borderColor = "red";
          return false;
        }else{
          $('.mensajes').html('');
          document.getElementById("fecha_nacimiento").style.borderColor = "#ced4da"; 
          return true;
        }
      }
      function expresion_celular(celular){
        expresionCelular = /^[0-9]{7,9}$/;
        if (!expresionCelular.test(celular)) {
          document.getElementById("celular").focus();
          $('.mensajes').html('¡Error! Formato del numero celular incorrecto.');
          document.getElementById("celular").style.borderColor = "red";
          return false;
        }else{
          $('.mensajes').html(' ');
          document.getElementById("celular").style.borderColor = "#ced4da"; 
          return true;
        }
      }
      function expresion_cedula(cedula){
        expresionCedula = /^[0-9]{5,9}$/;
        if (!expresionCedula.test(cedula)) {
          document.getElementById("cedula").focus();
          $('.mensajes').html('¡Error! Formato de la cedula incorrecto.');
          document.getElementById("cedula").style.borderColor = "red";
          return false;
        }else{
          $('.mensajes').html(' ');
          document.getElementById("cedula").style.borderColor = "#ced4da"; 
          return true;
        }
      }
      function expresion_correo(correo){
        expresionCorreo = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
        if (!expresionCorreo.test(correo)||correo.length < 3) {
          document.getElementById("correo").focus();
          $('.mensajes').html('¡Error! Formato del correo incorrecto.');
          document.getElementById("correo").style.borderColor = "red";
          return false;
        }else{
          $('.mensajes').html(' ');
          document.getElementById("correo").style.borderColor = "#ced4da"; 
          return true;
        }
      }
      function expresion_nombre(nombre){
        expresionNombre = /^[a-z ,.'-]+$/i;
        if (!expresionNombre.test(nombre)||nombre.length < 3) {
          document.getElementById("nombre").focus();
          $('.mensajes').html('¡Error! Formato del nombre incorrecto.');
          document.getElementById("nombre").style.borderColor = "red";
          return false;
        }else{
          $('.mensajes').html(' ');
          document.getElementById("nombre").style.borderColor = "#ced4da"; 
          return true;
        }
      }
      function expresion_apellido(apellido){
        expresionNombre = /^[a-z ,.'-]+$/i;
        if (!expresionNombre.test(apellido)||apellido.length < 3) {
          document.getElementById("apellido").focus();
          $('.mensajes').html('¡Error! Formato del apellido incorrecto.');
          document.getElementById("apellido").style.borderColor = "red";
          return false;
        }else{
          $('.mensajes').html(' ');
          document.getElementById("apellido").style.borderColor = "#ced4da";
          return true;
        }
      }
      function confirmarModificar(){
              Swal.fire({
                title: '¿Deseas realmente modificar éste trabajador?',
                text: "¡No podrás revertir éste paso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡actualizar!'
              }).then((result) => {
                if (result.isConfirmed) {

                  var form = $('#modificar');
                  form.submit(); 

                }
              })
            }
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
                    url: "?url=security&opcion=eliminar",
                    data: 'id=' + id,
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
            function respaldar(){
              Swal.fire({
                title: '¿Deseas realmente respaldar la base de datos?',
                text: "¡No podrás revertir éste paso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡Respaldar!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    type: "POST",
                    url: "?url=gestionBD&opcion=respaldar",
                    beforeSend: function(){
                      $('#imagen').show();
                      $('.mensajes').html('Realizando copia de seguridad...');
                    },
                    success: function(respuesta){
                       $('#imagen').hide();
                       $('.mensajes').html('');
                      if (respuesta == 1) {
                        console.log(respuesta);
                        Swal.fire(
                          '¡Respaldado!',
                          'Se ha realizado una copia de seguridad',
                          'success'
                          ).then(() => {
                            // Aquí la alerta se ha cerrado
                            window.location.reload();
                        }); 
                        }else{
                       Swal.fire(
                      '¡Error!',
                      'No se logró realizar la copia de seguridad.',
                      'error'
                      )
                        }
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



    $("#formulario_restore").on('submit', function(e){
    e.preventDefault();
    fields = $(this).serializeArray();
        datos = {};
        jQuery.each(fields, function(i, item){
            datos[item['name']]=item['value'];
        });
    $.ajax({
      type: "POST",
      url: "?url=gestionBD&opcion=restaurar",
      data: datos,
      beforeSend: function(){
        $('#imagenRestore').show();
        $('.mensajes').html('Cargando datos...');
      },
      success: function(respuesta){
        $('#imagenRestore').hide();
        if (respuesta == 1) {
          $('.mensajes').html('Se ha restablecido la base de datos');
          Swal.fire(
            '¡Restore!',
            'Base de datos restablecida correctamente.',
            'success'
            ).then(() => {
              //Aquí la alerta se ha cerrado
              window.location.reload();

          });
        }else{
          Swal.fire(
            'Oppss..!',
            'Lo lamentamos, ocurrió un error al intentar restablecer la BD.',
            'error'
            )
        }
      }
    })
    
  })
      $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })


        $("#formularioPreguntasSeguridad").on('submit', function(e){
          e.preventDefault();

        if (validarPreguntasSeguridad()) {
          
          var preguntaUno = $('#pregunta_one').val();
          var respuestaUno = $('#respuesta_one').val();
          var preguntaDos = $('#pregunta_two').val();
          var respuestaDos = $('#respuesta_two').val();
          var preguntaTres = $('#pregunta_tre').val();
          var respuestaTres = $('#respuesta_tre').val();
          var firmaDigital = $('#nickname').val();

          $.ajax({
            type: "POST",
            url: "?url=seguridad&opcion=addQuestion",
            data: ('pregunta_one=' + preguntaUno + '&respuesta_one='+ respuestaUno + '&pregunta_two='+ preguntaDos + '&respuesta_two='+ respuestaDos + '&pregunta_tre='+ preguntaTres + '&respuesta_tre='+ respuestaTres + '&nickname='+ firmaDigital),
            beforeSend: function(){
              $('.mensajes').html('Procesando datos...');
              $('#imagen').show();     
            },
            success: function(respuesta){
              window.location.href = "?url=homepage&opcion=validarUsuario&alert=preguntas";
            }
          })
        }
    
  })

     
      function validarPreguntasSeguridad() {
          
          var preguntaUno = $('#pregunta_one').val();
          var respuestaUno = $('#respuesta_one').val();
          var preguntaDos = $('#pregunta_two').val();
          var respuestaDos = $('#respuesta_two').val();
          var preguntaTres = $('#pregunta_tre').val();
          var respuestaTres = $('#respuesta_tre').val();
          var firmaDigital = $('#nickname').val();
      
        if(expresion_p1(preguntaUno) && expresion_r1(respuestaUno) && expresion_p2(preguntaDos) && expresion_r2(respuestaDos) && expresion_p3(preguntaTres) && expresion_r3(respuestaTres) && expresion_fd(firmaDigital)){

          return true;

        }else{
          Swal.fire(
            'Oppss..!',
            'Debe llenar todos los campos.',
            'error'
           )
          return false;
        }
      }

      function expresion_p1(preguntaUno){

        if (preguntaUno == null || preguntaUno =="") {
          
          $('.mensajes').html('¡Error! La pregunta (1) no puede estar vacía.'); 
          document.getElementById("pregunta_one").style.borderColor = "red";
          return false;

        }else{
          $('.mensajes').html('');
          document.getElementById("pregunta_one").style.borderColor = "#ced4da"; 
          return true;
        }
      }

      function expresion_r1(respuestaUno){

        if (respuestaUno == null || respuestaUno =="") {
          
          $('.mensajes').html('¡Error! La respuesta (1) no puede estar vacía.'); 
          document.getElementById("respuesta_one").style.borderColor = "red";
          return false;

        }else{
          $('.mensajes').html('');
          document.getElementById("respuesta_one").style.borderColor = "#ced4da"; 
          return true;
        }
      }

      function expresion_p2(preguntaDos){

        if (preguntaDos == null || preguntaDos =="") {
          
          $('.mensajes').html('¡Error! La pregunta (2) no puede estar vacía.'); 
          document.getElementById("pregunta_two").style.borderColor = "red";
          return false;

        }else{
          $('.mensajes').html('');
          document.getElementById("pregunta_two").style.borderColor = "#ced4da"; 
          return true;
        }
      }

      function expresion_r2(respuestaDos){

        if (respuestaDos == null || respuestaDos =="") {
          
          $('.mensajes').html('¡Error! La respuesta (2) no puede estar vacía.'); 
          document.getElementById("respuesta_two").style.borderColor = "red";
          return false;

        }else{
          $('.mensajes').html('');
          document.getElementById("respuesta_two").style.borderColor = "#ced4da"; 
          return true;
        }
      }

      function expresion_p3(preguntaTres){

        if (preguntaTres == null || preguntaTres =="") {
          
          $('.mensajes').html('¡Error! La pregunta (3) no puede estar vacía.'); 
          document.getElementById("pregunta_tre").style.borderColor = "red";
          return false;

        }else{
          $('.mensajes').html('');
          document.getElementById("pregunta_tre").style.borderColor = "#ced4da"; 
          return true;
        }
      }

      function expresion_r3(respuestaTres){

        if (respuestaTres == null || respuestaTres =="") {
          
          $('.mensajes').html('¡Error! La respuesta (3) no puede estar vacía.'); 
          document.getElementById("respuesta_tre").style.borderColor = "red";
          return false;

        }else{
          $('.mensajes').html('');
          document.getElementById("respuesta_tre").style.borderColor = "#ced4da"; 
          return true;
        }
      }

      function expresion_fd(firmaDigital){

        if (firmaDigital == null || firmaDigital =="") {
          
          $('.mensajes').html('¡Error! La firma digital no puede estar vacía.'); 
          document.getElementById("nickname").style.borderColor = "red";
          return false;

        }else{
          $('.mensajes').html('');
          document.getElementById("nickname").style.borderColor = "#ced4da"; 
          return true;
        }
      }

      