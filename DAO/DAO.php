<?php
	
	/*
	* @author Adrian 
	* https://github.com/AdrianLovo/ControlDePrestamos
	*/
	
	require_once("Conexion.php");	
	require_once("../Logs/LogError.php");
	require_once("../Logs/logWarning.php");

	abstract class DAO extends Conexion{

		abstract function queryListar($parametro);						
		abstract function queryAgregar();						
		abstract function queryEliminar();						
		abstract function queryModificar();						
		abstract function queryBuscarPor($parametro, $filtro);	

		abstract function metodoListar($resultSet);				
		abstract function metodoAgregar($statement, $parametro);
		abstract function metodoEliminar($statement, $parametro);				
		abstract function metodoModificar($statement, $parametro1, $parametro2);
		abstract function metodoBuscarPor($resultSet);

		abstract function queryListarDetalle();
		abstract function queryAgregarDetalle();	
		abstract function queryEliminarDetalle();				
		abstract function queryModificarDetalle();
		abstract function queryBuscarDetallePor($parametro, $filtro);

		abstract function metodoListarDetalle($resultSet);
		abstract function metodoAgregarDetalle($statement, $parametro1, $parametro2);
		abstract function metodoEliminarDetalle($statement, $parametro);	
		abstract function metodoModificarDetalle($statement, $parametro);
		abstract function metodoBuscarDetallePor($resultSet);

		/*
		* Metodo para listar todos los elementos de tabla "Prestamo"
 		* @access: public
 		* @return: array() de objetos "Prestamo" 
 		*/
		public function listar($parametro) {
			$arrayDeObjetos = array();
			$pdo = $this->conectar();
			try {
				$resultSet = $pdo->query($this->queryListar($parametro));
				$arrayDeObjetos = $this->metodoListar($resultSet);
				$this->desconectar();
				return $arrayDeObjetos;
			} catch (Exception $e) {
				LogErro::guardarLog("Sql.log", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
			}finally{
				$this->desconectar();
			}
		}	

		/*
		* Metodo para agregar 1 registro a la tabla "Prestamo"
		* @access: public
		* @param:  $parametro (Objeto de la clase Prestamo)		
 		* @return: $filasAfectadas (int de registros agregados)
 		*/
		public function agregar($parametro){
			$pdo = $this->conectar();
			try{
				$pdo->beginTransaction();
				$statement = $pdo->prepare($this->queryAgregar());
				$this->metodoAgregar($statement, $parametro);
				$idGenerado = $pdo->lastInsertId();	

				for($i = 1; $i <=$parametro->getCantidadCuotas(); $i++){
					$statement2 = $pdo->prepare($this->queryAgregarDetalle());
					$this->metodoAgregarDetalle($statement2, $idGenerado, $i);	
				}
				$pdo->commit();
				return $idGenerado;
			}catch(PDOException $e){
				$pdo->rollBack();
				LogError::guardarLog("Sql.log", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
			}finally{
				$this->desconectar();
			}
		}

		/*
		* Metodo para eliminar registrosa de la tabla "Prestamo" segun "id"
		* @access: public
		* @param:  $parametro (int indicando identificado)		
 		* @return: $filasAfectadas (int de registros eliminados)
 		*/
		public function eliminar($parametro) {
			$pdo = $this->conectar();
			try{
				$pdo->beginTransaction();
				$statement = $pdo->prepare($this->queryEliminar());
				$filasAfectadas = $this->metodoEliminar($statement, $parametro);

				$statement2 = $pdo->prepare($this->queryEliminarDetalle());
				$filasAfectadas2 = $this->metodoEliminarDetalle($statement2, $parametro);
				$pdo->commit();
				
				return $filasAfectadas;
			}catch(Exception $e){
				$pdo->rollBack();
				LogError::guardarLog("Sql.log", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
			}finally{
				$this->desconectar();
			}
		}

		/*
		* Metodo para modificar registrosa de la tabla "Prestamo" segun "id"
		* @access: public
		* @param:  $parametro (Objeto de la clase Prestamo)		
 		* @return: $filasAfectadas (int de registros modificados)
 		*/
		public function modificar($parametro){
			$pdo = $this->conectar();
			try{
				$statement = $pdo->prepare($this->queryModificar());
				$filasAfectadas = $this->metodoModificar($statement, $parametro);
				return $filasAfectadas;
			}catch(Exception $e){
				LogError::guardarLog("Sql.log", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
			}finally{
				$this->desconectar();
			}
		}

		/*
		* Metodo para listar todos segun el filtro indicado
 		* @access: public
 		* @return: array() de objetos "Prestamo" 
 		*/
		public function buscar($parametro, $filtro) {
			$arrayDeObjetos = array();
			$pdo = $this->conectar();
			try {
				$resultSet = $pdo->query($this->queryBuscarPor($parametro, $filtro));
				$arrayDeObjetos = $this->metodoBuscarPor($resultSet);
				$this->desconectar();
				return $arrayDeObjetos;
			} catch (Exception $e) {
				LogErro::guardarLog("Sql.log", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
			}finally{
				$this->desconectar();
			}
		}




		/*
		* Metodo para listar todos los elementos de tabla "Prestamo"
 		* @access: public
 		* @return: array() de objetos "Prestamo" 
 		*/
		public function listarDetalle() {
			$arrayDeObjetos = array();
			$pdo = $this->conectar();
			try {
				$resultSet = $pdo->query($this->queryListarDetalle());
				$arrayDeObjetos = $this->metodoListarDetalle($resultSet);
				$this->desconectar();
				return $arrayDeObjetos;
			} catch (Exception $e) {
				LogErro::guardarLog("Sql.log", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
			}finally{
				$this->desconectar();
			}
		}
	
		/*
		* Metodo para modificar registrosa de la tabla "Prestamo" segun "id"
		* @access: public
		* @param:  $parametro (Objeto de la clase Prestamo)		
 		* @return: $filasAfectadas (int de registros modificados)
 		*/
		public function modificarDetalle($parametro1, $parametro2, $parametro3){
			$pdo = $this->conectar();
			try{
				$pdo->beginTransaction();

				$statement = $pdo->prepare($this->queryModificar());
				$filasAfectadas = $this->metodoModificar($statement, $parametro1, $parametro3);
				
				$statement2 = $pdo->prepare($this->queryModificarDetalle());
				$filasAfectadas2 = $this->metodoModificarDetalle($statement2, $parametro2);

				$pdo->commit();
				return $filasAfectadas;
			}catch(Exception $e){
				$pdo->rollBack();
				LogError::guardarLog("Sql.log", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
			}finally{
				$this->desconectar();
			}
		}

		/*
		* Metodo para listar todos segun el filtro indicado
 		* @access: public
 		* @return: array() de objetos "Prestamo" 
 		*/
		public function buscarDetalle($parametro, $filtro) {
			$arrayDeObjetos = array();
			$pdo = $this->conectar();
			try {
				$resultSet = $pdo->query($this->queryBuscarDetallePor($parametro, $filtro));
				$arrayDeObjetos = $this->metodoBuscarDetallePor($resultSet);
				$this->desconectar();
				return $arrayDeObjetos;
			} catch (Exception $e) {
				LogErro::guardarLog("Sql.log", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
			}finally{
				$this->desconectar();
			}
		}
		

	}




