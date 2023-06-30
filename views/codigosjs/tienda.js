var tabla;

function init() {
    mostrarelformulario(false);
    listar();

    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })
}
function limpiar(){

    $("#idtienda").val("");
    $("#nombretienda").val("");
    $("#fecha").val("");
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
                        url:'../ajax/tienda.php?op=listar',
                        type:"get",
                        dataType:"json",
                        error: function(e){
                            console.log(e.responseText);
                        }
                    },
                    "bDestroy":true,
                    "iDisplayLength":5,
                    "order":[[0,"desc"]]
        }).DataTable();
}

function guardaryeditar(e){
    e.preventDefault();
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
        $.ajax({
            url:'../ajax/tienda.php?op=guardareditar',
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
function mostrar(idtienda){
    $.post("../ajax/tienda.php?op=mostrar",{idtienda:idtienda},function(data){

        data=JSON.parse(data);
        mostrarelformulario(true);

        $("#idtienda").val(data.idtienda);
		$("#nombretienda").val(data.nombre_tienda);
 		$("#fecha").val(data.fecha_apertura);

    })    
}
function eliminar(idtienda){
    Swal.fire({
        title: 'Tienda',
        text: "Desea Eliminar el Registro!",
        icon: 'error ',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si Borrar Registro!'

      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/tienda.php?op=eliminar",{idtienda:idtienda},function(data){

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


init();