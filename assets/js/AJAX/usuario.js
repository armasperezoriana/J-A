         // Initialize the DataTable
        $(document).ready(function() {
  $(".formulario_modificar").on('submit', function(e){
    e.preventDefault();
    fields = $(this).serializeArray();
        datos = {};
        jQuery.each(fields, function(i, item){
            datos[item['name']]=btoa(item['value']);
        });
    
    $.ajax({
      type: "POST",
      url: "?url=usuario&opcion=modificarUsuario",
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
                  datos[item['name']]=btoa(item['value']);
              });

        if (/*validar()*/2>1) {
          $.ajax({
            type: "POST",
            url: "?url=usuario&opcion=registroUsuario",
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
                    url: "?url=usuario&opcion=eliminarUsuario",
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
      $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })