<?php /* Template Name: Policy Page */

get_header(); ?>

<main class="margin__top">
	<div class="wrapper">
		<div class="contain">
			<div class="col">
				<div class="col__wrapper col__nowrap">

					<div class="col8 col__policy">
						<h2><?php the_title(); ?></h2>
						<div class="entry__content">
						<?php the_content(); ?>
						</div>
					</div>

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
</main>

<?php
get_footer();