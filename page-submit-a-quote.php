<?php
/**
 * The template for displaying submit pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="submit content-area">
		<main id="main" class="site-main" role="main">

			<section>

            <header>
               <h1> <?php the_title(); ?> </h1>
            </header>
            <h2 class="message-receive"></h2>
            <?php if (!is_user_logged_in() && !current_user_can('edit_posts' )) : ?>
            <p class="sorry-message">Sorry, you must be logged in to submit a quote!</p>
            <a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login">Click here to login</a>
            <?php else : ?>
            <form class="submit-form" method="get" action="<?php echo home_url( '/' ); ?>">    
                            
                            <h4>Author of quote</h4>
                            <input type="text" id="author-name-field"/>
    
                            <h4>Quote</h4>
                            <input type="text" id="quote-content-field"/>
    
                            <h4>Where did you find this quote? (e.g. book name)</h4>
                            <input type="text" id="quote-source-field"/>
    
                            <h4>Provide the URL of the quote source, if available.</h4>
                            <input type="text" id="quote-url-field"/>
                            <br>
                            <input id="submit-button"type="submit" value="Submit Quote">
                        </form>
    
            <?php endif ?>
			</section>
    
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
