<?php
/**
 * Template part for displaying faq content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dv4
 */

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;

?>

<div class="col6 faq-area__post margin0">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post__content">
            <div class="post__title">
                <?php the_title( sprintf( '<h4>' ), '</h4>' ); ?>
            </div>
            <?php if ( 'faq' === get_post_type() ) : ?>
            <div class="post__text">
                <?php the_content(); ?>
            </div>
            <div class="post__meta">
                <span><?php the_category(); ?></span> 
            </div>
            <?php endif; ?>
        </div>
    </article>
</div>