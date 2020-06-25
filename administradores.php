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
    <h2 class="mb-4" style="width:80%">Administradores</h2>
    <button type='button' id='' class='add btn btn-success float-right'  ><i class='fa fa-plus'></i></button>
  </div>

  <div id="cuadro2" class="col-sm-12 col-md-12 col-lg-12 ocultar" >
       <h2 class="mb-4">Editar suscriptor</h2>
       <form id="editform" action="" method="post" class='needs-validation'>
         <div class="form-row">
          <div class="col">
         <input type="hidden" class='id' name='id' value="" >
         <label for="name">Nombre</label>
         <input type="text" class='name form-control' name='name' value="" required>
         <label for="type">Contraseña</label>
         <input type="password" class='pass form-control' name='pass' value="" required>
        </div>
        <div class="col">
         <label for="email">Email</label>
         <input type="email" class='email form-control' name='email' value="" required>

         <input id='opcion' type="hidden" name="opcion" value="">
         <input id="crear" type="button" class="btn btn-success" value="Crear">
         <input id="guardar" type="button" class="btn btn-primary" value="Guardar">
         <input id="listar" type="button" class="btn btn-primary" value="Listar">

         </div>
         </div>






         </form> <br>
         <form class="deleteform" action="" method="post">
           <input type="hidden" class='id' name='id' value="" >
           <input type="hidden" class='opcion1' name="opcion" value="eliminar">
           <input id="elimiar" type="button" class="btn btn-danger" value="Eliminar">

     		</form>


       </div>

       <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
         <div class="mensaje">

         </div>

    <table class="suscritors table table-striped table-bordered" style="width:100%">
      <thead>


      <tr>
        <th>Nombre</th>
        <th>Email</th>
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
  (function() {

          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
    $(document).ready(function() {
      listar();
      guardar();
      eliminar();
      dataObteiner();
      dataAdd();

    })

    $('#listar').on('click', function(){
      listar();
    })
    var guardar=function(){
      $('#editform').on('submit', function(e){
        e.preventDefault();
        var frm=$('#editform').serialize();
        console.log(frm);
        $.ajax({
          method:'POST',
          url: 'ajax/saveAdmin.php',
          data: frm
        }).done(function(info){
          console.log(info);
          mostrar_mensaje(info);
          limpiar_datos();
          listar();
        })
      })
    }

    var eliminar=function(){
      $('#elimiar').on('click', function(e){
        var frm=$('#editform').serialize()

        $.ajax({
          method:'POST',
          url: 'ajax/eliminarAdmin.php',
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
          'url': 'ajax/adminajax.php'
        },
        'columns':[
          {'data':'name'},

          {'data':'email'},

          {'defaultContent': "<button type='button' class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button>	" }
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
        dataObteiner('.suscritors tbody', table);
        dataDeleter('.suscritors tbody', table);

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
        var texto = "<strong>Información!</strong> el email ya se encontraba registrado.";
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
      $("#editform .id").val("");
      $("#editform .name").val("");

      $("#editform .email").val("");
      $("#editform .pass").val("");

      }

      var dataObteiner=function(tbody, table){
      $(tbody).on('click','button.editar', function(){
        $('#guardar').removeAttr("type").attr("type", "submit");
        $('#crear').hide();
        $('#elimiar').show();
        var data=table.row($(this).parents('tr')).data();

        var
            id=$('.id').val( data.id);
            name=$('.name').val( data.name);
            email=$('.email').val(data.email);
            opcion=$('#opcion').val(0)
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
        var id=$('.id').val('null');
            opcion=$('#opcion').val(1)
            $("#cuadro2").slideDown("slow");
            $("#cuadro1").slideUp("slow");
      });
    };
      var dataDeleter=function(tbody, table){
    $(tbody).on('click','button.eliminar', function(){
      var data=table.row($(this).parents('tr')).data();
      var id=$('.deleteform .id').val(data.id);




  });
  };
  </script>
  </html>
