<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: adminLogin.php');
    exit();
}
include_once 'partials/head.php'; ?>
<?php include_once 'partials/sidebar.php'; ?>

<div id="content" class="p-4 p-md-5 pt-5">
  <div class="d-flex">
    <h2 class="mb-4" style="width:80%">Clientes</h2>
    <button type='button' id='' class='add btn btn-success float-right'  ><i class="fas fa-plus"></i></button>
  </div>


     <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">

       <div class="mensaje">

       </div>
  <table class="suscritors table table-striped table-bordered" style="width:100%">
    <thead>


    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Email</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Profesion</th>
      <th>Sueldos</th>
      <th>Constitucion de sociedades</th>
      <th>Monotributo </th>
      <th>Autonomos</th>
      <th>Contabilidad y balances</th>
      <th>Gestion</th>
      <th>Judiciales</th>
      <th>Certificaciones</th>
      
      <th>Comentario</th>



      <th></th>
    </tr>
    </thead>
    <tbody>

    </tbody>

  </table>
  </div>
</div>


</body>


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

  })

  $('#listar').on('click', function(){
    listar();
  })


  var listar=function(){
    $("#cuadro2").slideUp("slow");
    $("#cuadro1").slideDown("slow");
    var table=$('.suscritors').DataTable({
      'destroy':true,
      'ajax':{
        'method':'POST',
        'url': 'ajax/cliajax.php'
      },
      'columns':[
        {'data':'name'},
        {'data':'apellido'},
        {'data':'email'},
        {'data':'direccion'},
        {'data':'tel'},
        {'data':'profesion'},
        {'data':'sueldos'},
        {'data':'sociedades'},
        {'data':'monotributo'},
        {'data':'autonomos'},
        {'data':'contabilidad'},
        {'data':'gestion'},
        {'data':'judiciales'},
        {'data':'certificaciones'},
        {'data':'comentario'},


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

</script>
</html>
