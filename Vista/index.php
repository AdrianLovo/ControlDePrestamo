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
                <a class="nav-link" href="Cancelados.php">Listado Cancelados</a>
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
                        <th></th>
                    </tr>
                </thead>
            </table>

            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAgregar">
              Agregar Nuevo Registro
            </button>

        </div>        

        <!-- The Modal -->
        <div class="modal fade" id="ModalAgregar" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo Registro</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    
                    <div class="form-group row">
                        <label for="inputNombre" class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" maxlength="50">
                        </div>                  
                        <label for="inputTotalPrestamo" class="col-sm-4 col-form-label">Total Prestamo</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="inputTotalPrestamo" placeholder="#" onkeypress='return validaNumericos(event)' maxlength="6">
                        </div>
                        <label for="inputCuota" class="col-sm-4 col-form-label">Cuota</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="inputCuota" placeholder="#" maxlength="6" onkeypress='return validaNumericos(event)'>
                        </div>
                        <label for="inputCantidadCuotas" class="col-sm-4 col-form-label">Cantidad Cuotas</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="inputCantidadCuotas" placeholder="#" maxlength="6" onkeypress='return validaNumericos(event)'>
                        </div>                 
                        <label for="inputFecha" class="col-sm-4 col-form-label">Fecha</label>
                        <div class="col-sm-8">
                            <input type="date" id="inputFecha" style="width: 100%;" min="1900-01-01" max="2050-12-31">
                        </div>                   
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-success" value="Guardar" onclick="agregar()"/>
                </div>  

            </div>
          </div>
        </div>
        
    </div>


    <!-- DataTable JS-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- Boostrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Controlador -->
    <script type="text/javascript" src="../Controller/ControllerIndex.js"></script>
    <script type="text/javascript" src="../Resources/alertify/alertify.min.js"></script>
	    
</body>
</html>