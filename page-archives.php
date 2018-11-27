<?php
/**
 * The template for displaying Archives pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>
	<div id="primary" class="archives content-area">
		<main id="main" class="site-main" role="main">

                <?php get_template_part( 'template-parts/content', 'page' ); ?>

             <section class="authors">
            <h1>Quote Authors</h1>
            <?php $posts = get_posts(array('numberposts' => -1));?>
           <?php foreach ($posts as $post) : setup_postdata( $post );?>
            <a href="<?php  the_permalink(); ?>"><?php  the_title(); ?></a>
                <?php endforeach; wp_reset_postdata(); ?>
         </section>


            <section class="category-section">
            <h1 class="h1-title-archives">Categories</h1>
                <!-- Display category links to show archive of posts of this category-->
            <?php wp_tag_cloud( array('taxonomy' => 'category','smallest'=> 14, 'largest'=> 14)); ?>
            </section>


            <section class="tags-section">
            <h1 class="h1-title-archives">Tags</h1>
             <!-- Display tags links to show archive of posts of this category-->
            <?php wp_tag_cloud(array('smallest'=> 14, 'largest'=> 14)) ?>
            </section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
