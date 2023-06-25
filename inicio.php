<?php
/**
* Template Name: Inicio
*/

// Exit if accessed directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>

<?php get_header(); ?>
<!-- Inicio Full width custom template -->
    <!-- ======= SimpleParallax ======= -->
    <div class="thumbnail-parallax hero" data-image-url="https://neonttest.stw.mx/wp-content/uploads/2023/05/neontt-slider-1.jpg" data-stellar-background-ratio="0.5" id="home" data-aos="fade" data-aos-delay="2000">
    <img class="background-image" src="https://neonttest.stw.mx/wp-content/uploads/2023/05/neontt-slider-1.jpg" alt="">
      <div class="header-overlay">
        <div class="col-lg-6 caption v-middle text-center">
          <h2>Somos <span>Neón Tiki Tiger</span> creamos experiencias tecnológicas innovadoras con iluminación, arte y diseño.</h2>
        </div>  
      </div>
    </div>
    <!-- ======= ScrollTrigger-Gsap ======= -->
  
  <div class="image-container-gsap">
    <div class="fade">
    <h2>#The Neon Lights don’t wait. Stay wild</h2>  
      <img src="https://neonttest.stw.mx/wp-content/uploads/2023/05/neontt-slider-2.jpg" alt="Imagen 1">
    </div>
    <div class="fade">
    <h2>#Fill your life with experiences, not things</h2>  
      <img src="https://neonttest.stw.mx/wp-content/uploads/2023/05/NIK4400-e1683933010907.jpg" alt="Imagen 2">
    </div>
    <div class="fade">
    <h2>Nuestro <span>RETO</span> <br> será lograr que vivas un momento digno de ser recordado, soñado y tal vez así, logremos distraerte un poco de este mundo tan efímero.</h2>
      <img src="https://neonttest.stw.mx/wp-content/uploads/2023/05/NIK2598-scaled.jpg" alt="Imagen 3">
    </div>  
  </div>

  <main id="main" data-aos="fade" data-aos-offset="0">

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
        <div class="text-center">
          <h2><span>#Contenido neonTT</span></h2>
        </div>  

      <div class="container-fluid">
        <div class="row gy-4 justify-content-center">
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
                $gallery_links = '<div class="gallery-links d-flex align-items-center justify-content-center">';
                //$img_url = wp_get_attachment_image_src( $image_id, 'gallery-thumbnail' )[0];
                $gallery_links .= '<a href="' . esc_attr( str_replace( $uploads['basedir'], $uploads['baseurl'], $file ) ) . '" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>';            
                $gallery_links .= '<a href="gallery-single.html" class="details-link"><!-- //<i class="bi bi-link-45deg"></i> //--> </a></div>';
                echo '<div class="col-xl-3 col-lg-4 col-6 col-sm-4"><div class="gallery-item h-100">' . $gallery_links . '<img src="' . esc_attr( str_replace( $uploads['basedir'], $uploads['baseurl'], $file ) ) . '" alt="" class="img-fluid" /></div></div>';
            } else {
              //Depurar errores de imágenes de cuadrícula
              //$json = json_encode($filename);
              //echo '<script>console.log( "El archivo " + ' . $json . ' + " no coincide con la expresión regular<br>" )</script>';
            }
        }
    ?>
</div>

      </div>
    </section><!-- End Gallery Section -->

  </main><!-- End #main -->
<?php get_footer() ?>

<script>
  /**
 * simpleParallax Inicio
 */
  // Selecciona el elemento con la clase "thumbnail-parallax"
var parallaxElement = document.querySelector('.thumbnail-parallax');

// Obtiene la URL de la imagen de fondo a través de la propiedad "data-image-url"
var imageUrl = parallaxElement.dataset.imageUrl;

// Obtiene el elemento img y le establece la URL de la imagen de fondo
var imageElement = parallaxElement.querySelector('.background-image');
imageElement.src = imageUrl;

// Inicializa la librería simpleParallax.js utilizando el elemento img
new simpleParallax(imageElement, {
  scale: 1.8,
  orientation: 'down',
  overflow: true,
  delay: 0.5,
  transition: 'cubic-bezier(0,0,0,1)',
  /* Agrega cualquier otra opción que desees utilizar */
  /* Es importante agregar la opción "customContainer" y "customWrapper" */
  /* para asegurarse de que la librería utilice el elemento seleccionado */
  /* como contenedor y envoltorio personalizado. */
  /* También se puede ajustar el valor de "scale" y otros ajustes según sea necesario */
  /* para obtener el efecto deseado */
});
</script>

<script>
  /**
 * Gsap-ScrolTrigger Animation
 */

// Configurar animación con GSAP
gsap.registerPlugin(ScrollTrigger);

ScrollTrigger.defaults({
  toggleActions: 'restart pause resume pause',
  //markers: true,
})

const gsapQuees = gsap

const tl = gsap.timeline({
  defaults: {
    ease: "power1.inOut(0.1)",
  },
  scrollTrigger: {
    trigger: ".image-container-gsap",
    start: "center center",
    end: "+=900%",
    scrub: true,
    pin: true
  },
});

console.log(tl)
console.log(gsapQuees)

tl.from(".fade:nth-of-type(1)", {
  opacity: 0.5,
  duration: 0.5
}, '-=0.5')
.to(".fade:nth-of-type(1)", {
  opacity: 1,
  duration: 0.5,
},'-=0.5')
.to(".fade:nth-of-type(1) h2", {
  opacity: 1,
  duration: 4,
  y: 0,
},'-=1')
.to(".fade:nth-of-type(1) img", {
  opacity: 1,
  duration: 2,
  onStart: function() {
    this.targets()[0].style.opacity = 1; // Ajustar opacidad para que la imagen aparezca inmediatamente
  }
},'-=2')
.to(".fade:nth-of-type(1)", {
  opacity: 0,
  duration: 4,
})
.to(".fade:nth-of-type(2)", {
  opacity: 1,
  duration: 4,
})
.to(".fade:nth-of-type(2) h2", {
  opacity: 1,
  duration: 4,
  y: 0,
},'-=2')
.to(".fade:nth-of-type(2) img", {
  opacity: 1,
  duration: 4,
  onStart: function() {
    this.targets()[0].style.opacity = 1; // Ajustar opacidad para que la imagen aparezca inmediatamente
  }
},'-=2')
.to(".fade:nth-of-type(2)", {
  opacity: 0,
  duration: 8,
}, '-=2')
.to(".fade:nth-of-type(3)", {
  opacity: 1,
  duration: 4,
})
.to(".fade:nth-of-type(3) h2", {
  opacity: 1,
  duration: 4,
  y: 0,
},'-=2')
.to(".fade:nth-of-type(3) img", {
  opacity: 1,
  duration: 2,
  onStart: function() {
    this.targets()[0].style.opacity = 1; // Ajustar opacidad para que la imagen aparezca inmediatamente
  }
},'-=2')
.to(".fade:nth-of-type(3)", {
  opacity: 0.1,
  duration: 8,
}, '-=2');



</script>
