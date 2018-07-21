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

</article><!-- #post-<?php the_ID(); ?> -->
