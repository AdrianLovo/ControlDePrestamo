<?php

	/*
	* @author Adrian 
	* https://github.com/AdrianLovo/ControlDePrestamos
	*/
	
	class Prestamo{

		//Atributos
		private $idPrestamo;
		private $nombrePersona;
		private $totalPrestamo;
		private $cuota;
		private $cantidadCuotas;
		private $fechaPrestamo;
		private $montoPendiente;

		//Constructor
		public function __construct($idPrestamo, $nombrePersona, $totalPrestamo, $cuota, $cantidadCuotas, $fechaPrestamo, $montoPendiente){
			$this->idPrestamo = $idPrestamo;
			$this->nombrePersona = $nombrePersona;
			$this->totalPrestamo =$totalPrestamo;
			$this->cuota = $cuota;
			$this->cantidadCuotas =$cantidadCuotas;
			$this->fechaPrestamo = $fechaPrestamo;
			$this->montoPendiente = $montoPendiente;
		}

		
		//Metodos Get y Set
		public function getIdPrestamo(){
		    return $this->idPrestamo;
		}
		
		public function setIdPrestamo($idPrestamo){
		    $this->idPrestamo = $idPrestamo;
		}

		public function getNombrePersona(){
			return $this->nombrePersona;
		}

		public function setNombrePersona($nombrePersona){
			$this->nombrePersona = $nombrePersona;
		}

		public function getTotalPrestamo(){
			return $this->totalPrestamo;
		}

		public function setTotalPrestamo($totalPrestamo){
			$this->totalPrestamo = $totalPrestamo;
		}

		public function getCuota(){
			return $this->cuota;
		}

		public function setCuota($cuota){
			$this->cuota = $cuota;
		}

		public function getCantidadCuotas(){
			return $this->cantidadCuotas;
		}

		public function setCantidadCuotas($cantidadCuotas){
			$this->cantidadCuotas = $cantidadCuotas;
		}

		public function getFechaPrestamo(){
			return $this->fechaPrestamo;
		}

		public function setFechaPrestamo($fechaPrestamo){
			$this->fechaPrestamo = $fechaPrestamo;
		}

		public function getMontoPendiente(){
			return $this->montoPendiente;
		}

		public function setMontoPendiente($montoPendiente){
			$this->montoPendiente = $montoPendiente;
		}

		

		//Metodo toString para mostrar campos de objeto
		public function toString(){
			echo(
				"idPrestamo: " . $this->idPrestamo .
				"nombrePersona: " . $this->nombrePersona .
				"totalPrestamo: " . $this->totalPrestamo .
				"cuota: " . $this->cuota .
				"cantidadCuotas: " . $this->cantidadCuotas .
				"fechaPrestamo: " . $this->fechaPrestamo .
				"montoPendiente: " . $this->montoPendiente 
			);
		}

		//Metodo para obtener los datos de los atributos en un array
		public function toArray(){
			$datos = array($this->idPrestamo, $this->nombrePersona, $this->totalPrestamo, $this->cuota, $this->cantidadCuotas, $this->fechaPrestamo, $this->montoPendiente);
			return $datos;
		}

	}


?>