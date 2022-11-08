<?php

		if (isset($_GET['errorComprobar']) && $_GET['errorComprobar'] == "true") {
            echo " <script>Swal.fire(
            '¡Opps..!',
            'Lo lamentamos, las respuestas del formulario no coinciden con el perfil del usuario, a los (3) intentos incorrectos, por su seguridad nos veremos obligados a bloquearlo del sistema.',
            'error'
            )</script>
            ";

          }

          if (isset($bloqueUsuario) && $bloqueUsuario == "noci") {
            echo " <script>Swal.fire(
            '¡Opps..!',
            'Lo lamentamos, las respuestas no coinciden con el perfil del usuario.',
            'error'
            )</script>
            ";

          }

          if (isset($notificarExito) && $notificarExito == true) {
            echo " <script>Swal.fire(
            '¡Excelente!',
            'Su solicitud de desbloqueo ha sido enviada con éxito.',
            'success'
            )</script>
            ";

          }

          if (isset($notificarExito) && $notificarExito == false) {
            echo " <script>Swal.fire(
            '¡Lo lamentamos!',
            'Su solicitud de desbloqueo ya ha sido enviada con anterioridad, por favor, espere por la respuesta del usuario superior.',
            'error'
            )</script>
            ";

          }

          if (isset($respuestasIncorrectas) && $respuestasIncorrectas == true) {
            echo " <script>Swal.fire(
            '¡Lo lamentamos!',
            'Su solicitud no pudo ser enviada, sus respuestas no coinciden con su perfil.',
            'error'
            )</script>
            ";

          }

          if (isset($bloqueUsuario) && $bloqueUsuario == "error") {
            echo " <script>Swal.fire(
            '¡Opps..!',
            'Lo lamentamos, este usuario se encuentra actualmente bloqueado dentro del sistema, por favor, recupere su usuario si previamente aún no lo ha hecho.',
            'error'
            )</script>
            ";

          }

          if (isset($bloqueUsuario) && $bloqueUsuario == "verificado") {
            echo " <script>Swal.fire(
            '¡Excelente!',
            'Su usuario se ha restablecido correctamente, por favor, ingrese nuevamente con su cédula por default de contraseña.',
            'success'
            )</script>
            ";

          }

          if (isset($_GET['usuarioBloqueado']) && $_GET['usuarioBloqueado'] == "true") {
            echo " <script>Swal.fire(
            '¡Opps..!',
            'Lo lamentamos, este usuario se encuentra actualmente bloqueado dentro del sistema, por favor, recupere su usuario si previamente aún no lo ha hecho.',
            'error'
            )</script>
            ";

          }

          if (isset($_GET['usuarioBloqueado']) && $_GET['usuarioBloqueado'] == "noexiste") {
            echo " <script>Swal.fire(
            '¡Opps..!',
            'Lo lamentamos, este usuario no existe actualmente dentro del sistema.',
            'error'
            )</script>
            ";

          }

          if (isset($_GET['cedulaPass']) && $_GET['cedulaPass'] == "true") {
            echo " <script>Swal.fire(
            '¡Excelente!',
            'Su contraseña ha sido cambiada con éxito',
            'success'
            )</script>
            ";

          }

          if (isset($respuestasVacías) && $respuestasVacías == 'true') {
            
            echo " <script>Swal.fire(
            '¡Opps..!',
            'Lo lamentamos, no se puede mandar un formulario vacío.',
            'error'
            )</script>
            ";

            }
          
?>
