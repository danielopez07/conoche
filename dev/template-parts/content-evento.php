<?php
/**
 * Template part for displaying eventos
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

?>

<?php
	wp_print_styles( array( 'wprig-eventos' ) ); // Note: If this was already done it will be skipped.
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="evento-header">
		<?php
			the_title( '<h1 class="evento-title">', '</h1>' );
		?>
	</header><!-- .evento-header -->
	<div class="evento-meta">
	<?php
		get_meta_evento( $post->ID );
	?>
	</div><!-- .evento-meta -->

	<?php wprig_post_thumbnail(); ?>

	<div class="evento-content">
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
	</div><!-- .entry-content -->

	<div>
	<!-- Getting the author id: get_the_author_meta( 'ID' ); -->
		<h1><?php echo get_the_author_meta( 'ID' ); ?> </h1>
		<?php
		$args = array(
			'author'    => get_the_author_meta( 'ID' ),
			'post_type' => 'negocio',
		);
		// The Query for Getting Negocio.
		$the_query = new WP_Query( $args );

		// The Loop.
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$negocio_id = get_the_id();
			}
			/* Restore original Post Data */
			wp_reset_postdata();
		}
		?>
	</div>
	<div class="negocio-horario">
		<h3>Horario</h3>
		<?php
		get_horario( $negocio_id );
		?>
	</div>
	<div class="negocio-ubicacion">
		<h3>Ubicación</h3>
		<?php
		get_ubicacion( $negocio_id );
		?>
	</div>
	<div class="negocio-contacto">
		<h3>Contacto</h3>
		<?php
		get_contacto( $negocio_id );
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
