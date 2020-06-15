<?php 
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: adminLogin.php');
    exit();
}
include_once 'partials/head.php'; ?>
<?php include_once 'partials/sidebar.php'; ?>

<div id="content" class="p-4 p-md-5 pt-5">
  <h2 class="mb-4">Noticias</h2>
  <button type='button' class='add btn btn-primary'><i class='fa fa-pencil-square-o'></i></button>
  <div id="cuadro2" class="col-sm-12 col-md-12 col-lg-12 ocultar" >
       <h2 class="mb-4">Editar Noticias</h2>
       <form id="editform" action="" method="post" class="col-sm-12 col-md-12 col-lg-12">
         <div class="form-row">


         <input type="hidden" class='id' name='id' value="" >
         <label for="title">Titulo</label>
         <input type="text" class='title form-control' name='title' value="">
         <label for="text">Texto</label>
         <textarea id='text'name="text" class='text form-control 'rows="12" ></textarea>



         <input type="file" class='img form-control' name='img' value="" >





         <input type="hidden" name="opcion" value="modificar">
         <input id="crear" type="button" class="btn btn-primary" value="Crear" style="margin: 1%">
         <input id="" type="submit" class="btn btn-primary" value="Guardar" style="margin: 1%">
         <input id="listar" type="button" class="btn btn-primary" value="Listar" style="margin: 1%">


         </div>





       </form>
       <form class="deleteform" action="" method="post"  style="align:center">
         <input type="hidden" class='id' name='id' value="" >
         <input type="hidden" class='opcion1' name="opcion" value="eliminar">
         <input id="elimiar" type="button" class="btn btn-danger" value="eliminar">

   		</form>


     </div>
     <div class="mensaje">

     </div>
     <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">


  <table class="notice table table-striped table-bordered" style="width:100%">
    <thead>


    <tr>
      <th>Titulo</th>
      <th>Noticia</th>
      <th>Imagen</th>
      <th>Fecha de creación</th>
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
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.bootstrap.min.js"></script>
<!--Libreria para exportar Excel-->
<script type="text/javascript" src="js/jszip.min.js"></script>
<!--Librerias para exportar PDF-->

<script type="text/javascript" src="js/vfs_fonts.js"></script>
<!--Librerias para botones de exportación-->
<script src="js/buttons.html5.min.js"></script>



<script type="text/javascript">
  $(document).ready(function() {
    listar();
    guardar();
    eliminar();
    dataAdd();
    crear();
    $('#text').Editor();

  })
  $('#listar').on('click', function(){
    listar();
  })


  var guardar=function(){
    $('#editform').on('submit', function(e){
      e.preventDefault();
      var frm=$(this).serialize();
      console.log(frm);
      $.ajax({
        method:'POST',
        url: 'ajax/saveNotice.php',
        data: frm
      }).done(function(info){
        console.log(info);
        limpiar_datos();
        listar();
      })
    })
  }
  var crear=function(){
    $('#crear').on('click', function(e){

      var frm=$('#editform').serialize();
      console.log(frm);
      $.ajax({
        method:'POST',
        url: 'ajax/createNotice.php',
        data: frm
      }).done(function(info){
        console.log(info);

      })
    })
  }
  var eliminar=function(){
    $('#elimiar').on('click', function(e){
      var id=$('#editform .id').val()
      console.log(id);
      $.ajax({
        method:'POST',
        url: 'ajax/elimiar.php',
        data: {'id':id}
      }).done(function(info){
        console.log(info);
        limpiar_datos();
        listar();

      })
    })
  }
  var listar=function(){
    $("#cuadro2").slideUp("slow");
    $("#cuadro1").slideDown("slow");
    var table=$('.notice').DataTable({
      'destroy':true,
      'ajax':{
        'method':'POST',
        'url': 'ajax/noticeajax.php'
      },
      'columns':[
        {'data':'title'},
        {'data':'texto'},
        {'data':'img'},
        {'data':'dates'},
        {'defaultContent': "<button type='button' class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button>	" }
      ],
      "language":idioma,
        dom: 'Bfrtip',
        'buttons':[

          {
              extend:    'excelHtml5',
              text:      '<i class="fa fa-file-text-o fa-2x"></i>',
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
      dataObteiner('.notice tbody', table);
      dataDeleter('.notice tbody', table);


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
    $(".title").val("");
    $(".text").val("");
    $(".img").val("");
    $(".date").val("");
    }

    var dataObteiner=function(tbody, table){
    $(tbody).on('click','button.editar', function(){
      var data=table.row($(this).parents('tr')).data();

      var form=$('.form').val(1)
          id=$('.id').val(data.id);
          title=$('.title').val(data.title);
          text=$('.text').val(data.text);
          date=$('.date').val(data.date);

          var opcion='modificar';
          $("#cuadro2").slideDown("slow");
          $("#cuadro1").slideUp("slow");
    });
    };
    var dataAdd=function(){

    $('.add').on('click', function(){
      limpiar_datos();
      var form=$('.form').val(0);
          id=$('.id').val('null');
      var opcion='crear';
          $("#cuadro2").slideDown("slow");
          $("#cuadro1").slideUp("slow");
    });
  };
    var dataDeleter=function(tbody, table){
  $(tbody).on('click','button.eliminar', function(){
    var data=table.row($(this).parents('tr')).data();
    var id=$('.deleteform .id').val(data.id);
    var opcion='eliminar'
    console.log(id);


});
};
</script>
</html>
