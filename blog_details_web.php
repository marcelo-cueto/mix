<?php session_start();
require_once 'admin/controllers/notice.php';
require_once 'admin/controllers/comment.php';
require_once 'admin/controllers/user.php';
require_once 'admin/controllers/suscriptor.php';

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

                        <div class="desc">
                           <h5>
                              <?php $s=Suscriptor::getById($c->getAutor());
                              echo $s['name'].' '.$s['surname'];?>
                           </h5>

                           <p class="date" style='color:#fff;'><?php echo $c->getDatetime(); ?> </p>
                           <p class="comment">
                              <?php echo $c->getComent(); ?>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>


            </div>
            <?php if(isset($_SESSION['email'])): ?>
            <div class="comment-form">
               <h4 style='color:#fff;'>Dejá tu comentario</h4>
               <form id="coform" class='needs-validation' action="" method="post" >

                  <div class="form-group">
                     <input type="hidden" class="form-control" id="subject" name='subject'value=<?php echo $_SESSION['id']; ?>>
                     <input type="hidden" class="form-control" id="notice" name='notice'value=<?php echo $notice->getId(); ?>>
                  </div>
                  <div class="form-group">
                     <textarea class="form-control mb-10" rows="5" id="message" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                  </div>
                  <button type="submit"  class="button button-postComment" name="button">Comentar </button>
               </form>
            </div>
          <?php endif; ?>
         </div>

      </div>
   </div>
</section>
<!--================Blog Area =================-->

<?php require_once 'footer_web.php'; ?>
<script type="text/javascript">
$(document).ready(function() {


  guardar();



})


var guardar=function(){
  $('#coform').on('submit', function(e){
    e.preventDefault();
    var frm=$('#coform').serialize();
    console.log(frm);
    $.ajax({
      method:'POST',
      url: 'ajax/savecom.php',
      data: frm
    }).done(function(info){
      console.log(info);

      limpiar_datos();
      location. reload();
    })
  })
}
function limpiar_datos(){
  $('#subjet').val();
  $('#message').val();
}
</script>
