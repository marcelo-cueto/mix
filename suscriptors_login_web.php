<?php session_start();
require_once 'admin/controllers/Alert.php';
require_once 'admin/controllers/suscriptor.php';

if (isset($_GET['action']) && $_GET['action']=='logout') {
   Suscriptor::logout();
}

if (isset($_POST['email'])) {
   Suscriptor::loger($_POST["email"], $_POST["clave"]);
}

require_once 'header_web.php';
?>

<div id="colorlib-contact">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-md-push-1 animate-box" style='margin-top:1%'>

            <div class="col-md-9 animate-box center">
               <h3>Inicio de sesión</h3>
               <br>
               <?php if (isset($_SESSION['email'])) { ?>
                  <p>Ya hay un usuario conectado. Por favor, cierre la sesión para continuar.</p>
               <?php } else { ?>
                  <form id='register' action="suscriptors_login_web.php" class='needs-validation' method='post'>
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
                     <input type="submit" value="Ingresar" class="btn btn-success">
                  </div>

                  </form>

               <?php } ?>

               <div class="mensaje">
                  <?php Alert::show_msg(); ?>
               </div>

            </div>
         </div>

      </div>
   </div>