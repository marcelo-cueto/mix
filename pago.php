<?php
session_start();
if (!isset($_SESSION['sus_email'])) {
   header('Location: home_web.php');
   exit();
}
require_once 'header_web.php'; ?>

<div class="container">
   <div class="separador"></div>
   <div class="section-intro text-center pb-65px">
      <h2 class="section-intro__title">Suscripción exitosa!</h2>
      <p>Gracias por suscribirte. Nos estaremos poniendo en contacto con vos.</p>
      <a href="blog_web.php">
         <button type="button" class="button mt-xl-3">Volver</button>
      </a>
   </div>
   <div class="separador"></div>
</div>

<?php require_once 'footer_web.php'; ?>

