<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: adminLogin.php');
    exit();
}
include_once 'partials/head.php'; ?>
<?php include_once 'partials/sidebar.php'; ?>

<div id="content" class="p-4 p-md-5 pt-5">
  <h2 class="mb-4">Comentarios</h2>

  <div id="cuadro2" class="col-sm-12 col-md-12 col-lg-12 ocultar" >
       <h2 class="mb-4">Eliminar Comentarios</h2>

       <form class="deleteform" action="" method="post">
         <input type="hidden" class='id' name='id' value="" >
         <input type="hidden" class='opcion1' name="opcion" value="eliminar">
         <div class="mensaje">

         </div>
         <input id="elimiar" type="button" class="btn btn-danger" value="eliminar" style='margin: 2% '>
         <input id="listar" type="button" class="btn btn-primary" value="Cancelar" style="margin: 2%">

   		</form>


     </div>

     <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">


  <table class="suscritors table table-striped table-bordered" style="width:100%">
    <thead>


    <tr>
      <th>Noticia</th>
      <th>Comentario</th>
      <th>fecha</th>
      <th>Autor comentario</th>
      <th></th>
    </tr>
    </thead>
    <tbody>

    </tbody>

  </table>
  </div>
</div>


</body>


<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/dataTables.buttons.min.js"></script>
<script src="js/buttons.bootstrap.min.js"></script>
<!--Libreria para exportar Excel-->
<script src="js/jszip.min.js"></script>
<!--Librerias para exportar PDF-->

<script src="js/vfs_fonts.js"></script>
<!--Librerias para botones de exportación-->
<script src="js/buttons.html5.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    listar();

    eliminar();



  })

  $('#listar').on('click', function(){
    limpiar_datos();
    listar();
  })

  var eliminar=function(){
    $('#elimiar').on('click', function(e){
      var frm=$('.deleteform').serialize();
      console.log(frm);
      $.ajax({
        method:'POST',
        url: 'ajax/eliminarcom.php',
        data: frm
      }).done(function(info){

        limpiar_datos();
        listar();

      })
    })
  }
  var listar=function(){
    $("#cuadro2").slideUp("slow");
    $("#cuadro1").slideDown("slow");
    var table=$('.suscritors').DataTable({
      'destroy':true,
      'ajax':{
        'method':'POST',
        'url': 'ajax/comajax.php'
      },
      'columns':[
        {'data':'titulo'},
        {'data':'comentario'},
        {'data':'fecha'},
        {'data':'suscriptor'},
        {'defaultContent': "</button>	<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>	" }
      ],
      "language":idioma,
        dom: 'Bfrtip',
        'buttons':[

          {
              extend:    'excelHtml5',
              text:      '<i class="far fa-file-excel fa-2x"></i>',
              titleAttr: 'Excel'
          },
          {
              extend:    'csvHtml5',
              text:      '<i class="fa fa-file-text-o fa-2x"></i>',
              titleAttr: 'CSV'
          },
          {
              extend:    'pdfHtml5',
              text:      '<i class="fa fa-file-pdf-o fa-2x"></i>',
              titleAttr: 'PDF'
          }
        ],


    });

      dataDeleter('.suscritors tbody', table);


    }
    var idioma={
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
}
    var mostrar_mensaje = function( informacion ){
      var texto = "", color = "";
      if( informacion.respuesta == "BIEN" ){
      texto = "<strong>Bien!</strong> Se han guardado los cambios correctamente.";
      color = "#379911";
      }else if( informacion.respuesta == "ERROR"){
      texto = "<strong>Error</strong>, no se ejecutó la consulta.";
      color = "#C9302C";
      }else if( informacion.respuesta == "EXISTE" ){
      texto = "<strong>Información!</strong> el usuario ya existe.";
      color = "#5b94c5";
      }else if( informacion.respuesta == "VACIO" ){
      texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
      color = "#ddb11d";
      }

    $(".mensaje").html( texto ).css({"color": color });
    $(".mensaje").fadeOut(5000, function(){
    $(this).html("");
    $(this).fadeIn(3000);
    });
    }

    var limpiar_datos = function(){
    $(".id").val("");

    }


    var dataDeleter=function(tbody, table){
  $(tbody).on('click','button.eliminar', function(){
    var data=table.row($(this).parents('tr')).data();
    var id=$('.id').val(data.coment_id);
    console.log(id);
    $("#cuadro2").slideDown("slow");
    $("#cuadro1").slideUp("slow");
    $(".mensaje").html( '<strong>Cuidado</strong>, ustdes esta <strong>Borrando</strong> el siguiente comentario:"'+data.comentario+'".' ).css({"color":'#C9302C', 'margin-botton':'3%'});

});
};
</script>
</html>
