<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage dv4
 * @since 1.0
 * @version 4.0
 */

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
$category = get_category( get_query_var( 'cat' ) );
$slug = $category->slug;
get_header(); ?>

<div class="blog">
	<div class="blog__wrapper">

		<div class="col">
			<div class="col__wrapper blog__main">

			<?php $data = new WP_Query(array(
						'post_type' => 'post',
						'cat' => get_query_var('cat'),
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

			<?php else : ?>

				<h2>Sorry</h2>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

			<?php endif; ?>

			</div>
		</div>

	</div>
</div>


<?php get_footer();
