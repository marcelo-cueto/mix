<?php session_start();
require_once 'admin/controllers/Alert.php';
require_once 'admin/controllers/suscriptor.php';

if (isset($_POST['email'])) {
   $sus = Suscriptor::existsByEmail($_POST['email']);
   if (!$sus) {
      Alert::set_msg('El email no está registrado o ya fue enviada la clave', 'danger');
   } else {
      $clave_prov = substr(md5(rand()), 0, 7);
      $encrypted = sha1($clave_prov);
      Suscriptor::updateByEmail($_POST['email'], 'pass', $encrypted);
      Suscriptor::updateByEmail($_POST['email'], 'recupera_pass', 1);
      //Suscriptor::sendPassEmail($_POST['email'], $clave_prov);
      header('Location: suscriptors_login_web.php');
      exit();
   }
}

require_once 'header_web.php';
?>

<div id="colorlib-contact">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-md-push-1 animate-box" style='margin-top:1%'>

            <div class="col-md-9 animate-box center">
               <br>
               <h3>Olvidé mi clave</h3>
               <br>
               <p>Por favor ingrese su email. Se le enviará una clave provisoria a la casilla registrada.</p>
                  <form id='recuperar' action="recuperar_web.php" class='needs-validation' method='post'>
                     <div class="row form-group">
                        <div class="col-md-6">
                           <!-- <label for="fname">First Name</label> -->
                           <input type="text" id="name" name='email' class="form-control" placeholder="email" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button mt-xl-3" name="button">Aceptar</button>

                     </div>
                     <div class="row form-group">
                        <div class="col-md-6">
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col-md-6">
                        </div>
                     </div>
                  </form>
               <div class="mensaje">
                  <?php Alert::show_msg(); ?>
               </div>

            </div>
         </div>

      </div>
   </div>

   <?php require_once 'footer_web.php'; ?>