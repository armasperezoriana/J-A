//https://s3.amazonaws.com/dolartoday/data.json
$.getJSON("https://s3.amazonaws.com/dolartoday/data.json",function(data){


  $('#dolartoday').html(data.USD.transferencia + ' BS');
  $('#promedio').html(data.USD.promedio + ' BS');
  $('#bcv').html(data.USD.promedio_real + ' BS');
  $('#al').html('Valor del dolar | Fecha: '+data._timestamp.fecha);
    });
 $(".formulario_modificar").on('submit', function(e){
    e.preventDefault();
    fields = $(this).serializeArray();
        datos = {};
        jQuery.each(fields, function(i, item){
            datos[item['name']]=item['value'];
        });
        $dolar = datos["valor_actual"];
        if (validarDolar($dolar)) {
      $.ajax({
      type: "POST",
      url: "?url=homepage&opcion=modificar",
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
        
    
  })

 function validarDolar($dolar){
        expresion= /^[0-9]+([.][0-9]+)?$/;
        if (!expresion.test($dolar)) {
          document.getElementById("valor_actual").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato del valor actual es incorrecto.',
            'error'
           )
          $('#valor_actual').css('borderColor', 'red');
          return false;
        }else{
          $('#valor_actual').css('borderColor', '#ced4da'); 
          return true;
        }
 }