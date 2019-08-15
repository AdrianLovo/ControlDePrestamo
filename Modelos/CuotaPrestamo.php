<?php
	/*
	* @author Adrian 
	* https://github.com/AdrianLovo/ControlDePrestamos
	*/
	class CuotaPrestamo{

		//Atributos
		private $idCuotaPrestamo;
		private $idPrestamo;
		private $numeroCuota;
		private $fechaCancelada;
		
		//Constructor
		public function __construct($idCuotaPrestamo, $idPrestamo, $numeroCuota, $fechaCancelada){
			$this->idCuotaPrestamo = $idCuotaPrestamo;
			$this->idPrestamo = $idPrestamo;
			$this->numeroCuota = $numeroCuota;
			$this->fechaCancelada = $fechaCancelada;
		}

		
		//Metodos Get y Set
		public function getIdCuotaPrestamo(){
			return $this->idCuotaPrestamo;
		}

		public function setIdCuotaPrestamo($idCuotaPrestamo){
			$this->idCuotaPrestamo = $idCuotaPrestamo;
		}

		public function getIdPrestamo(){
		    return $this->idPrestamo;
		}
		
		public function setIdPrestamo($idPrestamo){
		    $this->idPrestamo = $idPrestamo;
		}

		public function getNumeroCuota(){
		    return $this->numeroCuota;
		}
		
		public function setNumeroCuota($numeroCuota){
		    $this->numeroCuota = $numeroCuota;
		}

		public function getFechaCancelada(){
		    return $this->fechaCancelada;
		}
		
		public function setFechaCancelada($fechaCancelada){
		    $this->fechaCancelada = $fechaCancelada;
		}
		

		//Metodo toString para mostrar campos de objeto
		public function toString(){
			echo(
				"idCuotaPrestamo: " . $this->idCuotaPrestamo.
				"idPrestamo: " . $this->idPrestamo.
				"numeroCuota: " . $this->numeroCuota.
				"fechaCancelada: " . $this->fechaCancelada
			);
		}

		//Metodo para obtener los datos de los atributos en un array
		public function toArray(){
			$datos = array($this->idCuotaPrestamo, $this->idPrestamo, $this->numeroCuota, $this->fechaCancelada);
			return $datos;
		}

		//Obtiene el valor segun el filtro
		public function getValor($filtro){
			switch ($filtro) {
				case 'idCuotaPrestamo':
					return $this->idCuotaPrestamo;
					break;		
				case 'idPrestamo':
					return $this->idPrestamo;
					break;	
				case 'numeroCuota':
					return $this->numeroCuota;
					break;			
				case 'fechaCancelada':
					return $this->fechaCancelada;
					break;	
			}
		}

		/*Obtiene el tipo segun el filtro
			Entero = 1
			cadena = 2
		*/
		public function getTipo($filtro){
			switch ($filtro) {
				case 'idCuotaPrestamo':
					return 1;
					break;		
				case 'idPrestamo':
					return 1;
					break;	
				case 'numeroCuota':
					return 1;
					break;			
				case 'fechaCancelada':
					return 2;
					break;	
			}
		}

	}


?>