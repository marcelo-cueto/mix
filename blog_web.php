<?php session_start();
require_once 'admin/controllers/notice.php';
require_once 'admin/controllers/comment.php';

if (!isset($_SESSION['email'])) {
   $notices = notice::getDefaultNotices();
} else {
   $notices = notice::getAllNotices();
}

$comments = comment::getAllComments(); ?>

<?php require_once 'header_web.php'; ?>

<!--================ Blog section start =================-->
<section class="section-margin">
   <div class="container">
      <div class="section-intro text-center pb-65px">
         <h2 class="section-intro__title">Últimas noticias</h2>
      </div>
      <div class="row">
         <?php foreach ($notices as $key => $n) { ?>

            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
               <div class="card card-blog">
                  <img class="card-img rounded-0" src=<?php echo "admin/images/principals/".$n->getImg(); ?> alt="">
                  <div class="card-blog__body">
                     <h3><a href="blog_details_web.php?nid=<?php echo $n->getId(); ?>"><?php echo $n->getTitle(); ?></a></h3>
                     <ul class="card-blog__info">
                        <?php
                              $i = 0;
                              foreach ($comments as $c) {
                                 if ($c->getNoticeId() == $n->getId()) $i++;
                              }
                              echo "<li><a href=''><i class='ti-themify-favicon'></i>$i comentarios</a></li>";
                        ?>
                     </ul>
                     <p><?php echo $n->getTexto(); ?></p>
                  </div>
                  <div class="card-blog__footer">
                     <a href="blog_details_web.php?nid=<?php echo $n->getId(); ?>">Leer mas<i class="ti-arrow-right"></i></a>
                  </div>
                  <div class="card-blog__footer">
                     <p> </p>
                  </div>
               </div>
            </div>


         <?php } ?>
      </div>
   </div>
</section>
<!--================ Blog section end =================-->

<?php require_once 'footer_web.php'; ?>
