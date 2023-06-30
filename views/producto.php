<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>  

    <link href="../public/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../public/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../public/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../public/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">

    <link href="../public/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
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
                                
                                <h1 class="box-title" >Productos</h1>
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
                                        <th>Nombre productos</th>
                                        <th>SKU</th>
                                        <th>Descripcion</th>
                                        <th>valor</th>
                                        <th>Imagen</th>
                                        <th>tienda</th>                                        
                                    </thead>
                                    <tbody  >
                                    </tbody>                                   
                                </table>
                            </div>

                            <div class="card-body" id="formularioregistros">
                                <form name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nombre de procuto</label>
                                                <input type="hidden" name="sku" id="sku">
                                                <input type="text" class="form-control" name="nombreproducto" id="nombreproducto"
                                                    placeholder="Nombre del producto" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>descripcion</label>
                                                <input type="text" class="form-control" name="descripcion"
                                                    id="descripcion" placeholder="escribir descripcion" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>valor</label>
                                                <input type="text" class="form-control" name="valor"
                                                    id="valor" placeholder="escribir Valor" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>imagen</label>
                                                <input type="file" class="form-control" name="foto"id="foto">
                                                <input type="hidden" name="imagenactual" id="imagenactual"><br>
                                                <img src="" width="150px" height="120px" id="imagenmuestra">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tienda</label>
                                                <select name="idtienda" class="form-control"
                                                    id="idtienda"></select>

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
    <!-- jQuery -->
    <script src="../public/plugins/jquery/jquery.min.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="../public/plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   
<script src="../public/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../public/plugins/jquery-knob/jquery.knob.min.js"></script>

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

<script type="text/javascript"src="codigosjs/producto.js" ></script> 
    
</body>
</html>