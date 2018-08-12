<?php
/**
 * Render your site front page, whether the front page displays the blog posts index or a static page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package wprig
 */

get_header( 'landing' );

/*
* Include the component stylesheet for the content.
* This call runs only once on index and archive pages.
* At some point, override functionality should be built in similar to the template part below.
*/
wp_print_styles( array( 'wprig-content', 'wprig-front-page' ) ); // Note: If this was already done it will be skipped.

$today = date('Ymd');
// echo $today;
// $time = date('H:i');
// echo $time;

// https://www.advancedcustomfields.com/resources/date-picker/
// https://developer.wordpress.org/reference/classes/wp_query/

$args = array(
	'post_type'  => 'evento',
	'meta_key'   => 'fecha_de_inicio',
	'orderby'    => 'meta_value_num',
	'order'      => 'ASC',
	'meta_query' => array(
		'relation' => 'OR',
		array(
			'key'     => 'fecha_de_inicio',
			'compare' => '>=',
			'value'   => $today,
		),
		array(
			'key'     => 'fecha_de_finalizacion',
			'compare' => '>=',
			'value'   => $today,
		)
	),
);
$query = new WP_Query( $args );

?>
	<main id="primary" class="site-main">

		<?php

		while ( $query->have_posts() ) :
			$query->the_post();

			get_template_part( 'template-parts/content', 'front' );

		endwhile; // End of the loop.
		?>
		<?php the_posts_navigation(); ?>

	</main><!-- #primary -->

<?php
wp_reset_postdata();

get_footer();
