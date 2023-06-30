<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiendas</title>  

    <link href="../public/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../public/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../public/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../public/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">

    <link href="../public/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../public/css/bracket.css">
    
   
</head>
<body>




  <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                
                                <h1 class="box-title" >Tienda</h1>
                                <button class="btn btn-success" id="btnagregar"
                                        onclick="mostrarelformulario(true)"><i class="fa fa-plus-circle"></i>
                                        Agregar</button>
                                
                                <div class="box-tools pull-right">
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <!-- centro -->
                            
                            <div class="panel-body table-responsive" id="listadoregistros">
                                <table id="tablalistado"
                                    class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                        <th>Opciones</th>
                                        
                                        <th>Nombre de la tienda</th>
                                        <th>Fecha de apertura</th>
                                        
                                    </thead>
                                    <tbody  >
                                    </tbody>                                   
                                </table>
                            </div>
                            <div class="card-body" id="formularioregistros">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nombre de la Tienda</label>
                                                <input type="hidden" name="idtienda" id="idtienda">
                                                <input type="text" class="form-control" name="nombretienda" id="nombretienda"
                                                    placeholder="Nombre de la Tienda" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Fecha de Apertura</label>
                                                <input type="date" class="form-control" name="fecha"
                                                    id="fecha" placeholder="escribir descripcion" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button class="btn btn-primary" type="submit" id="btnGuardar"><i
                                                class="fa fa-save"></i> Guardar</button>
                                        <button class="btn btn-danger" onclick="cancelarformulario()" type="button"><i
                                                class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                    </div>
                                </form>
                            </div>
                            <!--Fin centro -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div>
  <!-- /.content-wrapper -->
<script src="../public/lib/jquery/jquery.js"></script>
<script src="../public/lib/popper.js/popper.js"></script>
<script src="../public/lib/bootstrap/bootstrap.js"></script>
<script src="../public/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="../public/lib/moment/moment.js"></script>
<script src="../public/lib/jquery-ui/jquery-ui.js"></script>
<script src="../public/lib/jquery-switchbutton/jquery.switchButton.js"></script>
<script src="../public/lib/peity/jquery.peity.js"></script>
<script src="../public/js/bracket.js"></script>

<script src="../public/lib/datatables/jquery.dataTables.js"></script>
<script src="../public/lib/datatables-responsive/dataTables.responsive.js"></script>

<script src="../public/datatables/dataTables.buttons.min.js"></script>
<script src="../public/datatables/buttons.html5.min.js"></script>
<script src="../public/datatables/buttons.colVis.min.js"></script>
<script src="../public/datatables/jszip.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>



<script type="text/javascript"src="codigosjs/tienda.js" ></script> 
    
</body>
</html>