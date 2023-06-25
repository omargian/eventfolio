<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>

<?php get_header(); ?>
	
		<!-- Es la función más importante de WordPress. Todo su contenido se genera a través de un bucle. -->
        <!-- SI hay publicaciones, MIENTRAS hay publicaciones, MOSTRAR la publicación. Todo lo que esté dentro del bucle se repetirá. -->
        <!-- Para un blog, este será el título de la publicación, la fecha, el contenido y los comentarios. -->
        <!-- Para insertar la paginación, tendremos que ponerla después del endwhile pero antes del endif.
        Esto significa que no se repetirá para cada bucle, sino que solo aparecerá una vez según las publicaciones.-->
        <?php
			if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        get_template_part( 'content', get_post_format() );
			endwhile; 
            ?>
<nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="#"><?php next_posts_link( 'Previous' ); ?></a>
        <a class="btn btn-outline-secondary disabled"><?php previous_posts_link( 'Next' ); ?></a>
      </nav>
        <?php endif;
		?>

<?php get_footer(); ?>