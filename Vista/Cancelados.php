<!DOCTYPE html>
<html>
<head>
    <title>PHP, Ajax CRUD Datatable - Adrian Lovo</title>
    
    <link rel="stylesheet" type="text/css" href="../Resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="../Resources/alertify/css/alertify.min.css">

    <!-- DataTable js-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	


</head>


<body>

    <!-- Menu Principal -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php">Menu</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Listado Pendientes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Listado Cancelados</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Todas Cuotas Pendientes</a>
              </li>
            </ul>
        </div> 
    </nav>


    <div class="row justify-content-between" style="margin-top: 50px">
    	<div class="col-md-10 offset-md-1">

            <table id="TablaDatos" class="table table-bordered">
                <thead class='thead-dark'>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Total Prestamo</th>
                        <th>Cuota</th>
                        <th>Cantidad Cuotas</th>
                        <th>Fecha Prestamo</th>  
                        <th>Pendiente</th>                                              
                    </tr>
                </thead>
            </table>

        </div>        
    </div>


    <!-- DataTable JS-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- Boostrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Controlador -->
    <script type="text/javascript" src="../Controller/ControllerCancelados.js"></script>
    <script type="text/javascript" src="../Resources/alertify/alertify.min.js"></script>
	    
</body>
</html>