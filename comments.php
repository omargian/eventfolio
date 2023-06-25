<!-- configurando la funcionalidad para evitar que los usuarios publiquen comentarios si
ha establecido su configuración en comentarios protegidos con contraseña ( post_password_required()) -->
<?php if ( post_password_required() ) {
	return;
} ?>
<!-- si hay comentarios ( have_comments()), mostrará cuántos comentarios hay en la publicación ( get_comments_number())
seguido de la lista de comentarios ( wp_list_comments()) -->
	<div id="comments" class="comments-area">
		<?php if ( have_comments() ) : ?>
			<p class="comments-title">
<?php
printf( _nx( 'Un comentario en "%2$s"', '%1$s comentarios en "%2$s"', get_comments_number(), 'comments title'),
	number_format_i18n( get_comments_number() ), get_the_title() );
?>
			</p>
			<ul class="comment-list custom-class-comment list-group">
<!-- la siguiente funcion llama a la funcion mytheme_comment que esta en function
para personalizar los comentarios que vienen por defecto en WP -->				
		<?php
        wp_list_comments( 'callback=mytheme_comment' );
        ?>
			</ul>
            
<!-- Si los comentarios están cerrados ( ! comments_open()), se lo informará;
al final estará el formulario para enviar un comentario ( comment_form()). -->

		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments">
<?php _e( 'Comments are closed.' ); ?>
			</p>
		<?php endif; ?>
		<?php comment_form(); ?>
	</div>