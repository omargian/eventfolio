<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PhotoFolio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <?php wp_head();?>

</head>

<body <?php body_class(); ?>>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="<?php echo get_permalink(2) ?>" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="https://neonttest.stw.mx/wp-content/uploads/2023/05/logo-neontt.blanco-fondo-trans.png" alt="" width="30px">      
        <h1>neontt</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="resaltado" href="<?php echo get_permalink(35) ?>">Nosotros</a></li>
          <li class="dropdown"><a class="opacidad-item" href="" onclick="event.preventDefault();"><span>Innovación</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?php echo get_permalink(38); ?>">Innovación</a></li>
              <li><a href="<?php echo get_permalink(49); ?>">Globos Neón</a></li>
              <li><a href="<?php echo get_permalink(68); ?>">3D Mask</a></li>
              <li><a href="<?php echo get_permalink(71); ?>">Deco Neón</a></li>
              <li><a href="<?php echo get_permalink(76); ?>">Living Walls</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="opacidad-item" href="" onclick="event.preventDefault();"><span>Tecnología</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?php echo get_permalink(47); ?>">Tecnología</a></li>
              <li><a href="<?php echo get_permalink(80); ?>">Gif Maker</a></li>
              <li><a href="<?php echo get_permalink(82); ?>">Virtual Reality</a></li>
              <li><a href="<?php echo get_permalink(85); ?>">InstaWall</a></li>
            </ul>
          </li>
          <li><a href="<?php echo get_permalink(32) ?>">Contacto</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->