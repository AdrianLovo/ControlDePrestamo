<?php

	/*
	* @author Adrian 
	* https://github.com/AdrianLovo/CRUD-PHP
	*/
	
	require_once("DAO.php");
	require_once("../Modelos/Prestamo.php");
	require_once("../Modelos/CuotaPrestamo.php");

	class DAOPrestamo extends DAO{

		//**************************************************************************METODOS HEAD**************************************************************************	
		public function queryListar($parametro){
			if($parametro == 1){
				$query = "SELECT * FROM prestamo.prestamo WHERE montoPendiente!=0";
			}else{
				$query = "SELECT * FROM prestamo.prestamo WHERE montoPendiente=0";
			}
			
			return $query;
		}

		public function metodoListar($resultSet){
			$arrayDeObjetos = array();
			if(!empty($resultSet)){
				foreach($resultSet as $fila){
					$a = new Prestamo($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
					array_push($arrayDeObjetos, $a);
				}	
			}	
			return $arrayDeObjetos;
		}

		public function queryAgregar(){
			$query = "INSERT INTO prestamo.prestamo (nombrePersona, totalPrestamo, cuota, cantidadCuotas, fechaPrestamo, montoPendiente) VALUES(?, ?, ?, ?, ?, ?)";	
			return $query;
		}

		public function metodoAgregar($statement, $parametro){
			$datos = $parametro->toArray();
			$statement->execute([$datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6]]);			
		}

		public function queryEliminar(){
			$query = "DELETE FROM prestamo.prestamo WHERE idPrestamo = ?";
			return $query;
		}

		public function metodoEliminar($statement, $parametro){
			$statement->execute([$parametro]);
			$filasAfectadas = $statement->rowCount();
			return $filasAfectadas;
		}

		public function queryModificar(){
			$query = "UPDATE prestamo.prestamo SET montoPendiente=? WHERE idPrestamo=?";
			return $query;
		}

		public function metodoModificar($statement, $parametro1, $parametro2){
			$statement->execute([$parametro2, $parametro1]);
			$filasAfectadas = $statement->rowCount();
			return $filasAfectadas;
		}

		public function queryBuscarPor($parametro, $filtro){
			$valor = $parametro->getValor($filtro);
			$tipo = $parametro->getTipo($filtro);
			if($tipo == 1){
				return $query = "SELECT * FROM prestamo.prestamo WHERE $filtro = $valor";
			}else{
				return $query = "SELECT * FROM prestamo.prestamo WHERE $filtro = '$valor'";
			}
		}

		public function metodoBuscarPor($resultSet){
			$arrayDeObjetos = array();
			if(!empty($resultSet)){
				foreach($resultSet as $fila){
					$a = new Prestamo($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7]);
					array_push($arrayDeObjetos, $a);
				}	
			}
			return $arrayDeObjetos;
		}


		//**************************************************************************METODOS DET**************************************************************************
		public function queryAgregarDetalle(){
			$query = "INSERT INTO prestamo.cuotaPrestamo (idPrestamo, numeroCuota) VALUES(?, ?)";			
			return $query;
		}

		public function metodoAgregarDetalle($statement, $parametro1, $parametro2){
			$statement->execute([$parametro1, $parametro2]);			
		}

		public function queryEliminarDetalle(){
			$query = "DELETE FROM prestamo.cuotaPrestamo WHERE idPrestamo = ?";
			return $query;
		}

		public function metodoEliminarDetalle($statement, $parametro){
			$statement->execute([$parametro]);
			$filasAfectadas = $statement->rowCount();
			return $filasAfectadas;
		}

		public function queryModificarDetalle(){
			$query = "UPDATE prestamo.cuotaPrestamo SET fechaCancelada=CURDATE() WHERE idCuotaPrestamo=?";
			return $query;
		}

		public function metodoModificarDetalle($statement, $parametro){
			$statement->execute([$parametro]);
			$filasAfectadas = $statement->rowCount();
			return $filasAfectadas;
		}

		public function queryBuscarDetallePor($parametro, $filtro){
			$valor = $parametro->getValor($filtro);
			$tipo = $parametro->getTipo($filtro);
			if($tipo == 1){
				return $query = "SELECT * FROM prestamo.cuotaPrestamo WHERE $filtro = $valor";
			}else{
				return $query = "SELECT * FROM prestamo.cuotaPrestamo WHERE $filtro = '$valor'";
			}
		}

		public function metodoBuscarDetallePor($resultSet){
			$arrayDeObjetos = array();
			if(!empty($resultSet)){
				foreach($resultSet as $fila){
					$a = new CuotaPrestamo($fila[0], $fila[1], $fila[2], $fila[3]);
					array_push($arrayDeObjetos, $a);
				}	
			}
			return $arrayDeObjetos;
		}

				
	}


?>