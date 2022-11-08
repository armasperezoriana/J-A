$(".formulario_modificar").on('submit', function(e){
  e.preventDefault();
    if (validar()) {
    fields = $(this).serializeArray();
        datos = {};
        jQuery.each(fields, function(i, item){
            datos[item['name']]=item['value'];
        });
    
    $.ajax({
      type: "POST",
      url: "?url=deducciones&opcion=modificar",
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
  }else{
    return false;
  }
    
})
function validar() {      
        var ivss = $('#ivss').val();
        var rpe = $('#rpe').val();
        var faov = $('#faov').val();
        var inces = $('#inces').val();
        if(validaVacio(ivss) || validaVacio(rpe) ||
        validaVacio(faov) || validaVacio(inces)){
          Swal.fire(
            'Oppss..!',
            '¡Error! Todos los campos son obligatorios.',
            'error'
           ) 
        }else{
        if(expresion_ivss(ivss) && expresion_rpe(rpe) && expresion_faov(faov)  && expresion_inces(inces)){
          return true;
          }else{
            return false;
          }
        }

      }
function validaVacio(valor) {
  valor = valor.replace("&nbsp;", "");
  valor = valor == undefined ? "" : valor;
  if (!valor || 0 === valor.trim().length) {
    return true;
  }
  else {
    return false;
  }
}
function expresion_ivss(ivss){
        expresion= /^[0-9]+([.][0-9]+)?$/;
        if (!expresion.test(ivss)) {
          document.getElementById("ivss").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de ivss incorrecto.',
            'error'
           )
          $('.mensajes').html('¡Error! Formato de ivss incorrecto.');
          document.getElementById("ivss").style.borderColor = "red";
          return false;
        }else{
          $('.mensajes').html(' ');
          document.getElementById("ivss").style.borderColor = "#ced4da"; 
          return true;
    }
}
function expresion_rpe(rpe){
        expresion= /^[0-9]+([.][0-9]+)?$/;
        if (!expresion.test(rpe)) {
          document.getElementById("rpe").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de rpe incorrecto.',
            'error'
           )
          $('.mensajes').html('¡Error! Formato de rpe incorrecto.');
          document.getElementById("rpe").style.borderColor = "red";
          return false;
        }else{
          $('.mensajes').html(' ');
          document.getElementById("rpe").style.borderColor = "#ced4da"; 
          return true;
    }
}
function expresion_faov(faov){
        expresion= /^[0-9]+([.][0-9]+)?$/;
        if (!expresion.test(faov)) {
          document.getElementById("faov").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de faov incorrecto.',
            'error'
           )
          $('.mensajes').html('¡Error! Formato de faov incorrecto.');
          document.getElementById("faov").style.borderColor = "red";
          return false;
        }else{
          $('.mensajes').html(' ');
          document.getElementById("faov").style.borderColor = "#ced4da"; 
          return true;
    }
}
function expresion_inces(inces){
        expresion= /^[0-9]+([.][0-9]+)?$/;
        if (!expresion.test(inces)) {
          document.getElementById("inces").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de inces incorrecto.',
            'error'
           )
          $('.mensajes').html('¡Error! Formato de inces incorrecto.');
          document.getElementById("inces").style.borderColor = "red";
          return false;
        }else{
          $('.mensajes').html(' ');
          document.getElementById("inces").style.borderColor = "#ced4da"; 
          return true;
    }
}


$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })