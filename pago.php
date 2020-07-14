<?php
session_start();
//var_dump($_SESSION['shorten_url']);
//exit();
require_once 'header_web.php'; ?>

<div class="container">
   <div class="separador"></div>
   <div class="section-intro text-center pb-65px">
      <h2 class="section-intro__title">Ya casi terminamos! <br>
         Este es tu c&oacute;digo de cliente: <?php echo $_SESSION['cid'] ?> <br>
         Te pedimos que lo recuerdes ya que te será solicitado en el pr&oacute;ximo paso.
      </h2>
      <a href="<?php echo $_SESSION['shorten_url'] ?>">
         <button type="button">Continuar</button>
      </a>
   </div>
   <div class="separador"></div>
</div>

'{
   "customer":"{
      \"identification\":\"31313131\",
      \"email\":\"martinezmatias@mail.com\",
      \"name\":\" \"
   }",
   "startDate":"{
      \"day\":\"14\",
      \"month\":\"07\"
   }",
   "reference":null
}'

'{
   "customer":"{
      \"identification\":32866449,
      \"email\":\"algo2@mail.com\",
      \"name\":\"Matias ol\"
   }",
   "startDate":"{
      \"day\":14,
      \"month\":7
   }",
   "reference":1
   }

<?php require_once 'footer_web.php'; ?>

