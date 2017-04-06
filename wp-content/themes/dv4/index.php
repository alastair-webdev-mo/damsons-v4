<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dv4
 */

get_header(); ?>

<div class="blog">
	<div class="blog__wrapper">

		<?php query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => 1,
			'post__in'  => get_option( 'sticky_posts' ),
			'paged' => get_query_var('paged'))); 
		?>

		<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; $c=0;?>
		<?php while (have_posts()) : the_post(); ?>

		<?php $c++;
		if( $c == 1) :?>

		<h2 class="page__title">Latest News</h2>
		
		<div class="col">
			<div class="col__wrapper col__nowrap blog__hero">
				<div class="col8 margin0 blog__hero__post">
					<?php get_template_part( 'parts/post-full', get_post_format() ); ?>

					<?php endif;?>
					<?php endwhile; ?>
					<?php endif;?>

					<?php wp_reset_query(); ?>
				</div>
				<div class="col5 margin0">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

		<div class="blog__main__content">
			<div class="blog__categories">
						<?php wp_list_categories( array(
				        	'orderby' => 'name',
				        	'title_li' => '',
				    	) ); ?> 
			</div>

			<div class="col">
				<div class="col__wrapper blog__main">
				<?php $data = new WP_Query(array(
						'post_type' => 'post',
						'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
					));?>

					<?php
						if($data->have_posts()) :
    						while($data->have_posts())  : $data->the_post();
								get_template_part( 'parts/post', get_post_format() );
							endwhile; 

							$total_pages = $data->max_num_pages;

							if ($total_pages > 1) {
								$current_page = max(1, get_query_var('paged'));

								echo '<div class="blog__pagination">'; 
								echo paginate_links( array(
									'base' => get_pagenum_link(1) . '%_%',
						            'format' => 'page/%#%',
						            'current' => $current_page,
						            'total' => $total_pages,
						            'prev_text'    => __('&#139; Prev'),
						            'next_text'    => __('Next &#155;'),
								) );
							}; 
								echo '</div>'; ?>

							<?php else: ?>
							<h2>Sorry</h2>
							<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>
						<?php wp_reset_postdata();?>
				

				</div>
			</div>

		</div>
	</div>
</div>

<?php
get_footer();
