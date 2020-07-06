<?php
session_start();
include_once 'partials/head.php';
require_once 'controllers/Alert.php';
require_once 'controllers/user.php';

if (isset($_POST['admin_email'])) {
   $user = user::existsByEmail($_POST['email']);
   if (!$user) {
      Alert::set_msg('El email no está registrado o ya fue enviada la clave', 'danger');
   } else {
      $clave_prov = substr(md5(rand()), 0, 7);
      $encrypted = sha1($clave_prov);
      user::updateByEmail($_POST['email'], 'pass', $encrypted);
      user::updateByEmail($_POST['email'], 'recupera_pass', 1);
      //Suscriptor::sendPassEmail($_POST['email'], $clave_prov);
      header('Location: adminLogin.php');
      exit();
   }
}
?>

<div class="container">
   <div class="row">
      <div class="col-6 text-center offset-xl-3">
         <img src="" alt="Logo" class="img-fluid" style="width: 200px;">
         <h2 class="mt-5 mb-3">ENLACE PROFESIONAL</h2>
         <div>
            <h3>Inicio de Sesión</h3>
            <p>Por favor ingrese su email.<br>Se le enviará una clave provisoria a la casilla registrada.</p>
            <form class="form-inicio" action="adminRecuperar.php" method="post">
               <input class="icon-mail" name="email" type="email" placeholder="Email" required>
               <br>
               <button class="form-boton" type="submit">ACEPTAR</button>
               <br>
            </form>
         </div>
         <!-- contenido -->
         <?php echo Alert::show_msg(); ?>
         <!-- ends -->
      </div>
   </div>
</div>
