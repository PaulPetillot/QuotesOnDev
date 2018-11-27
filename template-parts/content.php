<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */
$source = get_post_meta( get_the_ID(), '_qod_quote_source', true );
$source_url = get_post_meta( get_the_ID(), '_qod_quote_source_url', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php //get the content ?>
	<?php 
	//If source and source url fields are not empty then show them
	// Else if the source only has content show the source only
	// Else show empty span
	?>
	<div class="entry-content">
		<div class="description">
			<?php the_content();?>
		</div>
		<div class="meta-content">
			<h2 class="author-name"> -
				<?php the_title(); ?>, </h2>
			<?php if ((!empty($source)) && (!empty($source_url) )) : ?>
			<h2 class="metah2"><a class="link-source-url" href="<?php echo $source_url ?>">
					<?php echo $source ?></a></h2>
		</div>
	</div>
	<?php elseif (!empty($source) && (empty($source_url))): ?>
	<h2 class="author-name"> - <?php the_title(); ?>, </h2>
	<h2 class="metah2"> <?php echo $source ?> </h2>
	</div>
	</div>
	<?php else : ?>

	</div>
	<?php endif ?>
</article><!-- #post-## -->

<?php if (is_home() || is_single()) : ?>
	<button class="new-quote-button">Show me another !</button>
<?php  endif; ?>