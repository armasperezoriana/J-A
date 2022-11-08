

      
  $("#formularioEnviar").on('submit', function(e){
     e.preventDefault();

        if (validarBuzon()) {
          var idReceptor = $('#idReceptor').val();
          var asunto = $('#asunto').val();
          var msj = $('#msj').val();
          $.ajax({
            type: "POST",
            url: "?url=notificaciones&opcion=enviarMensaje",
            data: ('idReceptor=' + idReceptor + '&asunto='+ asunto + '&msj='+ msj),
            beforeSend: function(){
              $('.mensajes').html('Procesando datos...');
              $('#imagen').show();     
            },
            success: function(respuesta){
              let resp = respuesta.split('%');
              $('#imagen').hide();
              if (resp[1] == 1) {
                $('.mensajes').html('');
                Swal.fire(
                  '¡Envío exitoso!',
                  'El mensaje ha sido enviado correctamente.',
                  'success'
                  ).then(() => {
                    // Aquí la alerta se ha cerrado
                    window.location.reload();
                });
                
              }else{
                Swal.fire(
                  'Oppss..!',
                  'Lo lamentamos, ocurrió un error al intentar enviar el mensaje.',
                  'error'
                  )
              }
            }
          })
        }
    
  })

     
      function validarBuzon() {
        
        
        var idReceptor = $('#idReceptor').val();
        var asunto = $('#asunto').val();
        var msj = $('#msj').val();
      
        if(expresion_receptor(idReceptor) && expresion_asunto(asunto) && expresion_msj(msj)){

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

      function expresion_receptor(idReceptor){
        if (idReceptor == null) {
          
          $('.mensajes').html('¡Error! El receptor no puede estar vacío.'); 
          document.getElementById("idReceptor").style.borderColor = "red";
          return false;

        }else{
          $('.mensajes').html('');
          document.getElementById("idReceptor").style.borderColor = "#ced4da"; 
          return true;
        }
      }

      function expresion_asunto(asunto){
        if (asunto == null) {
          
          $('.mensajes').html('¡Error! El asunto no puede estar vacío.'); 
          document.getElementById("asunto").style.borderColor = "red";
          return false;

        }else{
          $('.mensajes').html('');
          document.getElementById("asunto").style.borderColor = "#ced4da"; 
          return true;
        }
      }

      function expresion_msj(msj){
        if (msj == null) {
          
          $('.mensajes').html('¡Error! El mensaje no puede estar vacío.'); 
          document.getElementById("msj").style.borderColor = "red";
          return false;

        }else{
          $('.mensajes').html('');
          document.getElementById("msj").style.borderColor = "#ced4da"; 
          return true;
        }
      }
      