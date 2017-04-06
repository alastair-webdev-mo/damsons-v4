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

$taxonomy = 'faq_categories';

?>

<div class="wrapper__content">
	<div class="contain">
		
		<div class="page__header">
			<h2 class="page__title"><?php the_title(); ?></h2>
			<h3 class="page__subtitle"><?php the_subtitle(); ?></h3>
		</div>


	<h2 class="underline__full padding10">Will Writing</h2>
		
	<?php
    $args = array( 
    	'post_type' => 'faq',
    	'order'=> 'DESC', 
    	'orderby' => 'date', 
    	'tax_query' => array(
    			array(
    				'taxonomy' => $taxonomy,
    				'field' => 'slug',
    				'terms' => 'will-writing'
    			)
    		) );
    $postslist = get_posts( $args );
    $term_list = wp_get_post_terms($post->ID, $taxonomy, array("fields" => "all"));
    foreach ($postslist as $post) :  setup_postdata($post);  ?>

    <div id="accords" class="accordion">
    	<div class="accordion__header">
			<?php the_title( sprintf( '<h2>' ), '</h2>' ); ?>
	    </div>
	    <div class="accordion__content">
	    	<div class="accordion__text">
	    		<?php the_content(); ?>
	    	</div>
	    </div>
	</div>

	<?php
	endforeach; 
	wp_reset_postdata();
	?>

	<div class="blog-area">
		<div class="blog-area__contain blog-area__guides">
			<?php get_template_part( 'area/blogs-wills', get_post_format() ); ?>
		</div>
	</div>

	<h2 class="underline__full padding10">Funeral Plans</h2>
		
	<?php
    $args = array( 
    	'post_type' => 'faq',
    	'order'=> 'DESC', 
    	'orderby' => 'date', 
    	'tax_query' => array(
    			array(
    				'taxonomy' => $taxonomy,
    				'field' => 'slug',
    				'terms' => 'funeral-plans'
    			)
    		) );
    $postslist = get_posts( $args );
    $term_list = wp_get_post_terms($post->ID, $taxonomy, array("fields" => "all"));
    foreach ($postslist as $post) :  setup_postdata($post);  ?>

    <div id="accords" class="accordion">
    	<div class="accordion__header">
			<?php the_title( sprintf( '<h2>' ), '</h2>' ); ?>
	    </div>
	    <div class="accordion__content">
	    	<div class="accordion__text">
	    		<?php the_content(); ?>
	    	</div>
	    </div>
	</div>

	<?php
	endforeach; 
	wp_reset_postdata();
	?>

	<div class="blog-area">
		<div class="blog-area__contain blog-area__guides">
			<?php get_template_part( 'area/blogs-fp', get_post_format() ); ?>
		</div>
	</div>

	<h2 class="underline__full padding10">Estate Administration</h2>
	
	<?php
    $args = array( 
    	'post_type' => 'faq',
    	'order'=> 'DESC', 
    	'orderby' => 'date', 
    	'tax_query' => array(
    			array(
    				'taxonomy' => $taxonomy,
    				'field' => 'slug',
    				'terms' => 'estate-administration'
    			)
    		) );
    $postslist = get_posts( $args );
    $term_list = wp_get_post_terms($post->ID, $taxonomy, array("fields" => "all"));
    foreach ($postslist as $post) :  setup_postdata($post);  ?>

    <div id="accords" class="accordion">
    	<div class="accordion__header">
			<?php the_title( sprintf( '<h2>' ), '</h2>' ); ?>
	    </div>
	    <div class="accordion__content">
	    	<div class="accordion__text">
	    		<?php the_content(); ?>
	    	</div>
	    </div>
	</div>


	<?php
	endforeach; 
	wp_reset_postdata();
	?>

	</div>

</div>
