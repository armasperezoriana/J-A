function eliminarPreguntas(id){
              Swal.fire({
                title: '¿Deseas realmente restaurar las preguntas de seguridad de éste usuario?',
                text: "¡No podrás revertir éste paso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡restaurar!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    type: "POST",
                    url: "?url=avanzada&opcion=eliminarPreguntasSeguridad",
                    data: 'id=' + id,
                    beforeSend: function(){
                    },
                    success: function(respuesta){
                      console.log(respuesta);
                        Swal.fire(
                          '¡Restaurado!',
                          'El usuario podrá registrar nuevamente sus preguntas de seguridad',
                          'success'
                          ).then(() => {
                            // Aquí la alerta se ha cerrado
                            window.location.reload();
                        }); 
                    }
                  })
                } else {

                  Swal.fire(
                      '¡Restauración cancelada!',
                      'Las preguntas de seguridad han sido salvadas',
                      'error'
                      )

                }
              })
            }

function eliminarContrasena(id){
              Swal.fire({
                title: '¿Deseas realmente restaurar la contraseña de éste usuario?',
                text: "¡No podrás revertir éste paso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡restaurar!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    type: "POST",
                    url: "?url=avanzada&opcion=restaurarContrasena",
                    data: 'id=' + id,
                    beforeSend: function(){
                    },
                    success: function(respuesta){
                      console.log(respuesta);
                        Swal.fire(
                          '¡Restaurado!',
                          'El usuario podrá ingresar nuevamente a la plataforma con su cédula por default',
                          'success'
                          ).then(() => {
                            // Aquí la alerta se ha cerrado
                            window.location.reload();
                        }); 
                    }
                  })
                } else {

                  Swal.fire(
                      '¡Restauración cancelada!',
                      'La contraseña del usuario ha sido salvada',
                      'error'
                      )

                }
              })
            }

  function actualizarDesingreso(id){
              Swal.fire({
                title: '¿Deseas realmente bloquearle el ingreso a éste usuario?',
                text: "El usuario no podrá ingresar a la plataforma",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡bloquear!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    type: "POST",
                    url: "?url=avanzada&opcion=actualizarDesingreso",
                    data: 'id=' + id,
                    beforeSend: function(){
                    },
                    success: function(respuesta){
                      console.log(respuesta);
                        Swal.fire(
                          '¡Bloqueado!',
                          'El usuario no podrá ingresar a la plataforma',
                          'success'
                          ).then(() => {
                            // Aquí la alerta se ha cerrado
                            window.location.reload();
                        }); 
                    }
                  })
                } else {

                  Swal.fire(
                      '¡Bloqueo cancelado!',
                      'El usuario podrá seguir ingresando con normalidad a la plataforma',
                      'error'
                      )

                }
              })
            }

  function actualizarIngreso(id){
              Swal.fire({
                title: '¿Deseas realmente concederle el ingreso a éste usuario?',
                text: "El usuario podrá ingresar a la plataforma",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡conceder!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    type: "POST",
                    url: "?url=avanzada&opcion=actualizarIngreso",
                    data: 'id=' + id,
                    beforeSend: function(){
                    },
                    success: function(respuesta){
                      console.log(respuesta);
                        Swal.fire(
                          '¡Concedido!',
                          'El usuario podrá ingresar nuevamente a la plataforma',
                          'success'
                          ).then(() => {
                            // Aquí la alerta se ha cerrado
                            window.location.reload();
                        }); 
                    }
                  })
                } else {

                  Swal.fire(
                      '¡Acceso cancelado!',
                      'El usuario seguirá sin poder ingresar la plataforma',
                      'error'
                      )

                }
              })
            }