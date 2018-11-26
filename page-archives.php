<?php
/**
 * The template for displaying Archives pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <section>
                    <!-- Display author single post by author with "Show me another button"-->
                    <?php  //get_post() with posts_per_Page as arg 
                            // foreach and setup_postdata
                    ?>
            </section>


            <section>
                    <!-- Display category links to show archive of posts of this category-->
                    <?php  //use Wordpress methos to list your categories (no loop)
                    ?>
            </section>


            <section>
                    <!-- Display tags links to show archive of posts of this category-->
                    <?php  //use Wordpress methos to show a tag cloud (no loop)
                    ?>
            </section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
