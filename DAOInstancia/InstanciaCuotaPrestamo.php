<?php

	/*
	* @author Adrian 
	* https://github.com/AdrianLovo/ControlDePrestamos
	*/
	
	require_once("../DAO/DAOCuotaPrestamo.php");
	require_once("../Modelos/CuotaPrestamo.php");

	//Validar Existencia de variables POST
	$funcion = isset($_POST['Funcion']) ? $_POST['Funcion'] : null;
	$parametro = isset($_POST['parametro']) ? $_POST['parametro'] : null;
	$filtro = isset($_POST['filtro']) ? $_POST['filtro'] : null;
	$idPrestamo = isset($_POST['idPrestamo']) ? $_POST['idPrestamo'] : null;
	/*$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
	$edad = isset($_POST['edad']) ? $_POST['edad'] : null;
	$genero = isset($_POST['genero']) ? $_POST['genero'] : null;
	$fechaNac = isset($_POST['fechaNac']) ? $_POST['fechaNac'] : null;*/

	
	switch ($funcion) {
		/*case 2: $persona = new Persona(null, $nombre, $apellido, $edad, $genero, $fechaNac, "");
				Agregar($persona);
			break;	
		case 3: Eliminar($idPersona);
			break;	
		case 4: $persona = new Persona($idPersona, $nombre, $apellido, $edad, $genero, $fechaNac, '...');
				Modificar($persona);		
			break;*/
		case 5: Buscar($parametro, $filtro);
			break;
	}

	

	/*function Listar(){		
		$datosTodos = array();
		$daoPrestamo = new DAOPrestamo();

		foreach ($daoPrestamo->listar() as $prestamo) {
			$temp = $prestamo->toArray();
			$datos = array(
				'idPrestamo' 		=> $temp[0],
            	'nombrePersona' 	=> $temp[1],
            	'totalPrestamo' 	=> $temp[2],
            	'cuota' 			=> $temp[3],
            	'cantidadCuotas' 	=> $temp[4],
            	'fechaPrestamo' 	=> $temp[5],
			);
			$datosTodos[] = $datos;	
		}
		echo json_encode($datosTodos);	
	}

	/*function Agregar($persona){
		$ruta = ProcesarImagen();
		if($ruta != ""){			
			$persona->setImagen($ruta);
			$daoPersona = new DAOPersona();
			$idGenerado = $daoPersona->agregar($persona);	
			$datos = array('IdGenerado' => $idGenerado, 'Imagen' => $ruta);
		}else{
			$datos = array('IdGenerado' => '', 'Ruta' => '');
		}
		echo json_encode($datos);
	}
	
	function Eliminar($idPersona){
		$daoPersona = new DAOPersona();
		echo ($daoPersona->eliminar($idPersona));
	}

	function Modificar($persona){
		$daoPersona = new DAOPersona();
		echo($daoPersona->modificar($persona));
	}*/
	

?>
