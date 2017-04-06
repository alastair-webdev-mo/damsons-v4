<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dv4
 */

get_header(); ?>

<?php if(is_page('home')) : ?>

<main>
	<div class="wrapper">

		<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'parts/template', 'home' );

				// End of the loop.
			endwhile;
		?>
		</div>
	
	</div>
</main>

<?php elseif (is_page('guides-advice')) : ?>

<main>
	<div class="wrapper">

		<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'parts/template', 'guides' );

				// End of the loop.
			endwhile;
		?>
		</div>
	
	</div>
</main>

<?php if ( is_active_sidebar( 'request' ) ): ?>
	<div class="request width100 request--large">
		<div class="request__contain">
			<?php dynamic_sidebar( 'request' ); ?>
		</div>
	</div>
<?php endif; ?>

<?php else : ?>

<main class="margin__top">
	<div class="wrapper">

		<?php

				// Include the page content template.
				get_template_part( 'parts/template', 'default' );
		?>
		</div>
	
	</div>
</main>

<?php endif; ?>

<?php
get_footer();