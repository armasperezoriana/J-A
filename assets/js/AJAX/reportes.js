document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById('consultar_inasistencias').addEventListener('submit', 
manejadorValidacion)
});


function manejadorValidacion(e) {
var periodo_desde = $('#consultaDesde').val();
var periodo_hasta = $('#consultaHasta').val();
var consultar_descripcion = $('#consultar_descripcion').val();
e.preventDefault();
	if (periodo_desde === "") {
		alert("Debe ingresar una fecha de inicio");
		 return;
	}else{
		if (periodo_hasta === "") {
		alert("Debe ingresar una fecha de Fin");
		 return ;
		}else{
			if (periodo_desde > periodo_hasta) {
				alert("La fecha de inicio no puede ser mayor a la fecha de fin.")
				return ;
			}else{
				if (consultar_descripcion === "0") {
					alert("Debe seleccionar una descripcion");
					return;
				}else{
					this.submit();
				}
			}
		}
	}
}
