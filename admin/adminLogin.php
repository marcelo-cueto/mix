<?php
session_start();
include_once 'partials/head.php';
require_once 'controllers/Alert.php';
require_once 'controllers/user.php';
/*
if ($_POST) {
   user::loger($_POST["email"], $_POST["pass"]);
}
*/
if (isset($_POST['email']) && isset($_POST['pass'])) {
   $user = user::existsByEmail($_POST['email']);
   if ($user['recupera_pass'] != 1) {
      user::loger($_POST["email"], $_POST["pass"]);
   }
}

if (isset($_POST['clave']) && isset($_POST['claveR'])) {
   $user = user::existsByEmail($_POST['email']);
   if ($user['recupera_pass'] == 1) {
      $encrypted = sha1($_POST['clave']);
      user::updateByEmail($_POST['email'], 'pass', $encrypted);
      user::updateByEmail($_POST['email'], 'recupera_pass', 0);
      user::loger($_POST["email"], $_POST["clave"]);
   }
}

?>


<div class="container">
   <div class="row">
      <div class="col-6 text-center offset-xl-3">
         <img src="" alt="Logo" class="img-fluid" style="width: 200px;">
         <h2 class="mt-5 mb-3">ENLACE PROFESIONAL</h2>
         <div>
            <form class="form-inicio" action="adminLogin.php" method="post">
               <?php if (isset($_POST['email']) && $user['recupera_pass'] == 1) { ?>
                  <h3>Cambio de clave</h3>
                  <input class="icon-mail" name="email" type="email" placeholder="Email" required>
                  <input class="icon-pass" name="clave" type="password" placeholder="Contraseña" required>
                  <input class="icon-pass" name="claveR" type="password" placeholder="Confirmar contraseña" required>
                  <br>
                  <button class="form-boton" type="submit">ACEPTAR</button>
                  <br>
               <?php } else { ?>
                  <h3>Inicio de Sesión</h3>
                  <input class="icon-mail" name="email" type="email" placeholder="Email" required>
                  <input class="icon-pass" name="pass" type="password" placeholder="Contraseña" required>
                  <input type="hidden" name="csrf_token" value=<?php echo $_SESSION['csrf_token']['token']; ?>>
                  <br>
                  <button class="form-boton" type="submit">INCIAR SESIÓN</button>
                  <br>
                  <a href="adminRecuperar.php">No recuerdo mi clave</a>
               <?php } ?>
            </form>
         </div>
         <!-- contenido -->
         <?php echo Alert::show_msg(); ?>
         <!-- ends -->
      </div>
   </div>
</div>