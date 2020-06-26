<?php session_start();
require_once 'admin/controllers/notice.php';
require_once 'admin/controllers/comment.php';
require_once 'admin/controllers/user.php';

if (!isset($_GET['nid'])) {
   header('Location: blog_web.php');
   exit();
}
$notice = notice::getById($_GET['nid']);
$comments = comment::getByNoticeId($_GET['nid']);
$user = User::userById($notice->getAutor());
?>

<?php require_once 'header_web.php'; ?>

<!--================Blog Area =================-->
<section class="blog_area single-post-area section-margin--small " >
   <div class="container">
      <div class="row">
         <div class="col-lg-12 posts-list">
            <div class="single-post  row " style='margin-left:7%;' >
               <div class="col-lg-12">
                  <div class="feature-img">
                     <img class="img-fluid" src="admin/images/principals/<?php echo $notice->getImg();?>" alt="" style='width:80%;'>
                  </div>
               </div>
               <div class="col-lg-3  col-md-3">
                  <div class="blog_info text-right">
                     <ul class="blog_meta list">
                        <li>
                           <?php echo $user['name']; ?> · <i class="lnr lnr-user"></i>
                        </li>
                        <li>
                        <?php echo $notice->getDates(); ?> · <i class="lnr lnr-calendar-full"></i>
                        </li>
                        <li>
                        <?php echo count($comments); ?> Comentarios · <i class="lnr lnr-bubble"></i>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-9 col-md-9 blog_details">
                  <h2><?php echo $notice->getTitle(); ?></h2>
               </div>
               <div class="col-lg-12">
                  <div class="row">
                     <div class="col-lg-12 mt-4">
                        <p>
                           <?php echo $notice->getTexto(); ?>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="navigation-area">
               <a class="button mt-xl-3" href="blog_web.php"><i class="ti-arrow-left"></i> Volver a Noticias</a>
            </div>
            <div class="comments-area">
               <h4><?php echo count($comments); ?> Comentarios</h4>
               <?php foreach ($comments as $c) { ?>
                  <div class="comment-list">
                  <div class="single-comment justify-content-between d-flex">
                     <div class="user justify-content-between d-flex">
                        <div class="thumb">
                           <img src="img/blog/c1.jpg" alt="">
                        </div>
                        <div class="desc">
                           <h5>
                              <a href="#">Emilly Blunt</a>
                           </h5>
                           <p class="date">December 4, 2017 a las 3:12 </p>
                           <p class="comment">
                              Never say goodbye till the end comes!
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>


            </div>
            <div class="comment-form">
               <h4 style='color:#fff;'>Dejá tu comentario</h4>
               <form>
                  <div class="form-group">
                     <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                  </div>
                  <div class="form-group">
                     <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                  </div>
                  <a href="#" class="button button-postComment">Publicar</a>
               </form>
            </div>
         </div>

      </div>
   </div>
</section>
<!--================Blog Area =================-->

<?php require_once 'footer_web.php'; ?>
