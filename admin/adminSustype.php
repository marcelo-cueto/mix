<?php
session_start();

if (!isset($_SESSION['admin_email'])) {
    header('Location: adminLogin.php');
    exit();
}
include_once 'partials/head.php'; ?>
<?php include_once 'partials/sidebar.php'; ?>

<div id="content" class="p-4 p-md-5 pt-5" type='hidden'>
  <div class="d-flex">
    <h2 class="mb-4" style="width:80%">Noticias</h2>
    <button type='button' id='' class='add btn btn-success float-right'  ><i class='fa fa-plus' ></i></button>
  </div>
  <div id="cuadro2" class="col-sm-12 col-md-12 col-lg-12 ocultar" >
       <h2 class="mb-4">Editar Suscripciones</h2>
       <form id="editform" action="" enctype="multipart/form-data" method="post" class="col-sm-12 col-md-12 col-lg-12">
         <div class="form-row">
           <label for="total">Monto de la suscrpción</label>
           <input type="" class='total form-control' name='total' value="">
           <input type="hidden" id='currency' name='currency' value="ARS" >
           <input type="hidden" id='type' name='type' value="dynamic" >
           <label for="name">Nombre de la Suscripcion</label>
           <input type="" class='name form-control' name='name' value="">
           <label for="description">Descripción</label>
           <input type="" class='description form-control' name='description' value="">
           <label for="interval">Intervalo de Cobros</label>
           <select class="interval form-control" name="interval">
             <option value="7d">7 días</option>
             <option value="15d">15 días</option>
             <option value="1m">1 mes</option>
             <option value="2m">2 meses</option>
             <option value="3m">3 meses</option>
             <option value="6m">6 meses</option>
             <option value="1y">1 año</option>

           </select>
           <label for="trial">Periodo de Prueba</label>
           <select class="interval form-control" name="trial">
             <option value="">Sin periodo de prueba</option>
             <option value="7d">7 días</option>
             <option value="15d">15 días</option>


           </select>

           <label for="limit">Cantidad de periodos</label>
           <select class="interval form-control" name="limit">
             <option value=0>Indefinido</option>
             <option value=1>1 periodo</option>
             <option value=2>2 periodos</option>
             <option value=3>3 periodos</option>


           </select>

         <input id='opcion' type="hidden" name="opcion" value="">
         <input id="crear" type="button" class="btn btn-success" value="Crear" style="margin: 1%">
         <input id="guardar" type="submit" class="btn btn-primary" value="Guardar" style="margin: 1%">
         <input id="listar" type="button" class="btn btn-primary" value="Listar" style="margin: 1%">


         </div>





       </form>
       <form class="deleteform" action="" method="post"  style="align:center">
         <input type="hidden" class='id' id='id' name='id' value="" >
         <input type="hidden" class='opcion1' name="opcion" value="eliminar">
         <input id="elimiar" type="button" class="btn btn-danger" value="eliminar">

   		</form>


     </div>

     <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">

       <div class="mensaje">

       </div>
  <table class="notice table table-striped table-bordered" style="width:100%">
    <thead>


    <tr>

      <th>Id de aplicacion</th>
      <th>intervalo</th>
      <th>limite </th>
      <th>URL corta</th>
      <th>URL</th>
      <th>Moneda</th>
      <th>Estado</th>
      <th>Descripción</th>
      <th>Monto</th>
      <th>Fecha de creacion</th>
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
<script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<!--Librerias para botones de exportación-->
<script src="js/buttons.html5.min.js"></script>



<script type="text/javascript">
  $(document).ready(function() {
    listar();
    guardar();
    eliminar();
    dataAdd();





  })
  $('#listar').on('click', function(){
    listar();
  })




  var guardar=function(){
    $('#editform').on('submit', function(e){
      e.preventDefault();

      var frm=$(this).serialize();

      $.ajax({
        method:'POST',
        url: 'ajax/createsusc.php',
        data: frm,

      }).done(function(info){
        console.log(info);

      })
    })
  }

  var eliminar=function(){
    $('#elimiar').on('click', function(e){
      var id=$('#editform #id').val()
      console.log(id);
      $.ajax({
        method:'POST',
        url: 'ajax/eliminarNoticia.php',
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
        'url': 'ajax/tsusajax.php'
      },
      'columns':[
        {'data':'uid'},
        {'data':'intervalo'},
        {'data':'limite'},
        {'data':'shorten_url'},
        {'data':'url'},
        {'data':'currency'},
        {'data':'status'},
        {'data':'description'},
        {'data':'total'},
        {'data':'created'},
        {'defaultContent': "<button type='button' class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button>	" }
      ],
      "language":idioma,
        dom: 'Bfrtip',
        'buttons':[

          {
              extend:    'excelHtml5',
              text:      '<i class="far fa-file-excel fa-2x" ></i>',
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

      $('#crear').show();
      $('#guardar').show();
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
var mostrar_mensaje = function(informacion){

  switch (informacion) {
    case '1':
      var texto = "<strong>Bien!</strong> Se han guardado los cambios correctamente.";
      var color = "#379911";
      break;
    case '2':
      var texto = "<strong>Error</strong>, no se ejecutó la consulta.";
      var color = "#C9302C";
      break;

    case '3':
      var texto = "<strong>Información!</strong> el usuario ya existe.";
      var color = "#C9302C";

      break;
    case '4':
      var texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
      var color = "#ddb11d";
      break;

  }


  $(".mensaje").html( texto ).css({"color": color, 'font-size':'200%' });
  $(".mensaje").fadeOut(10000, function(){
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
      $('#guardar').removeAttr("type").attr("type", "submit");
      $('#crear').hide();
      $('#elimiar').show();
      var form=$('.form').val(1)
          id=$('#id').val(data.notice_id);
          title=$('.title').val(data.titulo);
          text=$('.text').val(data.texto);
          date=$('#date').val(data.fecha);

          var opcion=$('#opcion').val(0);
          $("#cuadro2").slideDown("slow");
          $("#cuadro1").slideUp("slow");
    });
    };
    var dataAdd=function(){

    $('.add').on('click', function(){
      limpiar_datos();

      $('#guardar').hide();
      $('#elimiar').hide();
      $('#crear').show();
      $('#crear').removeAttr("type").attr("type", "submit");
      var form=$('.form').val(0);
      var d = new Date();

      var month = d.getMonth()+1;
      var day = d.getDate();

      var output = d.getFullYear() + '-' +
          (month<10 ? '0' : '') + month + '-' +
          (day<10 ? '0' : '') + day;
          date=$('#date').val(output)
          id=$('.id').val('null');
      var opcion=$('#opcion').val(1);
          $("#cuadro2").slideDown("slow");
          $("#cuadro1").slideUp("slow");
    });
  };
    var dataDeleter=function(tbody, table){
  $(tbody).on('click','button.eliminar', function(){
    var data=table.row($(this).parents('tr')).data();
    var id=$('.deleteform .id').val(data.notice_id);
    var opcion='eliminar'
    console.log(id);


});
};
</script>
</html>
