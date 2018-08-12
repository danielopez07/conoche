<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		wprig_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'evento' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				if ( ! get_field( 'fecha_de_finalizacion' ) ) {
					$dateformatstring = "l d F, Y";
					$unixtimestamp    = strtotime( get_field( 'fecha_de_inicio' ) );
					echo esc_html( date_i18n( $dateformatstring, $unixtimestamp ) );
				} else {
					$dateformatstring = "l d F";
					$unixtimestamp    = strtotime( get_field( 'fecha_de_inicio' ) );
					echo 'Del ' . esc_html( date_i18n( $dateformatstring, $unixtimestamp ) );
					$dateformatstring1 = "l d F, Y";
					$unixtimestamp    = strtotime( get_field( 'fecha_de_finalizacion' ) );
					echo ' al ' . esc_html( date_i18n( $dateformatstring, $unixtimestamp ) );
				}
				?>
			</div><!-- .entry-meta -->
			<?php
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
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
