<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dv4
 */

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true);

?>

<div class="wrapper__content">
	<div class="contain">
		
		<div class="page__header">
			<h2 class="page__title"><?php the_title(); ?></h2>
			<h3 class="page__subtitle"><?php the_subtitle(); ?></h3>
		</div>

		<?php the_content(); ?>

	</div>

		<div class="blog-area">
			<h2 class="contain underline__full">... or read some of our great life guides</h2>
			<div class="blog-area__contain blog-area__horizontal">
				<?php if(is_page('will-writing')) : ?>
				<?php get_template_part( 'area/blogs-wills' ); ?>
				<?php elseif(is_page('funeral-plans')) : ?>
				<?php get_template_part( 'area/blogs-all' ); ?>
				<?php else : ?>
				<?php get_template_part( 'area/blogs-all' ); ?>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( is_active_sidebar( 'product-cards' ) ): ?>
			<div class="products">
				<h2 class="contain underline__full">Damsons. Here for you, before you need us.</h2>
				<div class="products__contain">
					<?php dynamic_sidebar( 'product-cards' ); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'request' ) ): ?>
			<div class="request width100 request--large">
				<div class="request__contain">
					<?php dynamic_sidebar( 'request' ); ?>
				</div>
			</div>
		<?php endif; ?>

</div>
