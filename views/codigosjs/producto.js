var tabla;


function init() {
    mostrarelformulario(false);
    listar();

    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })

    $.post("../ajax/producto.php?op=selectProdu",function(r){
                $("#idtienda").html(r);
    });

    $("#imagenmuestra").hide();
}
function limpiar(){
    
    $("#nombreproducto").val("");
    $("#sku").val("");
    $("#descripcion").val("");
    $("#valor").val("");
    $("#imagenmuestra").attr("src","");
    $("#imagenactual").val("");
    $("#idtienda").val("");
    
    
    
    
}

function mostrarelformulario(x){
    limpiar();

    if(x){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}
function cancelarformulario(){
    limpiar();
    mostrarelformulario(false);
}
function listar() {
    tabla=$("#tablalistado").dataTable(
        {
            "aProcessing":true,
            "aServerSide":true,
                dom:'Bfrtip',
                    buttons:[
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdf'
                    ],
                    "ajax":
                        {
                            url:'../ajax/producto.php?op=listar',
                            type:"get",
                            dataType:"json",
                            error: function(e){
                                console.log(e.responseText);
                            }
                        },
                    "bDestroy":true,
                    "iDisplayLength":10,
                    "order":[[0,"desc"]]
        }).DataTable();
}

function guardaryeditar(e){
    e.preventDefault();
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
            $.ajax({
            url:'../ajax/producto.php?op=guardareditar',
            type:"POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){

                //bootbox.alert(datos);
                mostrarelformulario(false);
                tabla.ajax.reload();

                swal.fire(
                    'Registro!',
                    'Tienda Guardada Exitosamente!!',
                    'success'
                )
                // $('#formulario')[0].reset();
                // $("#formularioregistros").modal('hide');
                // $("#tablalistado").DataTable().ajax.reload();
            }
            });
    limpiar();
}
function mostrar(sku){
    $.post("../ajax/producto.php?op=mostrar",{sku:sku},function(data,status){

        data=JSON.parse(data);
        mostrarelformulario(true);

        $("#idtienda").val(data.idtienda);
        $("#nombreproducto").val(data.nombre_producto);
        $("#descripcion").val(data.descripcion);
        $("#valor").val(data.valor);
        //$("#imagenmuestra").show();
        //$("#imagenmuestra").atrr("src","../files/productos"+data.foto);
        //$("#imagenactual").val(data.foto);
        $("#sku").val(data.sku);

    })    
}
function eliminar(sku){
    Swal.fire({
        title: 'Producto',
        text: "Desea Eliminar el Registro!",
        icon: 'error ',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si Borrar Registro!'

      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/producto.php?op=eliminar",{sku:sku},function(data){

            });
            tabla.ajax.reload();
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
          )
        }
      })
}
function desactivar(sku){
    bootbox.confirm("esta seguro de desactivar el producto",function(result){
        if(result){
            $.post("../ajax/producto.php?op=desactivar",{sku:sku},function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function activar(sku){
    bootbox.confirm("esta seguro de activar el producto",function(result){
        if(result){
            $.post("../ajax/producto.php?op=activar",{sku:sku},function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}


init();