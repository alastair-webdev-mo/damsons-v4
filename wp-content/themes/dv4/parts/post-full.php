<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dv4
 */

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;

?>

<div class="blog-area__post blog-area__full margin0">
    <a class="blog__link" href="<?php echo esc_url( get_permalink() ); ?>"></a>
    <div class="post__image" style="background: url('<?php echo $url; ?>');background-size:cover;background-position: center;background-repeat:no-repeat;"></div>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post__content">
            <div class="post__title">
                <?php the_title( sprintf( '<h4><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
            </div>
            <?php if ( 'post' === get_post_type() ) : ?>
            <div class="post__more">
                <p><?php the_subtitle(); ?></p>
            </div>
            <div class="post__meta">
                <span><?php the_date(); ?></span>
                <span><?php the_category(); ?></span> 
            </div>
            <?php endif; ?>
        </div>
    </article>
</div>