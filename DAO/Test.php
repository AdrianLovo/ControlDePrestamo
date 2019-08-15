<?php


	require_once("DAOPrestamo.php");
	require_once("../Modelos/Prestamo.php");

	$dao = new DAOPrestamo();
	//var_dump($dao->listar());


	//$parametro = new Prestamo(null, 'PRUEBA', 100, 30, 4, '2019-07-31', 120);
	//var_dump($dao->agregar($parametro));

	//var_dump($dao->eliminar(79));
	var_dump($dao->modificarDetalle(80,67,90));
	

	
	














?>