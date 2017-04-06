<div class="sidebar">
<?php       
$posts = new WP_Query(array('posts_per_page' => 9, 'cat' => -6, 'offset' => 1));
if ($posts->have_posts()): ?>
    <h3>Recent News</h3>
    <div class="sidebar__bottom">
        <ul class="sidebar__archives">
        <?php 
        $prev_month = '';
        while ($posts->have_posts()): $posts->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>
</div>