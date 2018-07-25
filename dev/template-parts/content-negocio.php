<?php
/**
 * Template part for displaying negocios
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

?>

<?php
	wp_print_styles( array( 'wprig-negocios' ) ); // Note: If this was already done it will be skipped.
?>

<article id="post-<?php the_ID(); ?>" class="negocio-wrapper">
	<header class="negocio-header">
		<?php
			the_title( '<h1 class="negocio-title">', '</h1>' );
		?>
	</header><!-- .negocio-header -->

	<?php wprig_post_thumbnail(); ?>

	<div class="negocio-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wprig' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		?>
	</div><!-- .negocio-content -->
	<div class="negocio-horario">
		<h3>Horario</h3>
		<?php
		get_horario( $post->ID );
		?>
	</div>
	<div class="negocio-ubicacion">
		<h3>Ubicación</h3>
		<?php
		get_ubicacion( $post->ID );
		?>
	</div>
	<div class="negocio-contacto">
		<h3>Contacto</h3>
		<?php
		get_contacto( $post->ID );
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
