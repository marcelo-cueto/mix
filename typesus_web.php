<?php
session_start();
require_once 'admin/controllers/suscriptor.php';

if ($_POST) {
   if ($_POST['uid'] == 'free') {
      var_dump('Gracias por suscribirte. Nos estaremos poniendo en contacto con vos');
      exit();
   }
   var_dump($_POST['uid']);
   $result = Suscriptor::mobbexsuscriber($_SESSION['email'], $_SESSION['dni'], $_POST['uid']);
   var_dump($result);
   exit();
   $_SESSION['shorten_url'] = $_POST['shorten_url'];
   header('Location: pago.php');
   exit();

   unset($_SESSION['email']);
   unset($_SESSION['dni']);
   
}

$typesus = Suscriptor::getTypesus();
require_once 'header_web.php';
?>

<div class="container">
   <div class="separador"></div>
   <?php if (empty($_SESSION['email'])) { ?>
      <div class="section-intro text-center pb-65px">
         <h2 class="section-intro__title">Planes</h2>
         <p>Estos son los distintos tipos de suscripción que tenemos para ofrecerte.</p>
      </div>
   <?php } else { ?>
      <div class="section-intro text-center pb-65px">
         <h2 class="section-intro__title">Confirmanos el tipo de suscripción</h2>
      </div>
   <?php } ?>
   <div class="card-deck mb-3 text-center">

      <div class="card mb-4 shadow-sm">
         <div class="card-header">
            <h4 class="my-0 font-weight-normal">Gratuito</h4>
         </div>
         <div class="card-body">
            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mes</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
               <p>Descripcion</p>
            </ul>
            <?php if (empty($_SESSION['email'])) { ?>
                  <button onclick="location.href='register.php'" class="btn btn-lg btn-block btn-outline-primary">Suscribirme gratis</button>
            <?php } else { ?>
               <form action="typesus_web.php" method="post">
                  <input type="hidden" name="uid" id="uid" value="free">
                  <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Suscribirme gratis</button>
               </form>
            <?php } ?>

         </div>
      </div>

      <?php foreach ($typesus as $t) { ?>
         <div class="card mb-4 shadow-sm">
            <div class="card-header">
               <h4 class="my-0 font-weight-normal">Pago</h4>
            </div>
            <div class="card-body">
               <h1 class="card-title pricing-card-title">
                  $<?php echo $t['total']; ?>
                  <small class="text-muted">/
                     <?php
                     switch ($t['intervalo']) {
                        case '7d':
                           echo 'semana';
                           break;
                        case '15d':
                           echo 'quincena';
                           break;
                        case '1m':
                           echo 'mes';
                           break;
                        case '2m':
                           echo '2 meses';
                           break;
                        case '3m':
                           echo '3 meses';
                           break;
                        case '6m':
                           echo '6 meses';
                           break;
                        default:
                           echo 'año';
                           break;
                     }
                     ?>
                  </small>
               </h1>
               <ul class="list-unstyled mt-3 mb-4">
                  <p><?php echo $t['description']; ?></p>
               </ul>
               <?php if (empty($_SESSION['email'])) { ?>
                     <button onclick="location.href='register.php'" class="btn btn-lg btn-block btn-primary">Suscribirme gratis</button>
               <?php } else { ?>
                  <form action="typesus_web.php" method="post">
                     <input type="hidden" name="uid" id="uid" value="<?php echo $t['uid']; ?>">
                     <input type="hidden" name="url" id="url" value="<?php echo $t['url']; ?>">
                     <button type="submit" class="btn btn-lg btn-block btn-primary">Suscribirme</button>
                  </form>
               <?php } ?>
            </div>
         </div>
      <?php } ?>

   </div>
   <div class="separador"></div>
</div>

<?php require_once 'footer_web.php'; ?>