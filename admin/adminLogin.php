<?php
session_start();

include_once 'partials/head.php';
require_once 'controllers/Alert.php';
require_once 'controllers/user.php';
if ($_POST) {
    user::loger($_POST["email"], $_POST["pass"]);
}
?>
<div class="container">
    <div class="row">
        <div class="col-6 text-center offset-xl-3">
            <img src="" alt="Logo" class="img-fluid" style="width: 200px;">
            <h2 class="mt-5 mb-3">ENLACE PROFESIONAL</h2>
            <div>
                <h3>Inicio de Sesión</h3>
                <form class="form-inicio" action="adminLogin.php" method="post">
                    <input class="icon-mail" name="email" type="email" placeholder="Email" required>
                    <input class="icon-pass" name="pass" type="password" placeholder="Contraseña" required>
                    <input type="hidden" name="csrf_token" value=<?php echo $_SESSION['csrf_token']['token']; ?>>
                    <br>
                    <a href="recuperar">No recuerdo mi clave</a>
                    <br>
                    <button class="form-boton" type="submit">INCIAR SESIÓN</button>
                </form>
            </div>
            <!-- contenido -->
            <?php echo Alert::show_msg(); ?>
            <!-- ends -->
        </div>
    </div>
</div>
