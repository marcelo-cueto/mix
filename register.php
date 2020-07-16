<?php
session_start();
require_once 'admin/controllers/suscriptor.php';
require_once 'admin/controllers/Alert.php';
/*if ($_POST) {
   require_once('ajax/mobbex.php');
   $email = $_POST['email'];
   $dni = $_POST['dni'];
   $a = Suscriptor::mobbexsuscriber($email, $dni);
   var_dump($a);
} */
if ($_POST) {
   $_SESSION['email'] = $_POST['email'];
   $_SESSION['dni'] = $_POST['dni'];
   $_SESSION['cid'] = substr(md5(rand()), 0, 5);
   $_POST['cid'] = $_SESSION['cid'];
   $sus = Suscriptor::existsByEmail($_SESSION['email']);
   if (!$sus) {
      require_once 'ajax/mobbex.php';
      header('Location: typesus_web.php');
      exit();
   }
   unset($_SESSION['email']);
   unset($_SESSION['dni']);
   unset($_SESSION['cid']);
   Alert::set_msg('Ya hay un suscriptor registrado con este email', 'danger');
}

require_once 'header_web.php';
?>

<div id="colorlib-contact">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-md-push-1 animate-box" style='margin-top:1%'>


            <div class="col-md-9 animate-box center">
               <h3>Registro de profesional</h3>
               <form id='register' action="register.php" class='needs-validation' method='post' oninput='passR.setCustomValidity(passR.value != pass.value ? "Las contraseñas no coinciden." : "")'>
                  <div class="row form-group">
                     <div class="col-md-6">
                        <!-- <label for="fname">First Name</label> -->
                        <input type="text" id="name" name='name' class="form-control" placeholder="Ingrese su nombre aqui..." required>
                     </div>
                     <div class="col-md-6">
                        <!-- <label for="lname">Last Name</label> -->
                        <input type="text" id="apellido" class="form-control" name='apellido' placeholder="Ingrese su apellido aqui..." required>
                     </div>
                  </div>

                  <div class="row form-group">
                     <div class="col-md-12">
                        <!-- <label for="email">Email</label> -->
                        <input type="email" id="email" name='email' class="form-control" placeholder="Ingrese su email aqui..." required>
                     </div>
                  </div>
                  <div class="row form-group">

                     <div class="col-md-12">
                        <!-- <label for="email">Email</label> -->
                        <input type="text" id="dni" name='dni' class="form-control" placeholder="Ingrese su DNI aqui...">
                     </div>
                  </div>
                  <div class="row form-group">

                     <div class="col-md-12">
                        <!-- <label for="email">Email</label> -->
                        <input type="tel" id="tel" name='tel' class="form-control" placeholder="Ingrese su tefono aqui...">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col-md-12">
                        <!-- <label for="email">Email</label> -->
                        <input type="password" id="pass" name='pass' class="form-control" placeholder="Contraseña" required>
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col-md-12">
                        <!-- <label for="email">passr</label> -->
                        <input type="password" id="passR" name='passR' class="form-control" placeholder="Contraseña" required>
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col-md-12">
                        <label for="profesion">Profesion</label>
                        <select name='profesion' class="form-control" name="profesion" required>
                           <option value="Contador Publico">Contador Publico</option>

                        </select>
                     </div>
                  </div>
                  <label for="especializacion">Especialista en:</label>
                  <div class="row form-group">

                     <div class="col-md-6">

                        <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1" name='sueldos'>
                           <label class="form-check-label" for="sueldos" style="margin-left: 2%">SUELDOS</label>
                        </div>
                        <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1" name='impuestos'>
                           <label class="form-check-label" for="impuestos" style="margin-left: 2%">IMPUESTOS</label>
                        </div>
                        <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1" name='sociedad_pyme'>
                           <label class="form-check-label" for="sociedad_pyme" style="margin-left: 2%">CONSTITUCION DE SOCIEDADES</label>
                        </div>
                        <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1" name='contabilidad'>
                           <label class="form-check-label" for="sociedad_pyme" style="margin-left: 2%">CONTABILIDAD - BALANCES</label>
                        </div>
                        <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1" name='certificaciones'>
                           <label class="form-check-label" for="sociedad_pyme" style="margin-left: 2%">CERTIFICACIONES</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1" name='monotributo'>
                           <label class="form-check-label" for="monotributo_autonomos" style="margin-left: 2%">MONOTRIBUTO</label>
                        </div>
                        <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1" name='autonomos'>
                           <label class="form-check-label" for="monotributo_autonomos" style="margin-left: 2%">AUTONOMOS</label>
                        </div>
                        <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1" name='gestion'>
                           <label class="form-check-label" for="impuestos" style="margin-left: 2%">GESTION</label>
                        </div>
                        <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1" name='judiciales'>
                           <label class="form-check-label" for="impuestos" style="margin-left: 2%">JUDICIALES Y PERICIAS</label>
                        </div>
                     </div>

                  </div>
                  <div class="row form-group">

                     <div class="col-md-12">

                        <input type="text" id="otras" name='otras' class="form-control" placeholder="Otras...">
                     </div>
                  </div>
                  <div class="row form-group">

                     <div class="col-md-12">
                        <!-- <label for="email">Email</label> -->
                        <input type="text" id="matricula" name='matricula' class="form-control" placeholder="Ingrese su matricula aqui...">
                     </div>
                  </div>
                  <div class="row form-group">

                     <div class="col-md-12">
                        <label for="conocio">Como nos conocio?</label>
                        <select id="conocio" name='conocio' class="form-control">

                           <option value="facebook">Facebook</option>
                           <option value="instagram">Instagram</option>
                           <option value="suscriptor">Conocido</option>
                           <option value="linkedin">Linkedin</option>
                           <option value="google">Google</option>
                           <option value="otras">Otras</option>
                        </select>

                     </div>
                  </div>
                  <div class="row form-group">

                     <div class="col-md-12">
                        <!-- <label for="email">Email</label> -->
                        <textarea name="coment" class="form-control" rows="8" cols="88	" placeholder="Comentarios"></textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <input type="hidden" name="latitud" id="latitud" value="">
                     <input type="hidden" name="longitud" id="longitud" value="">
                     <input id='pago' type="submit" value="Enviar y suscribirme acá" class="button mt-xl-3">
                     <button type="button" class="button mt-xl-3" name="button">Enviar y solicitar contacto</button>
                  </div>

               </form>
               <div class="mensaje">

               </div>
            </div>
         </div>

      </div>
   </div>
   <div id="map" class="colorlib-map"></div>

   <div id="colorlib-consult">
      <div class="video colorlib-video" style="background-image: url(images/video.jpg);" data-stellar-background-ratio="0.5">
      </div>
      <div class="choose choose-form animate-box">
         <div class="colorlib-heading">


            <?php require_once 'footer_web.php'; ?>
            <script type="text/javascript">
               $(document).ready(function() {

                  geoposicionar();


               })

               function geoposicionar() {
                  if (navigator.geolocation) {

                     navigator.geolocation.getCurrentPosition(complete, errorPosicionar, {
                        timeout: 1000
                     });
                  }
               }

               function errorPosicionar(error) {
                  switch (error.code) {
                     case error.TIMEOUT:
                        mostrarMensaje('Request timeout');
                        break;
                     case error.POSITION_UNAVAILABLE:
                        mostrarMensaje('Tu posición no está disponible');
                        break;
                     case error.PERMISSION_DENIED:
                        mostrarMensaje('Tu navegador ha bloqueado la solicitud de geolocalización');
                        break;
                     case error.UNKNOWN_ERROR:
                        mostrarMensaje('Error desconocido');
                        break;
                  }
               }

               function complete(pos) {
                  var lat = pos.coords.latitude;
                  var lon = pos.coords.longitude;
                  $('#latitud').val(lat);
                  $('#longitud').val(lon);
               }
               var crs = function() {
                  $('#pago').on('click', function() {


                     $.ajax({
                        url: "ajax/clicknot.php",
                        method: "POST", //o GET, la diferencia es que se vean los datos o no en el enlace
                        data: {
                           'where': 'sus'
                        },
                     }).done(function(info) {
                        console.log(info);
                        var frm = $('#register').serialize();
                        console.log(frm);
                        $.ajax({
                           method: 'POST',
                           url: 'ajax/mobbex.php',
                           data: frm
                        }).done(function(info) {
                           console.log(info);
                           if (info == '1') {
                              var frm = $('#register').serialize();
                              console.log(frm);
                              $.ajax({
                                 method: 'POST',
                                 url: 'ajax/api.php',
                                 data: frm
                              }).done(function(data) {
                                 console.log(data);
                              })
                           }
                        })
                     })



                  })
               }


               var limpiar_datos = function() {

                  $("#register #name").val("");
                  $("#register #apellido").val("");

                  $("#register #tel").val("");
                  $("#register #email").val("");
                  $("#register #conocio").val("");
                  $("#register #exampleCheck1").prop("checked", false);
                  $("#register #coment").val("");
                  $("#register #pass").val("");
                  $("#register #passR").val("");
                  $("#register #matricula").val("");
                  $("#register #otras").val("");
               }
               var mostrar_mensaje = function(informacion) {

                  switch (informacion) {
                     case '1':
                        var texto = "<strong>Bien!</strong> Se ha registrado con exito.";
                        var color = "#379911";
                        break;
                     case '2':
                        var texto = "<strong>Error</strong>, no se ejecutó la consulta.";
                        var color = "#C9302C";
                        break;

                     case '3':
                        var texto = "<strong>Atencion!</strong> el email ya se habia registrado con anterioridad.";
                        var color = "#C9302C";

                        break;
                     case '4':
                        var texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
                        var color = "#ddb11d";
                        break;

                  }


                  $(".mensaje").html(texto).css({
                     "color": color,
                     'font-size': '200%'
                  });


               }
               var mobbex = function() {
                  var data = JSON.stringify({
                     "total": 500,
                     "currency": "ARS",
                     "type": "dynamic",
                     "total": "Suscripcion Enlace Profesional",
                     "description": "Suscripcion Enlace Profesional",
                     "interval": '1m',
                     "trial": '7d',
                     "limit": '6m',
                     "return_url": "register.php",

                  });

                  var xhr = new XMLHttpRequest();
                  xhr.withCredentials = true;

                  xhr.addEventListener("readystatechange", function() {
                     if (this.readyState === 4) {
                        console.log(this.responseText);
                     }
                  });

                  xhr.open("POST", "https://api.mobbex.com/p/subscriptions");
                  xhr.setRequestHeader("x-api-key", "L7buJqqodxsKdU11pIayTtUR1UbQsGgypIfqI4cT");
                  xhr.setRequestHeader("x-access-token", "d31f0721-2f85-44e7-bcc6-15e19d1a53cc");
                  xhr.setRequestHeader("x-lang", "es");
                  xhr.setRequestHeader("Content-Type", "application/json");
                  xhr.setRequestHeader("cache-control", "no-cache");


                  xhr.send(data);
                  console.log(xhr);
               }
            </script>
            <script type="text/javascript">
               $(document).ready(function() {
                  $('#pago').click(function() {
                     checked = $("input[type=checkbox]:checked").length;
                     other = Boolean($('#otras').text() != "");
                     if (!checked && !other) {
                        alert("You must check at least one checkbox.");
                        return false;
                     }

                  });
               });
            </script>