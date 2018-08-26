<?php
/**
 * Template name: Custom Search
 *
 * @package wprig
 */

get_header();

wp_print_styles( array( 'wprig-content', 'wprig-front-page' ) ); // Note: If this was already done it will be skipped.

$today = date('Ymd');

if( $_GET['search'] && !empty($_GET['search']) )
{
	$text = $_GET['search'];
	echo $text;
}

$args = array(
	'post_type'  => 'evento',
	'meta_key'   => 'fecha_de_inicio',
	'orderby'    => 'meta_value_num',
	'order'      => 'ASC',
	's'          => $text,
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
