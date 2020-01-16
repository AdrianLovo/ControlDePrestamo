$(document).ready(function() {
    listar();	
    eliminar();
});

function listar(){
	//Declaracion de DataTable
	var table = $('#TablaDatos').DataTable( {
        data: [],
        "columns": [
            {"className": 'details-control', "orderable": false, "data": null, "defaultContent": ''},
            {"data": "nombrePersona"},
            {"data": "totalPrestamo"},
            {"data": "cuota"},
            {"data": "cantidadCuotas"},
            {"data": "fechaPrestamo"},
            {"data": "montoPendiente"},
            {"className": 'details-delete', "orderable": false, "data": null, "defaultContent": ''},
        ],
        "order": [[1, 'asc']],
        "pageLength": 20
    });
     
    // Add event listener for opening and closing details
    $('#TablaDatos tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);     
        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');            
        }else {
        	row.child(mostrarDetalle(row.data(), buscarDetalle(row.data().idPrestamo),row.index())).show();
            tr.addClass('shown');            
        }
    });

    datos = {"Funcion": 1, "opcion": 1};
    $.ajax({
		url: "../DAOInstancia/InstanciaPrestamo.php",
		type: "POST",
		data: datos,
		async: true,
		success: function (respuesta) {
			var myJSON = JSON.parse(respuesta);
			for (var i = 0; i < myJSON.length; i++) {
				$('#TablaDatos').dataTable().fnAddData( [
			      {"idPrestamo": myJSON[i].idPrestamo, "nombrePersona": myJSON[i].nombrePersona, "totalPrestamo": "$"+myJSON[i].totalPrestamo, "cuota": "$"+myJSON[i].cuota, "cantidadCuotas": myJSON[i].cantidadCuotas, "fechaPrestamo": myJSON[i].fechaPrestamo, "montoPendiente": "$"+myJSON[i].montoPendiente} 
		     	]);
            }	            
		},error: function() {
			alertify.error('Error al agregar mostrar Registro');        	
    	}
	});		
}

function buscarDetalle($parametro){
	var detalle;
	datos = {"Funcion": 8, "parametro": $parametro, "filtro": "idPrestamo", "opcion": 1};
    $.ajax({
		url: "../DAOInstancia/InstanciaPrestamo.php",
		type: "POST",
		data: datos,
		async: false,
		success: function (respuesta) {
			detalle = JSON.parse(respuesta);
			if(detalle.length == 0){
				alertify.error('No existe el registro detalle');
			}			
		},
		error: function() {
			alertify.error('Error al mostrar Detalle de Deuda');        	
    	}
	});	
	return detalle;
}

function mostrarDetalle(fila, detalle, filaNum){
	var cadena = "";
	var total = 0;
	var menorCancelada = 0;
	
	for (var i = 0; i < detalle.length; i++) {
		total = parseInt(total) + parseInt(fila.cuota.replace("$",""));
		var montoPendiente = ( parseInt(fila.cantidadCuotas.replace("$","")) * parseInt(fila.cuota.replace("$","")) )- (parseInt(fila.cuota.replace("$","")) * (i+1));
		 
		if(detalle[i].fechaCancelada != null){
			cadena = cadena + "<tr>"+
					      "<td class='TablaBordeLados'>"+ detalle[i].numeroCuota +"</td>"+
					      	"<td class='TablaBordeCuatro'>Cancelado</td>"+
					      	"<td class='TablaBordeCuatro'>"+ detalle[i].fechaCancelada +"</td>"+
					    	"<td class='TablaBordeLados'></td>"+
					    "</tr>";
			menorCancelada = i+1;
		}else{
			var idSiguiente = 0;
			if(i < ((detalle.length)-1)){
				idSiguiente = detalle[i+1].idCuotaPrestamo;				
			}
			if(i == menorCancelada){
				cadena = cadena + "<tr>"+
					      "<td class='TablaBordeLados'>"+ detalle[i].numeroCuota +"</td>"+
					      	"<td class='TablaBordeCuatro'>Pendiente</td>"+
					      	"<td class='TablaBordeCuatro'></td>"+
					    	"<td class='TablaBordeLados'><button class='btn btn-outline-success btn-sm' id='"+ detalle[i].idCuotaPrestamo +"' onclick='modificarDetalle("+fila.idPrestamo+", this.id, "+montoPendiente+","+idSiguiente+","+filaNum+")'   >Cancelar</button></td>"+
					    "</tr>";
			}else{
				cadena = cadena + "<tr>"+
					      "<td class='TablaBordeLados'>"+ detalle[i].numeroCuota +"</td>"+
					      	"<td class='TablaBordeCuatro'>Pendiente</td>"+
					      	"<td class='TablaBordeCuatro'></td>"+
					    	"<td class='TablaBordeLados'><button disabled class='btn btn-outline-success btn-sm' id='"+ detalle[i].idCuotaPrestamo +"' onclick='modificarDetalle("+fila.idPrestamo+", this.id, "+montoPendiente+","+idSiguiente+","+filaNum+")'   >Cancelar</button></td>"+
					    "</tr>";			
			}
		}		
    }
    return "<center><table><tr><th>Numero de Cuota</th><th>Estado</th><th>Fecha</th><th>Action</th></tr>"+ cadena + "<tr><td colspan='3'><b>Total<b></td><td><b>$"+ total +"<b></td></tr></table></center>";
}

function agregar(){
	var idPrestamo = 0;
	var nombrePersona = $("#inputNombre").val();
	var totalPrestamo = $("#inputTotalPrestamo").val();
	var cuota = $("#inputCuota").val();
	var cantidadCuotas = $("#inputCantidadCuotas").val();
	var fechaPrestamo = $("#inputFecha").val();

	if(nombrePersona != "" && totalPrestamo != "" && cuota != "" && cantidadCuotas != "" && fechaPrestamo!="") {
		datos = {"Funcion": 2, "nombrePersona": nombrePersona, "totalPrestamo": totalPrestamo, "cuota": cuota, "cantidadCuotas": cantidadCuotas, "fechaPrestamo": fechaPrestamo};
	    $.ajax({
			url: "../DAOInstancia/InstanciaPrestamo.php",
			type: "POST",
			data: datos,
			async: false,
			success: function (respuesta) {
				idPrestamo = respuesta;
				if(idPrestamo != 0){
					alertify.success('Registro Agregado');   
					$('#TablaDatos').dataTable().fnAddData( [
				    	{"idPrestamo": idPrestamo, "nombrePersona": nombrePersona, "totalPrestamo": "$"+totalPrestamo, "cuota": "$"+cuota, "cantidadCuotas": cantidadCuotas, "fechaPrestamo": fechaPrestamo, "montoPendiente": "$"+ (parseInt(cuota)*parseInt(cantidadCuotas))} 
				    ]);   
					reiniciarModal()
				}
			},
			error: function() {
				alertify.error('Error al agregar Registro');        	
	    	}
		});		
	}else{
		alertify.error("Existen campos vacios");
	}    
}

function eliminar(){
	var bandera = false;
    var table = $('#TablaDatos').DataTable(); 
    $('#TablaDatos tbody').on( 'click', 'td.details-delete', function () {
        
        datos = {"Funcion": 3, "idPrestamo": table.row($(this).parents('tr')).data().idPrestamo};
	    $.ajax({
			url: "../DAOInstancia/InstanciaPrestamo.php",
			type: "POST",
			data: datos,
			async: false,
			success: function (respuesta) {
				if(respuesta != "0"){
					alertify.success('Registro Eliminado');        	
					bandera = true;
				}
			},error: function() {
				alertify.error('Error al Eliminar Registro');        	
	    	}
		});	

		if(bandera == true)	{
			table.row($(this).parents('tr')).remove().draw();
		}
    });
}

function modificarDetalle(idPrestamo, idCuotaPrestamo, montoPendiente, idSiguiente, filaNum){
	var bandera = false;
	$("#"+idCuotaPrestamo).hide("slow");
	
	datos = {"Funcion": 7, "idPrestamo": idPrestamo, "idCuotaPrestamo": idCuotaPrestamo, "montoPendiente": montoPendiente};
    $.ajax({
		url: "../DAOInstancia/InstanciaPrestamo.php",
		type: "POST",
		data: datos,
		async: false,
		success: function (respuesta) {
			if(respuesta != 0){
				alertify.success('Cuota Procesada');        	
				bandera = true;
			}
			if(idSiguiente != 0){
				$("#"+idSiguiente).attr("disabled", false)
			}
		},error: function() {
			alertify.error('Error al Procesar Cuota');        	
    	}
	});	

    if(bandera == true){
    	$("#TablaDatos").DataTable().cell(filaNum, 6).data("$"+montoPendiente);
    }
}

//Funciones Auxiliares
function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57) {
      return true;
     }
     return false;        
}

function reiniciarModal(){
	$("#ModalAgregar").modal('hide'); 
	$("#inputNombre").val("");
	$("#inputTotalPrestamo").val("");
	$("#inputCuota").val("");
	$("#inputCantidadCuotas").val("");
	$("#inputFecha").val("");
}

