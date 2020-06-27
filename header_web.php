<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Enlace Profesional</title>
   <link rel="icon" href="img/Fevicon.png" type="image/png">
   <script type="text/javascript"  src="admin/js/jquery.min.js"></script>
   <script type="text/javascript"  src="admin/js/jquery-1.12.3.js"></script>
   <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
   <link rel="stylesheet" href="vendors/linericon/style.css">
   <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
   <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
   <link rel="stylesheet" href="vendors/Magnific-Popup/magnific-popup.css">
   <link rel="stylesheet" href="css/style.css">

   <style>
      .texto-carrusel{
         font-family: "Prometo";
         color: #fff;
         font-size: 36px;
      }

      .flecha {
         font-size: 28px;
      }
   </style>
</head>

<body>
   <!--================ Header Menu Area start =================-->
   <header class="header_area">
      <div class="main_menu">
         <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
               <a class="navbar-brand logo_h" href="home_web.php"><img src="img/logo.png" alt=""></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                  <ul class="nav navbar-nav menu_nav justify-content-end">
                     <li class="nav-item"><a class="nav-link" href="home_web.php">Home</a></li>
                     <li class="nav-item"><a class="nav-link" href="about_web.php">Nosotros</a></li>
                     <li class="nav-item"><a class="nav-link" href="blog_web.php">Noticias</a>
                     <li class="nav-item submenu dropdown">
                        <a href="home_web.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Suscriptores</a>
                        <ul class="dropdown-menu">
                           <?php if (!isset($_SESSION['email'])) {
                              echo "
                              <li class='nav-item'><a class='nav-link' href='suscriptors_login_web.php'>Ingresar</a></li>
                              <li class='nav-item'><a class='nav-link' href='register.php'>Registrarme</a></li>
                              ";
                           } else {
                              echo "<li class='nav-item'><a class='nav-link' href='suscriptors_login_web.php?action=logout'>Cerrar sesión</a></li>";
                           } ?>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
      </div>
   </header>
   <!--================Header Menu Area =================-->
