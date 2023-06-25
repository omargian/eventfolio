<?php
/**
* Template Name: contacto
*/

// Exit if accessed directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>

<?php get_header(); ?>

<div class="parallax-contact" data-image-contact-url="https://giantec.test/giantec/neontt/wp-content/uploads/2023/05/neontt-1-sub-slider-a.jpg" style="overflow: hidden;" data-stellar-background-ratio="0.5" id="home" data-aos="fade" data-aos-delay="2000">

      <img class="bg-image-contact" src="https://giantec.test/giantec/neontt/wp-content/uploads/2023/05/neontt-1-sub-slider-a.jpg">

    <!-- ======= Contact Section ======= -->
<div class="contacto-overlay">
      <div class="container contact border rounded pb-3 bg-dark bg-opacity-75 mx-auto pb-5" style="margin-top:7rem;">
    <!-- ======= End Page Header ======= -->
        <div class="page-header">
            <div class="row align-items-center justify-content-center">
              <div class="text-center">
                <h2>¿Tienes una idea?</h2>
              </div>
            </div>
        </div><!-- End Page Header -->
        <div class="row gy-4 justify-content-center" style="max-width:700px">
          <div class="col-lg-8 section-header">
            <h2>Contacto</h2>
            <p>Cuéntanos de que se trata.</p>
          </div>
          <div class="cursor"></div>
        </div>
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-3">
            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3">
            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3">
            <div class="info-item d-flex">
              <i class="bi bi-phone flex-shrink-0"></i>
              <div>
                <h4>Call:</h4>
                <p>+1 5589 55488 55</p>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row justify-content-center mt-4">

          <div class="col-lg-9">
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
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

</div>
</div>

<?php get_footer() ?>
<script>
  /**
 * SIMPLE PARALLAX CONTACT
 */
var parallaxContact = document.querySelector('.parallax-contact');
      var imageContactUrl = parallaxContact.dataset.imageContactUrl;
      var imageContactElement = parallaxContact.querySelector('.bg-image-contact');
      imageContactElement.src = imageContactUrl;
      new simpleParallax(imageContactElement, {
         scale: 1.8,
         orientation: 'down',
         overflow: true,
         delay: 0.5,
         transition: 'cubic-bezier(0,0,0,1)',
        });
</script>