<?php session_start();
require_once 'admin/controllers/Alert.php';
require_once 'admin/controllers/suscriptor.php';

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
   Suscriptor::logout();
}

if (isset($_POST['email']) && isset($_POST['clave'])) {
   $sus = Suscriptor::existsByEmail($_POST['email']);
   if ($sus['recupera_pass'] != 1) {
      Suscriptor::loger($_POST["email"], $_POST["clave"]);
   }
}

if (isset($_POST['pass']) && isset($_POST['passR'])) {
   $sus = Suscriptor::existsByEmail($_POST['email']);
   if ($sus['recupera_pass'] == 1) {
      $encrypted = sha1($_POST['pass']);
      Suscriptor::updateByEmail($_POST['email'], 'pass', $encrypted);
      Suscriptor::updateByEmail($_POST['email'], 'recupera_pass', 0);
      Suscriptor::loger($_POST["email"], $_POST["pass"]);
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
               <h3>Inicio de sesión</h3>
               <br>
               <?php if (isset($_SESSION['sus_email'])) { ?>
                  <p>Ya hay un usuario conectado. Por favor, cierre la sesión para continuar.</p>
               <?php } else { ?>
                  <form id='login' action="suscriptors_login_web.php" class='needs-validation' method='post'>
                     <?php if (isset($_POST['email']) && $sus['recupera_pass'] == 1) { ?>
                        <p>Cambio de clave</p>
                        <div class="row form-group">
                           <div class="col-md-6">
                              <!-- <label for="fname">First Name</label> -->
                              <input type="text" id="name" name='email' class="form-control" placeholder="email" required>
                           </div>
                        </div>
                        <div class="row form-group">
                           <div class="col-md-6">
                              <!-- <label for="email">Email</label> -->
                              <input type="password" id="pass" name='pass' class="form-control" placeholder="Contraseña" required>
                           </div>
                        </div>
                        <div class="row form-group">
                           <div class="col-md-6">
                              <!-- <label for="email">passr</label> -->
                              <input type="password" id="passR" name='passR' class="form-control" placeholder="Confirmar contraseña" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="button mt-xl-3" name="button">Aceptar</button>

                        </div>
                     <?php } else { ?>
                        <div class="row form-group">
                           <div class="col-md-6">
                              <!-- <label for="fname">First Name</label> -->
                              <input type="text" id="name" name='email' class="form-control" placeholder="email" required>
                           </div>
                        </div>

                        <div class="row form-group">
                           <div class="col-md-6">
                              <!-- <label for="fname">First Name</label> -->
                              <input type="password" id="name" name='clave' class="form-control" placeholder="clave" required>
                           </div>
                        </div>

                        <div class="form-group">
                           <button type="submit" class="button mt-xl-3" name="button">Ingresar</button>

                        </div>
                        <div class="row form-group">
                           <div class="col-md-6">

                           </div>
                        </div>
                        <div class="row form-group">
                           <div class="col-md-6">
                              <p><a href="recuperar_web.php">Si olvidó su clave, click aquí</a></p>
                           </div>
                        </div>
                     <?php } ?>
                  </form>


               <?php } ?>
               <div class="mensaje">
                  <?php Alert::show_msg(); ?>
               </div>

            </div>
         </div>

      </div>
   </div>

   <?php require_once 'footer_web.php'; ?>