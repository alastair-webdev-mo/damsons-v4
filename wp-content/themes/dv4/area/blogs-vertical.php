
<?php
    $currentID = get_the_ID();
    $args = array( 'numberposts' => 3, 'order'=> 'DESC', 'orderby' => 'date', 'post__not_in' => array($currentID));
    $postslist = get_posts( $args );
    foreach ($postslist as $post) :  setup_postdata($post);
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
    $url = $thumb['0']; ?>

    <div class="blog-area__post blog-area__vertical">
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
                <?php endif; ?>
            </div>
        </article>
    </div>

<?php
endforeach; 
wp_reset_postdata();
?>
