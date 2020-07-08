<?php session_start();
require_once 'ajax/countbdd.php';
require_once 'header_web.php';
require_once 'admin/controllers/notice.php';

$banner=Notice::banner();

?>

<!--================Banner carrusel =================-->
<section>
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="home_web.php">
               <img class="d-block w-100" src="img/banner/banner-1.jpg" alt="First slide">
               <div class="carousel-caption d-none d-md-block">
                  <div class="texto-carrusel">
                  </div>
               </div>
            </a>
         </div>
        <?php foreach ($banner as $b): ?>
          <div class="carousel-item ">
             <a href=<?php echo $b['link']; ?>>
               <?php $a=$b['orden'];
               $c=Notice::place($a);
               ?>
                <img class="d-block w-100" src="img/banner/<?php echo $b['nombre'];?>" alt= "<?php echo $c;?>">
                <div class="carousel-caption d-none d-md-block">
                   <div class="texto-carrusel">
                   </div>
                </div>
             </a>
          </div>
        <?php endforeach; ?>


      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
         <span class="ti-angle-left flecha" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
         <span class="ti-angle-right flecha" aria-hidden="true"></span>
      </a>
   </div>
</section>
<!--================Fin banner carrusel =================-->

<!--================Blog Categorie Area =================-->
<section class="blog_categorie_area">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-lg-6 mb-4 mb-lg-0">
            <div class="categories_post">
               <img class="card-img rounded-0" src="img/BOTON-SOY-PROF.jpg" alt="post">
               <div class="categories_details">
                  <div class="categories_text">
                     <a href="register.php">
                        <h5>Soy Profesional</h5>
                     </a>
                     <div class="border_line"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-6 mb-4 mb-lg-0">
            <div class="categories_post">
               <img class="card-img rounded-0" src="img/BOTON-BUSCO-PROF.jpg" alt="post">
               <div class="categories_details">
                  <div class="categories_text">
                     <a href="solicitud.php">
                        <h5>Busco Profesional</h5>
                     </a>
                     <div class="border_line"></div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</section>
<!--================Blog Categorie Area =================-->

<?php require_once 'footer_web.php'; ?>
