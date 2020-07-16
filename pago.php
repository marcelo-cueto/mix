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
   "result":true,
   "data":{
      "uid":"isRi2zLPT",
      "reference":"6",
      "sourceUrl":"https://mobbex.com/p/subscriptions/PN~LGKyfT/subscriber/isRi2zLPT/source",
      "subscriberUrl":"https://mobbex.com/p/subscriptions/PN~LGKyfT/subscriber/isRi2zLPT",
      "subscription":{
            "uid":"PN~LGKyfT"
      }
   }
}'

<?php require_once 'footer_web.php'; ?>

