$(document).ready(function() {
      $('#tableID').DataTable({
        
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      });
});
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
})
function validarFechas(datos) {      
        var periodo_desde = atob(datos['periodo_desde']);
        var periodo_hasta = atob(datos['periodo_hasta']);
        var f1 = new Date(periodo_desde); 
        var f2 = new Date(periodo_hasta); 
        if(f2>f1){
          $('.show .mensajes').html('');
            $('.show input[name=periodo_desde]').css('borderColor', '#ced4da');
            $('.show input[name=periodo_hasta]').css('borderColor', '#ced4da');
            return true;
          }else{
            Swal.fire(
            'Oppss..!',
            '¡Error! la fecha de inicio no puede ser posterior a la de culminación.',
            'error'
           )
          $('.show .mensajes').html('¡Error! El periodo desde no puede ser mayor al periodo hasta.'); 
          $('.show input[name=periodo_desde]').css('borderColor', 'red');
          $('.show input[name=periodo_hasta]').css('borderColor', 'red');
            return false;
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
function expresion_sueldo(datos){
        expresion= /^[0-9]+([.][0-9]+)?$/;
        dato = atob(datos['sueldo_semanal']);
        if (!expresion.test(dato)) {
          document.getElementById("sueldo_semanal").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato del sueldo semanal incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato del sueldo es incorrecto.');
          $('.show input[name=sueldo_semanal]').css('borderColor', 'red');
          return false;
        }else{
          $('.show .mensajes').html(' ');
          $('.show input[name=sueldo_semanal]').css('borderColor', '#ced4da'); 
          return true;
        }
}
function expresion_prima(datos){
        expresion= /^[0-9]+([.][0-9]+)?$/;
        dato = atob(datos['prima_hogar']);
        if (!expresion.test(dato)) {
          document.getElementById("prima_hogar").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de la prima por hogar es incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato de la prima por hogar es incorrecto.');
          $('.show input[name=prima_hogar]').css('borderColor', 'red');
          return false;
        }else{
          $('.show .mensajes').html(' ');
          $('.show input[name=prima_hogar]').css('borderColor', '#ced4da');  
          return true;
        }
}

function expresion_fecha_ingreso(datos){
        if (datos['fecha_ingreso'] == null ||datos['fecha_ingreso'] =="" ) {
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de la fecha de ingreso incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato de la fecha de ingreso incorrecto.'); 
          $('.show input[name=fecha_ingreso]').css('borderColor', 'red');
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=fecha_ingreso]').css('borderColor', '#ced4da');  
          return true;
        }
}
function expresion_fecha_nacimiento(datos){
        if (datos['fecha_nacimiento'] == null ||datos['fecha_nacimiento'] =="" ) {
          document.getElementById("fecha_nacimiento").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de la fecha de nacimiento incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato de la fecha de nacimiento incorrecto.');
          $('.show input[name=fecha_nacimiento]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=fecha_nacimiento]').css('borderColor', '#ced4da'); 
          return true;
        }
}
function expresion_celular(datos){
        expresionCelular = /^[0-9]{7,9}$/;
        dato = atob(datos['celular']);
        if (!expresionCelular.test(dato)) {
          document.getElementById("celular").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato del numero celular incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato del celular incorrecto.');
          $('.show input[name=celular]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=celular]').css('borderColor', '#ced4da'); 
          return true;
        }
}
function expresion_cedula(datos){
        expresionCedula = /^[0-9]{5,9}$/;
        dato = atob(datos['cedula']);
        if (!expresionCedula.test(dato)) {
          document.getElementById("cedula").focus();
          $('.show .mensajes').html('¡Error! Formato de la cedula incorrecta.');
          $('.show input[name=cedula]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=cedula]').css('borderColor', '#ced4da'); 
          return true;
        }
}
function expresion_correo(datos){
        expresionCorreo = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
        dato = atob(datos['correo']);
        if (!expresionCorreo.test(dato)||dato.length < 3) {
          document.getElementById("correo").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato del correo incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato del correo incorrecto.');
          $('.show input[name=correo]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=correo]').css('borderColor', '#ced4da'); 
          return true;
        }
}
function expresion_nombre(datos){
        expresionNombre = /^[a-z ,.'-]+$/i;
        dato = atob(datos['nombre']);
        if (!expresionNombre.test(dato)||dato.length < 3) {
          document.getElementById("nombre").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato del nombre incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato del nombre incorrecto.');
          $('.show input[name=nombre]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=nombre]').css('borderColor', '#ced4da'); 
          return true;
        }
}
function expresion_apellido(datos){
        expresionNombre = /^[a-z ,.'-]+$/i;
        dato = atob(datos['apellido']);
        if (!expresionNombre.test(dato)||dato.length < 3) {
          document.getElementById("apellido").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato del apellido incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato del apellido incorrecto.');
          $('.show input[name=apellido]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=apellido]').css('borderColor', '#ced4da'); 
          return true;
        }
}

function expresion_descripcion_trabajo(datos){
        dato = atob(datos['descripcion_trabajo']);
        if (dato.length < 3) {
          document.getElementById("descripcion_trabajo").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de la descripcion del trabajo incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato de la descripcion del trabajo incorrecto.');
          $('.show input[name=descripcion_trabajo]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=descripcion_trabajo]').css('borderColor', '#ced4da');
          return true;
        }
      }
function expresion_descripcion(datos){
        dato = atob(datos['descripcion']);
        if (dato.length < 3) {
          document.getElementById("id_descripcion").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de la descripcion detalla incorrecta.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato de la descripcion detalla incorrecta.');
          $('.show input[name=descripcion]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=descripcion]').css('borderColor', '#ced4da');
          return true;
        }
      }
function expresion_fecha_trabajo(datos){
        dato = atob(datos['fecha_trabajo']);
        if (dato == null ||dato =="" ) {
          document.getElementById("fecha_trabajo").focus()
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de la fecha del trabajo incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato de la fecha del trabajo incorrecto.');
          $('.show input[name=fecha_trabajo]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=fecha_trabajo]').css('borderColor', '#ced4da'); 
          return true;
        }
      }
function expresion_fecha_pago(datos){
        dato = atob(datos['fecha_pago']);
        if (dato == null ||dato =="" ) {
          document.getElementById("fecha_pago").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de la fecha de pago incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato de la fecha de pago incorrecto.');
          $('.show input[name=fecha_pago]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=fecha_pago]').css('borderColor', '#ced4da');
          return true;
        }
      }   
function expresion_cantidad(datos){
        dato = atob(datos['cantidad']);
        expresion = /^[0-9]{0,20}$/;
        if (!expresion.test(dato)) {
          document.getElementById("cantidad").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato del cantidad incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato del cantidad incorrecto.');
          $('.show input[name=cantidad]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=cantidad]').css('borderColor', '#ced4da');
          return true;
        }
      }
function expresion_total_unidad(datos){
        dato = atob(datos['total_unidad']);
         expresion= /^[0-9]+([.][0-9]+)?$/;
        if (!expresion.test(dato)) {
          document.getElementById("total_unidad").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato del precio incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato del total por unidad incorrecto.');
          $('.show input[name=total_unidad]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=total_unidad]').css('borderColor', '#ced4da');
          return true;
        }
      }

function expresion_horas_extras(datos){
        dato = atob(datos['horas_extras']);
        expresion = /^[0-9]{0,10}$/;
        if (!expresion.test(dato)) {
          document.getElementById("horas_extras").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de la hora extra incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato de la hora extra incorrecto.');
          $('.show input[name=horas_extras]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=horas_extras]').css('borderColor', '#ced4da');
          return true;
        }
}

function expresion_valor(datos){
        dato = atob(datos['valor']);
        expresion= /^[0-9]+([.][0-9]+)?$/;
        if (!expresion.test(dato)) {
          document.getElementById("id_valor").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato del valor del bono incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato del valor del bono incorrecto.');
          $('.show input[name=valor]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=valor]').css('borderColor', '#ced4da');
          return true;
        }
}
function expresion_dias(datos){
        dato = atob(datos['dias']);
        expresion= /^[0-9]+$/;
        if (!expresion.test(dato)) {
          document.getElementById("id_dias").focus();
          Swal.fire(
            'Oppss..!',
            '¡Error! Formato de dias incorrecto.',
            'error'
           )
          $('.show .mensajes').html('¡Error! Formato de dias incorrecto');
          $('.show input[name=dias]').css('borderColor', 'red'); 
          return false;
        }else{
          $('.show .mensajes').html('');
          $('.show input[name=dias]').css('borderColor', '#ced4da');
          return true;
        }
}