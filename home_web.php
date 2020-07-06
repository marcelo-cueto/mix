<?php session_start();
require_once 'header_web.php'; 
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
         <div class="carousel-item">
            <a href="about_web.php">
               <img class="d-block w-100" src="img/banner/banner-2.jpg" alt="Second slide">
               <div class="carousel-caption d-none d-md-block">
                  <div class="texto-carrusel">
                  </div>
               </div>
            </a>
         </div>
         <div class="carousel-item">
            <a href="blog_web.php">
               <img class="d-block w-100" src="img/banner/banner-3.jpg" alt="Third slide">
               <div class="carousel-caption d-none d-md-block">
                  <div class="texto-carrusel">
                  </div>
               </div>
            </a>
         </div>
         <div class="carousel-item">
            <a href="suscriptors_login_web.php">
               <img class="d-block w-100" src="img/banner/banner-4.jpg" alt="Fourth slide">
               <div class="carousel-caption d-none d-md-block">
                  <div class="texto-carrusel">
                  </div>
               </div>
            </a>
         </div>
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