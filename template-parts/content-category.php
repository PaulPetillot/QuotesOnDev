<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
	</header><!-- .entry-header -->



    <div class="entry-content">
		<div class="description">
		<?php the_excerpt();?>
		</div>
		<div class="meta-content">
		<h2 class="author-name"> -<?php the_title(); ?> </h2>
	<?php if ((!empty($source)) && (!empty($source_url) )) : ?>
		<h2 class = "metah2"><a class= "link-source-url" href="<?php echo $source_url ?>"><?php echo $source ?></a></h2>
		</div>
	</div>
	<?php elseif (!empty($source) && (empty($source_url))): ?>
		<h2 class="author-name"> -<?php the_title(); ?>, </h2>
		<h2 class = "metah2"><?php echo $source ?></h2>
		</div>
	</div>
	<?php else : ?>
		
	</div>
	<?php endif ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
				'after'  => '</div>',
			) );
		?>
</article><!-- #post-## -->
