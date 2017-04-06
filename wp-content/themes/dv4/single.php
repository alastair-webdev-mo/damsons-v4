<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dv4
 */

get_header(); ?>

<div class="blog">
	<div class="blog__wrapper">
		
		<div class="col">
			<div class="col__wrapper col__nowrap">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'parts/post-single', get_post_format() );
				endwhile;
				?>

				<div class="col4 margin1 sidebar__news">
					<?php if ( is_active_sidebar( 'sidebar__news' ) ): ?>
							<div class="sidebar__contain">
								<?php dynamic_sidebar( 'sidebar__news' ); ?>
								<?php get_template_part('area/blogs-vertical'); ?>
							</div>
					<?php endif; ?>
				</div>

			</div>
		</div>

	</div>
</div>

<?php
get_footer();
