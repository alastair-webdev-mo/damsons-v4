<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage dv4
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="search-hero">
	<div class="search-hero__inner">
		<h2>Search Results</h2>
		<div class="search-hero__form">
			<form action="/" method="get">
			    <input id="search" name="s" type="text" placeholder="Search the site" class="input input--search" value="<?php the_search_query(); ?>" /> <button class="button button--green button--searchicon"><i class="fa fa-lg fa-fw fa-search" aria-hidden="true"></i></button>
			</form>
		</div>
	</div>
</div>

<div class="search">
	<div class="search__wrapper">
	<?php if ( have_posts() ) {
	echo "<div class=\"search--container\"><div class=\"col col--search\"><h2>Articles</h2><div class=\"col__wrapper\">";
    while( have_posts() ) {
        the_post();
        if ( $post->post_type == 'post' ) {
            get_template_part( 'parts/post', get_post_format() );
        }
    } echo "</div></div></div>";
    rewind_posts(); // rewind loop so we can rerun it
    echo "<div class=\"search--container\"><div class=\"col col--search\"><h2>Pages</h2><div class=\"col__wrapper\">";
    while( have_posts() ) { // Start second while loop
        the_post();
        if ( $post->post_type == 'page' ) {
            get_template_part( 'parts/page', get_post_format() );
        }

    } echo "</div></div></div>";
    rewind_posts();
        echo "<div class=\"search--container\"><div class=\"col col--search\"><h2>Frequently Asked Questions</h2><div class=\"col__wrapper\">";
    while( have_posts() ) { // Start second while loop
        the_post();
        if ( $post->post_type == 'faq' ) {
            get_template_part( 'parts/faq', get_post_format() );
        }

    } echo "</div></div></div>";

    rewind_posts(); // rewind loop so we can rerun it

    // Run your third while loop for blog posts

} else {
	echo "<div class=\"search__none\"><h2>Nothing found. Please try and search again.</h2></div>";
	} ?>

	  
	</div>
</div>

<?php if ( is_active_sidebar( 'request' ) ): ?>
    <div class="request width100 request--large">
        <div class="request__contain">
            <?php dynamic_sidebar( 'request' ); ?>
        </div>
    </div>
<?php endif; ?>


<?php get_footer();
