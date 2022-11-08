  
    $("#cedula_bloqueado").keyup(function() {

        var dataString = 'id_product='+$('#cedula_bloqueado').val();
       
        var cedula = $('#cedula_bloqueado').val();

        expresionCedula = /^[0-9]{5,9}$/;
        if (expresionCedula.test(cedula)) {

        
        $.ajax({
            type: "POST",
            url: "?url=pasoLogin&opcion=consultar_usuario_bloqueado",
            data: dataString,
            dataType: "json",
            beforeSend: function () {
            
                $('.mensajes').html('Verificando...');
            
            },
            success: function(response) {

                $('.result').empty();
                if (response.active != "1") {

                    $('#imagen').hide();
                    $('.mensajes').html('No hay usuarios con esa cedula.');
                    document.getElementById("cedula_bloqueado").style.borderColor = "red";
                    document.getElementById("cedula_bloqueado").style.background = "#ED9785";
                    document.getElementById("bloqueado_siguiente").style.background = "red";
                    $('#bloqueado_siguiente').prop('disabled', true);
               
                }
                else {
                      $('#imagen').hide();
                      $('.mensajes').html('Continuar');
                      document.getElementById("cedula_bloqueado").style.borderColor = "#92FF89";
                      document.getElementById("cedula_bloqueado").style.background = "white";
                      document.getElementById("bloqueado_siguiente").style.background = "#198754";
                      $('#bloqueado_siguiente').prop('disabled', false);

                      var html = '';
                      var i;
                      var num=0;

                     for (i = 0; i < 4; i++) {
                       num++;
                        html += '<div class="form-group">' + 
                                 '<input type="hidden" id="cedula" name="cedula" value="'+ response[i].cedula_trabajador +'">' +
                                 '<input type="hidden" id="preguntas[]" name="preguntas[]" value="'+ response[i].pregunta +'">' +
                                 '<label for="exampleFormControlSelect1">' + num + ' - ' + response[i].pregunta + '</label>' + 
                                 '</div>' +

                                 '<div class="form-group">' + 
                                 '<input type="text" class="form-control" onkeypress="return checkQuest(event)" name="respuesta[]" id="respuesta[]" placeholder="Respuesta ' + num + '""  style="width:100%;" autocomplete="off" required>'  
                               + '</div>';

                             }
                             
                     $('.result').html(html);
                }
 
            }
        });

    }else{
      $('.mensajes').html('¡Error! Formato de la cedula incorrecto.');
      document.getElementById("cedula_bloqueado").style.borderColor = "red";
      document.getElementById("cedula_bloqueado").style.background = "#ED9785";
      document.getElementById("bloqueado_siguiente").style.background = "red";
      $('#bloqueado_siguiente').prop('disabled', true);
    }

    
  });