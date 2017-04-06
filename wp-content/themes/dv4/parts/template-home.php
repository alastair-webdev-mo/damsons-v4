<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dv4
 */

$blog_classes   = array();
$section_class  = array();
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true);

?>

<div class="wrapper__content">
	<div class="contain">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(); ?>
		</div>
	</div>
	
	<?php if ( is_active_sidebar( 'product-cards' ) ): ?>
		<div class="products">
			<h2 class="contain underline__full">Services and support, for all your future plans.</h2>
			<div class="products__contain products__contain--large">
				<?php dynamic_sidebar( 'product-cards' ); ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'request' ) ): ?>
		<div class="request width100">
			<div class="request__contain">
				<?php dynamic_sidebar( 'request' ); ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'testimonials' ) ): ?>
		<div class="testimonials">
			<h2 class="contain underline__full">We love happy customers...</h2>
			<div class="testimonials__contain">
				<div class="col5 testimonials__vertical margin0">
					<?php dynamic_sidebar( 'testimonials' ); ?>
				</div>
				<div class="col7 testimonials__image margin0"></div>
			</div>
		</div>
	<?php endif; ?>

	<div class="blog-area">
		<h2 class="contain underline__full">... and have written some great life guides</h2>
		<div class="blog-area__contain blog-area__horizontal">
			<?php get_template_part( 'area/blogs-all' ); ?>
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

	<?php if ( is_active_sidebar( 'brochure' ) ): ?>
		<div class="request widthContain">
			<div class="request__contain request__wrapper">
				<?php dynamic_sidebar( 'brochure' ); ?>
			</div>
		</div>
	<?php endif; ?>
</div>

<?php if ( get_edit_post_link() ) : ?>
	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					esc_html__( 'Edit %s', 'dv4' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer>
<?php endif; ?>
