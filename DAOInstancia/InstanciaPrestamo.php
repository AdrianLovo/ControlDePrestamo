<?php

	/*
	* @author Adrian 
	* https://github.com/AdrianLovo/ControlDePrestamos
	*/
	
	require_once("../DAO/DAOPrestamo.php");
	require_once("../Modelos/Prestamo.php");
	require_once("../Modelos/CuotaPrestamo.php");

	//Validar Existencia de variables POST
	$funcion = isset($_POST['Funcion']) ? $_POST['Funcion'] : null;

	//metodo = listar
	$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : null;								
	
	//Metodo = agregar
	$nombrePersona = isset($_POST['nombrePersona']) ? $_POST['nombrePersona'] : null;
	$totalPrestamo = isset($_POST['totalPrestamo']) ? $_POST['totalPrestamo'] : null;
	$cuota = isset($_POST['cuota']) ? $_POST['cuota'] : null;
	$cantidadCuotas = isset($_POST['cantidadCuotas']) ? $_POST['cantidadCuotas'] : null;
	$fechaPrestamo = isset($_POST['fechaPrestamo']) ? $_POST['fechaPrestamo'] : null;

	//metodo = buscarDetalle	
	$parametro = isset($_POST['parametro']) ? $_POST['parametro'] : null;
	$filtro = isset($_POST['filtro']) ? $_POST['filtro'] : null;

	//metodo = eliminar() | modificarDetalle()
	$idPrestamo= isset($_POST['idPrestamo']) ? $_POST['idPrestamo'] : null;

	//metodo = modificarDetalle()
	$idCuotaPrestamo= isset($_POST['idCuotaPrestamo']) ? $_POST['idCuotaPrestamo'] : null;
	$montoPendiente= isset($_POST['montoPendiente']) ? $_POST['montoPendiente'] : null;


	switch ($funcion) {
		case 1: listar($opcion);
			break;
		case 2: $prestamo = new Prestamo(null, $nombrePersona, $totalPrestamo, $cuota, $cantidadCuotas, $fechaPrestamo, ($cuota*$cantidadCuotas));
				agregar($prestamo);
			break;	
		case 3:	eliminar($idPrestamo);
			break;			
		case 7: modificarDetalle($idPrestamo, $idCuotaPrestamo, $montoPendiente);
			break;		
		case 8: buscarDetalle($parametro, $filtro);
			break;
	}

	function listar($opcion){		
		$datosTodos = array();
		$daoPrestamo = new DAOPrestamo();

		foreach ($daoPrestamo->listar($opcion) as $prestamo) {
			$temp = $prestamo->toArray();
			$datos = array(
				'idPrestamo' 		=> $temp[0],
            	'nombrePersona' 	=> $temp[1],
            	'totalPrestamo' 	=> $temp[2],
            	'cuota' 			=> $temp[3],
            	'cantidadCuotas' 	=> $temp[4],
            	'fechaPrestamo' 	=> $temp[5],
            	'montoPendiente' 	=> $temp[6]
			);
			$datosTodos[] = $datos;	
		}
		echo json_encode($datosTodos);	
	}

	function agregar($prestamo){
		$daoPrestamo = new DAOPrestamo();
		echo($idGenerado = $daoPrestamo->agregar($prestamo));			
	}

	function buscarDetalle($parametro, $filtro){		
		$datosTodos = array();
		$dao = new DAOPrestamo();
		$objeto = new CuotaPrestamo(null, $parametro, null, null);

		foreach ($dao->buscarDetalle($objeto,$filtro) as $cuotaPrestamo) {
			$temp = $cuotaPrestamo->toArray();
			$datos = array(
				'idCuotaPrestamo' 		=> $temp[0],
            	'idPrestamo' 			=> $temp[1],
            	'numeroCuota' 			=> $temp[2],
            	'fechaCancelada' 		=> $temp[3]            	
			);
			$datosTodos[] = $datos;	
		}
		echo json_encode($datosTodos);	
	}
	
	function Eliminar($idPrestamo){
		$daoPrestamo = new DAOPrestamo();
		echo ($daoPrestamo->eliminar($idPrestamo));
	}

	function ModificarDetalle($idPrestamo, $idCuotaPrestamo, $montoPendiente){
		$daoPrestamo = new DAOPrestamo();
		echo($daoPrestamo->modificarDetalle($idPrestamo, $idCuotaPrestamo, $montoPendiente));
	}
	

?>
