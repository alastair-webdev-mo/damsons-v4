<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dv4
 */

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$imgID  = get_post_thumbnail_id($post->ID);
$image_alt = get_post_meta($imgID,'_wp_attachment_image_alt', true);
$title = urlencode(get_the_title());
$url2 = urlencode(get_permalink());
$twitter_username = 'damsonsfp';
$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>

<div class="col8">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry__header">
			<div class="entry__share">
				<a class="entry__social entry__social--single fb-share" href="#" target="_blank">
				  	<i class="fa fa-fw fa-facebook" aria-hidden="true"></i>
				</a>
				<a class="entry__social entry__social--single" title="Share this on Twitter" href="http://twitter.com/intent/tweet/?text=<?php echo $title; ?>&url=<?php echo $url2; ?>&via=<?php echo $twitter_username; ?>" target="_blank">
				  	<i class="fa fa-fw fa-twitter" aria-hidden="true"></i>
				</a>
				<div class="entry__social entry__drawer" target="_blank">
					<ul class="entry__sociallist">
					  	<li class="initial"><a href=""><i class="fa fa-fw fa-ellipsis-h" aria-hidden="true"></i></a></li>
					  	<li><a href="http://www.tumblr.com/share/link?url=<?php echo $url2; ?>&name=<?php echo $title; ?>&description=<?php echo urlencode(the_excerpt()) ?>"><i class="fa fa-fw fa-tumblr" aria-hidden="true"></i></a></li>
					  	<li><a href="http://pinterest.com/pin/create/button/?url=<?php echo $url2; ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php echo $title; ?>" data-pin-do="buttonBookmark" data-pin-custom="true"><i class="fa fa-fw fa-pinterest" aria-hidden="true"></i></a></li>
					  	<li><a href="" class="copy-url"><i class="fa fa-fw fa-link" aria-hidden="true"></i><span class="copy-url__tooltip"></span></a></li>
					  </ul>
				</div>
			</div>
			<div class="entry__text">
				<?php the_title( '<h2 class="page__title article__title">', '</h2>' ); ?>
				<h2 class="page__subtitle"><?php echo the_subtitle(); ?></h2>
			</div>
		</header>
		<div class="entry__image">
			<img src="<?php echo $url; ?>" alt="<?php echo $image_alt; ?>">
		</div>
		<div class="entry__content article__content">
			<?php the_content(); ?>
		</div>
	</article>
	<div class="post__footer">
		<div class="back"><span><a onclick="goBack()">Back</a></span></div>
	</div>
</div>
