<?php /* Template Name: Product Page */

get_header(); ?>

<main class="margin__top">
	<div class="wrapper">

		<div class="wrapper__content">
			<div class="contain">

				<?php the_field('top_banner'); ?>

				<?php if(!is_page('funeral-plans')) : ?>

					<div class="col page__top">
						<div class="col__wrapper col__nowrap">
							<div class="col5 page__bullets margin0">
								<?php the_field('bullet_point_area'); ?>
							</div>
							<div class="col7 page__top-image margin0">
								<div class="image__block">
									<div class="image__block--image" style="background:url(<?php the_field('image'); ?>);background-size:cover;"></div>
									<div class="image__block--caption"><h4><?php the_field('image_caption'); ?></h4></div>
								</div>
							</div>
						</div>
					</div>

				<?php endif; ?>

				<?php if(is_page('funeral-plans')) : ?>

				<?php if( have_rows('plans') ): ?>

					<div class="col col--plans">
						<div class="col__wrapper col__nowrap">
							<div class="col8 margin0 col__wrapper">
								<?php while( have_rows('plans') ): the_row(); 

									// vars
									$title = get_sub_field('plan_title');
									$content = get_sub_field('plan_content');
									$price = get_sub_field('plan_price');
									$rating = get_sub_field('plan_rating');
									$link = get_sub_field('plan_link');
									$popup_open = get_sub_field('plan_popup_name');
									$offer = get_sub_field('plan_offer');
									$full_price = get_sub_field('plan_full_price');
									$deposit = get_field('deposit');

									?>

									<div class="col6 plan margin0">
										<?php if( $link ): ?>
											<a href="<?php echo $link; ?>" class="plan__link" data-name="<?php echo $popup_open; ?>" data-price="<?php echo $full_price; ?>"></a>
										<?php endif; ?>


										<?php if( $title ): ?>
											<h4><?php echo $title; ?></h4>
										<?php endif; ?>

										<?php if( $content ): ?>
											<div class="plan__content">
												<?php echo $content; ?>
												<?php if( $offer ): ?>
													<img src="<?php echo $offer['url']; ?>" alt="<?php echo $offer['alt'] ?>" />
												<?php endif; ?>
											</div>
										<?php endif; ?>

										<?php if( $price ): ?>
											<div class="plan__footer">
												<div class="plan__price">
													<span>from</span>
													<strong>£<?php echo $price; ?></strong>
													<span>per month*</span>
													<span><small>(+ £<?php echo $deposit; ?> initial deposit)</small></span>
												</div>
												<div class="plan__rating">
													<?php if( $rating == 'one' ): ?>
														<span><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></span>
													<?php endif; ?>
													<?php if( $rating == 'two' ): ?>
														<span><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></span>
													<?php endif; ?>
													<?php if( $rating == 'three' ): ?>
														<span><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></span>
													<?php endif; ?>
													<?php if( $rating == 'four' ): ?>
														<span><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></span>
													<?php endif; ?>
													<?php if( $rating == 'five' ): ?>
														<span><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>
													<?php endif; ?>
												</div>
											</div>
										<?php endif; ?>

									</div>

								<?php endwhile; ?>

							</div>
							<div class="col4 margin0 form">
								<div class="form__header">
									<h4>Get a quote today</h4>
									<h3 class="number">0800 088 4670</h3>
								</div>

								<form id="form__fp" class="form__validation form__fp" action="//damsonsfutureplanning.co.uk/scripts/fp__api.php" method="POST">
									<fieldset>
										<label>Full name</label>
										<span class="input__wrap">
											<input type="text" id="name" class="input__field" placeholder="What's your full name?" name="full-name" required>
										</span>
									</fieldset>
									<fieldset>
										<label>Email address</label>
										<span class="input__wrap">
											<input type="email" id="email" class="input__field" placeholder="Your email address" name="email" required>
										</span>
									</fieldset>
									<fieldset>
										<label>Phone</label>
										<span class="input__wrap">
											<input type="tel" id="phone" class="input__field input__phone" placeholder="Best number to contact you on" name="phone" required>
										</span>
									</fieldset>
									<span class="submit">
										<button class="button button--green button--request form__submit" name="submit">Get a quote <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
									</span>
									<span class="opt">
										<fieldset> 
										  <span class="input__wrap input__wrap--checkbox">
											  <input type="checkbox" name="optIn" class="input__check">
											  <label for="check" class="input__label--check">
											  	<span>This tick indicates your consent to receive contact from one of our trusted funeral planning experts to discuss your wishes and requirements by telephone, email or SMS.</span>
											  </label>
										  </span>
										</fieldset>
									</span>
								</form>

								<div class="form__after">
									<p>Thousands of people like you have secured their funeral plan with Damsons already!</p>
								</div>
								<img class="form__offer" src="http://localhost:8888/wp-content/uploads/2017/03/star-callout-2@2x.png" width="120">
							</div>
						</div>
					</div>

		<?php endif; ?>

		<?php endif; ?>

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
		</div>
	
	</div>
</main>

<?php
get_footer();