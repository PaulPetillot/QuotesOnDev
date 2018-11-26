<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php //get the content ?>
	<?php 
	//If source and source url fields are not empty then show them
	// Else if the source only has content show the source only
	// Else show empty span
	?>
	<div class="entry-content">
		<?php the_excerpt();?>
		<h2> -<?php the_title(); ?> </h2>
	</div>
</article><!-- #post-## -->

	<? // if is_home or is_single?>
		<button class="new-quote-button">Show me another !</button>
	<?php //endif ?>