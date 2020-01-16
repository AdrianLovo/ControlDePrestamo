$(document).ready(function() {
    listar();	    
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
        ],
        "order": [[1, 'asc']]
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

    datos = {"Funcion": 1, "opcion": 2};
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
	datos = {"Funcion": 8, "parametro": $parametro, "filtro": "idPrestamo"};
    $.ajax({
		url: "../DAOInstancia/InstanciaPrestamo.php",
		type: "POST",
		data: datos,
		async: true,
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
		var montoPendiente = parseInt(fila.montoPendiente.replace("$","")) - (parseInt(fila.cuota.replace("$","")) * (i+1));
		 
		if(detalle[i].fechaCancelada != null){
			cadena = cadena + "<tr>"+
					      "<td class='TablaBordeLados'>"+ detalle[i].numeroCuota +"</td>"+
					      	"<td class='TablaBordeCuatro'>Cancelado</td>"+
					      	"<td class='TablaBordeCuatro'>"+ detalle[i].fechaCancelada +"</td>"+					    	
					    "</tr>";
			menorCancelada = i+1;
		}		
    }
    return "<center><table><tr><th>Numero de Cuota</th><th>Estado</th><th>Fecha</th></tr>"+ cadena + "<tr><td colspan='2'><b>Total<b></td><td><b>$"+ total +"<b></td></tr></table></center>";
}


function convertirFecha(fecha){
	
}
