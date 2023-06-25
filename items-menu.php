<?php
/**
* Template Name: Items menu
*/

// Exit if accessed directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>

<?php get_header(); ?>

  <main id="main" data-aos="fade" data-aos-delay="1500" style="overflow:hidden;">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-12 text-center">
            <h2><?php the_title(); ?></h2>
            <p><?php the_excerpt(); ?></p>

            <a class="cta-btn" href="#contacto">Disponible para Contratar</a>
                <script>
                    const contactLink = document.querySelector('.cta-btn');
                    contactLink.addEventListener('click', (event) => {
                    event.preventDefault(); // evitar que la página se recargue
                    // aquí puedes agregar cualquier otra lógica que desees ejecutar
                    // Obtén el elemento al que deseas desplazarte
                    const contactoElement = document.querySelector('#contacto');
                    // Calcula la posición del elemento respecto al documento
                    const offsetTop = contactoElement.offsetTop - 120;
                    // Desplázate suavemente al elemento utilizando el método scrollIntoView
                    window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                    });
                  });
                </script>
          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Slider Section ======= -->
    
    <section id="gallery-single" class="gallery-single">
      <div class="container">
    <div class="position-relative h-100">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
            <?php
            $content = '<div>' . get_the_content() . '</div>';
            $doc = new DOMDocument();
            libxml_use_internal_errors(true); // habilitar el uso de errores internos de libxml
            $doc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8')); // convertir a HTML-ENTITIES para manejar caracteres especiales
            libxml_clear_errors(); // limpiar los errores internos de libxml
            $img_tags = $doc->getElementsByTagName('img');
            $first_img = $img_tags->item(0);
            $second_img = $img_tags->item(1);
            $third_img = $img_tags->item(2);
            $first_img_src = $first_img->getAttribute('src');
            $second_img_src = $second_img->getAttribute('src');
            $third_img_src = $third_img->getAttribute('src');
            ?>
              <div class="swiper-slide">
              <img src="<?php echo $first_img_src; ?>">
              </div>
              <div class="swiper-slide">
              <img src="<?php echo $second_img_src; ?>">
              </div>
              <div class="swiper-slide">
              <img src="<?php echo $third_img_src; ?>">
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>
</div>
</section>
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container mb-5 mt-5 contact-overlay">

        <div id="contacto" class="section-header">
          <h2>Contacto</h2>
          <p>Queremos escucharte</p>
        </div>
        <div class="cursor"></div>
        <div class="row wrapper contact">

          <div class="col-lg-12">
          <div class="row gy-4 justify-content-start">

            <div class="col-sm-6 mb-3">
              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>
              </div>
            </div><!-- End Info Item -->

            <div class="col-sm-6 mb-3">
              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                <h4>Call:</h4>
                <p>+1 5589 55488 55</p>
              </div>
              </div>
            </div><!-- End Info Item -->

            </div>
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Enviar mensaje</button></div>
            </form>
          </div><!-- End Contact Form -->
        </div>
    </section><!-- End Pricing Section -->

  </main><!-- End #main -->

  <?php 
        $uploads = wp_upload_dir(); // obtiene la ruta del directorio de subida de archivos
        $name = '/^gallery-\d+(?:-\d+x\d+)?\.jpg$/i';
        $dir = $uploads['basedir'] . '/2023/05/';
        $files = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE); // busca los archivos que tengan los formatos especificados
        $processed_prefixes = array(); // arreglo para almacenar los prefijos ya procesados       
        foreach ( $files as $file ) {
            $filename = basename( $file ); // obtener solo el nombre de archivo sin la ruta
            if ( preg_match( $name, $filename ) ) { // verificar si el nombre de archivo coincide con la expresión regular
                preg_match('/^gallery-(\d+)/i', $filename, $prefix_matches); // extraer el prefijo
                $prefix = isset($prefix_matches[1]) ? $prefix_matches[1] : null;
                if (!$prefix || in_array($prefix, $processed_prefixes)) {
                    continue; // si el prefijo no se puede extraer o ya se procesó, omitir el archivo
                }
                $processed_prefixes[] = $prefix; // agregar el prefijo al arreglo de procesados
                $image_id = attachment_url_to_postid( str_replace( $uploads['basedir'], $uploads['baseurl'], $file ) );
                $gallery_links = esc_attr( str_replace( $uploads['basedir'], $uploads['baseurl'], $file ) );
                $gallery_links = '<div class="gallery-links d-flex align-items-center justify-content-center">';
                //$img_url = wp_get_attachment_image_src( $image_id, 'gallery-thumbnail' )[0];
                //$gallery_links .= '<a href="' . esc_attr( str_replace( $uploads['basedir'], $uploads['baseurl'], $file ) ) . '" title="' . esc_attr( $filename ) . '" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>';           
                //$gallery_links .= '<a href="#" class="details-link"><!-- //<i class="bi bi-link-45deg"></i> //--> </a></div>';
                //echo '<div class="col-xl-3 col-lg-4 col-6 col-sm-4"><div class="gallery-item h-100">' . $gallery_links . '<img src="' . esc_attr( str_replace( $uploads['basedir'], $uploads['baseurl'], $file ) ) . '" alt="" class="img-fluid" /></div></div>';
                $json = json_encode($gallery_links);
                echo '<script>console.log( "El archivo " + ' . $json . ' + " no coincide con la expresión regular<br>" )</script>';
            } else {
              //Depurar errores de imágenes de cuadrícula
              //$json = json_encode($filename);
              //echo '<script>console.log( "El archivo " + ' . $json . ' + " no coincide con la expresión regular<br>" )</script>';
            }
        }
    ?>

  <!-- ======= Footer ======= -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>  
jQuery(document).ready(function($) {
  var $cursor = $(".cursor"),
      $overlay = $(".project-overlay");
      function moveCircle(e) {
        TweenLite.to($cursor, 0.5, {
          css: {
            left: e.pageX,
            top: e.pageY
          },
          delay: 0.03
        });
      }
      
      $(".pic-1").hover(function() {
        $(".cursor").css({ "background-image": "url(https://giantec.test/giantec/neontt/wp-content/uploads/2023/05/mask-item.jpg)" });
      });
      $(".pic-2").hover(function() {
        $(".cursor").css({ "background-image": "url(https://giantec.test/giantec/neontt/wp-content/uploads/2023/05/globos-item.jpg)" });
      });
      $(".pic-3").hover(function() {
        $(".cursor").css({ "background-image": "url(https://giantec.test/giantec/neontt/wp-content/uploads/2023/05/NIK4400-e1683933010907.jpg)" });
      });
      $(".pic-4").hover(function() {
        $(".cursor").css({ "background-image": "url(https://images.unsplash.com/photo-1512830414785-9928e23475dc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80)" });
      });
      var flag = false;
      $($overlay).mousemove(function() {
        flag = true;
        TweenLite.to($cursor, 0.3, { scale: 1, autoAlpha: 1 });
        $($overlay).on("mousemove", moveCircle);
      });
      $($overlay).mouseout(function() {
        flag = false;
        TweenLite.to($cursor, 0.3, { scale: 0.1, autoAlpha: 0 });
      });
})
</script>
  <?php get_footer() ?>