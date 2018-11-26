<?php
/**
 * The template for displaying submit pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section>

            <header>
                <?php the_title(); ?>
            </header>
            <?php //if user is logged in & can edit posts ?>
            <!--Display form--> 
            <?php //else display ?>
            <!-- Sorry you must be logged to submit a quote -->
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
