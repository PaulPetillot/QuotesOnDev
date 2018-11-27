<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div>
		<div class="description">
		<?php the_content();?>
		</div>
	<div class="meta-content">
		<h2 class="author-name">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</div>
</article><!-- #post-## -->
