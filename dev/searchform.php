<?php
/**
 * Custom Searchform
 *
 * @package wprig
 */
?>

<div class="div-searchbar">
	<input type="text" placeholder="Busque un evento" class="menu-search" id="menu-search" name="s" value="<?php echo esc_attr( get_search_query() );?>">
	<button class="searchsubmit" type="submit" id="searchsubmit"><span class="dashicons dashicons-search" id="iconsearch-header"></span></button>
</div>
