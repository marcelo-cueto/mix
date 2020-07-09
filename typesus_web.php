<?php
session_start();
require_once 'admin/controllers/suscriptor.php';

if (empty($_SESSION['sus_email'])){
   header('Location: register.php');
   exit();
}

if ($_POST) {
   $sus = Suscriptor::existsByEmail($_SESSION['sus_email']);
   if ($_POST['uid']=='free') {
      var_dump($sus);
      exit();
   }
   $result = Suscriptor::mobbexsuscriber($_SESSION['sus_email'], $_SESSION['sus_dni'], $_POST['uid']);
   var_dump($result);
   exit();
}

$typesus = Suscriptor::getTypesus();

require_once 'header_web.php';
?>

<div class="container">
   <div class="card-deck mb-3 text-center">

      <div class="card mb-4 shadow-sm">
         <div class="card-header">
            <h4 class="my-0 font-weight-normal">Free</h4>
         </div>
         <div class="card-body">
            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mes</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
               <p>Descripcion</p>
            </ul>
            <form action="typesus_web.php" method="post">
               <input type="hidden" name="uid" id="uid" value="free">
               <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
            </form>
         </div>
      </div>

      <?php foreach ($typesus as $t) { ?>
         <div class="card mb-4 shadow-sm">
            <div class="card-header">
               <h4 class="my-0 font-weight-normal">Pro</h4>
            </div>
            <div class="card-body">
               <h1 class="card-title pricing-card-title">$<?php echo $t['total']; ?> <small class="text-muted">/ mes</small></h1>
               <ul class="list-unstyled mt-3 mb-4">
                  <p><?php echo $t['description']; ?></p>
               </ul>
               <form action="typesus_web.php" method="post">
                  <input type="hidden" name="uid" id="uid" value="<?php echo $t['uid']; ?>">
                  <button type="submit" class="btn btn-lg btn-block btn-primary">Get started</button>
               </form>
            </div>
         </div>
      <?php } ?>

   </div>
</div>

<?php require_once 'footer_web.php'; ?>