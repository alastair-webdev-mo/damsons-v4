<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	  	<meta charset="<?php bloginfo( 'charset' ); ?>">
	  	<meta http-equiv="x-ua-compatible" content="ie=edge">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<?php wp_head(); ?>
	  	<!-- Links -->
	  	<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<script src="https://use.fontawesome.com/3cf330e970.js"></script>
	  	<!-- Favicon -->
	  	<link rel='icon' href='favicon.ico' type='image/x-icon' />
	  	<link rel="icon" href="favicon-16.png" sizes="16x16" type="image/png">
		<link rel="icon" href="favicon-32.png" sizes="32x32" type="image/png">
		<link rel="icon" href="favicon-48.png" sizes="48x48" type="image/png">
		<link rel="icon" href="favicon-62.png" sizes="62x62" type="image/png">
		<link rel="icon" href="favicon-192.png" sizes="192x192" type="image/png">
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KZ3MRP');</script>
		<!-- End Google Tag Manager -->
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '1799701040251802', {
		em: 'insert_email_variable,'
		});
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=1799701040251802&ev=PageView&noscript=1"
		/></noscript>
		<!-- DO NOT MODIFY -->
		<!-- End Facebook Pixel Code -->
	</head>
	hello!
	<body <?php body_class(); ?>>
		<div id="fb-root"></div>
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '175437896275464',
		      xfbml      : true,
		      version    : 'v2.8'
		    });
		    FB.AppEvents.logPageView();
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KZ3MRP"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<div id="request-callback" class="modal modal--small" data-request="request-callback">
			<div class="request-callback__bg" data-request-close="request-callback"></div>
			<div class="request-callback__inner">
				<div class="request-callback__header">
					<h4>If you would like to receive a callback from our advisors, please fill out the form below.</h4>
					<a class="modal__close" data-request-close="request-callback" href="#">
			          <i class="fa fa-times" aria-hidden="true"></i>
			        </a>
				</div>

				<form class="form form__validation form--custom" action="/scripts/call_api.php" method="POST">
					<div class="form__wrapper">
						<fieldset>
							<label>Full name</label>
							<span class="input__wrap">
								<input type="text" id="name" class="input__field" placeholder="What's your full name?" name="full-name" required>
							</span>
						</fieldset>
						<fieldset>
							<label>Email address</label>
							<span class="input__wrap">
								<input type="email" id="email" class="input__field" placeholder="Your email address..." name="email" required>
							</span>
						</fieldset>
						<fieldset>
							<label>Phone</label>
							<span class="input__wrap">
								<input type="tel" id="phone" class="input__field input__phone" placeholder="Best number to contact you on..." name="phone" required>
							</span>
						</fieldset>
						<fieldset>
							<label>Which product are you interested in?</label>
							<span class="input__wrap input__select__wrap">
								<select name="product-select" class="input__select" required>
									<option value="Wills">Wills</option>
									<option value="Funeral Plans">Funeral Plans</option>
									<option value="Estate Administration">Estate Administration</option>
									<option value="Other">Other</option>
								</select>
							</span>
						</fieldset>
						<span class="submit">
							<button class="button button--yellow button--request form__submit" name="submit">Request a callback <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
						</span>										
					</div>
					<div id="form-messages"></div>
				 </form>
				 <h5><a class="modal__close--bottom" data-request-close="request-callback">Close</a></h5>
			</div>
		</div>

		<?php if(is_page('funeral-plans') ) : ?>

			<?php $deposit = get_field('deposit'); ?>

			<div class="modal modal--small" data-popup="third-fees">
				<div class="third-fees__bg" data-fees-close="third-fees"></div>
				<div class="third-fees__inner">
					<div class="third-fees__header">
						<h4>What are third party fees?</h4>
						<a class="modal__close" data-fees-close="third-fees" href="#">
			          		<i class="fa fa-times" aria-hidden="true"></i>
			        	</a>
					</div>
					<div class="third-fees__content">
							<ul>
					          <li><img class="ret" src="/wp-content/uploads/2017/03/fp-care@2x.png" width="50" alt="a vector of a hand supporting a falling man"><p>Doctor's Fees</p></li>
					          <li><img class="ret" src="/wp-content/uploads/2017/03/fp-coffin@2x.png" width="50" alt="a vector of a black coffin with white hinges"><p>Cremation or Burial Fees</p></li>
					          <li><img class="ret" src="/wp-content/uploads/2017/03/fp-hearse@2x.png" width="50" alt="a vector of a black hearse driving to the right of the screen"><p>Minister's fees<small>(for service at crematorium)</small></p></li>
					        </ul>

					        <p>With the exception of Practical, all Damsons Funeral Plans contain a 3rd party fee allowance of <strong>£1200**</strong>.</p>
					        <p><span class="green">Included as standard with Simplicty, Essential and Plus plans.</span></p>
					</div>
				</div>
			</div>

			<div class="modal" data-popup="plus-plan" data-full-price="4195">
				<div class="modal__outer modal__fixedbg" data-popup-close="plus-plan"></div>
				<div class="modal__contain">
					<header class="modal__head">
						<a class="modal__close" data-popup-close="plus-plan" href=""><i class="fa fa-times" aria-hidden="true"></i></a>
					</header>
					<div class="modal__content modal__plan">
						<h2>Plus Funeral Plan</h2>

						<div class="plan__summary">
						<p>Our Plus funeral plan is our most comprehensive package, including two limousines, a high quality coffin and a full list of floral tributes. The Plus package caters for larger, busier ceremonies, making it the ideal choice for those with particularly wide circles of friends and large families.</p>
						</div>

						<div class="plan__footer">
							<div class="plan__price">
								<span>from</span>
								<strong>£49.56</strong>
								<span>per month</span>
								<span><small>(+ £<?php echo $deposit; ?> initial deposit)</small></span>
							</div>
							<div class="plan__rating">
								<span><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>
							</div>
						</div>

						<div class="plan__extra">
							<div class="col">
								<div class="col__wrapper col__nowrap">
									<div class="col7">
										<section>
										<h4>What's included in this plan?</h4>
										<ul class="ticks">
											<li>Attending to all necessary funeral arrangements</li>
											<li>Funeral director's professional services</li>
											<li>Removal of the deceased to funeral directors premises within 25 miles, normal working hours</li>
											<li>Preparation and care of the deceased prior to funeral</li>
											<li>Use of the chapel of rest for viewing arrangements</li>
											<li>High quality coffin</li>
											<li>Attendance of the conductor and bearers</li>
											<li>Hearse &amp; 2 Limousine</li>
											<li>All funeral staff required to conduct the service</li>
											<li>Full list of floral tributes</li>
											<li>Cremation, or Interment, Doctor and Minister costs**</li>
										</ul>
										</section>
										
										<section>
										<h4>Bespoke funeral plan</h4>
										<p>Any extras can be discussed upon enquiry, and if necessary right up until the time of need with your allocated funeral director. Please note, if any of your requests incur additional costs which are not included in your plan, either you or your loved ones will need to arrange for these to be paid.</p>
										
											<div class="bespoke__table">
												<table cellpadding="0" cellspacing="0" border="0">
													<tbody>
														<tr>
															<td>Wicker baskets</td>
															<td>£300</td>
														</tr>
														<tr>
															<td>Extra limousine</td>
															<td>£200 - £300</td>
														</tr>
														<tr>
															<td>Organist</td>
															<td>£60</td>
														</tr>
														<tr>
															<td>Suzuki bike for coffin</td>
															<td>£998</td>
														</tr>
														<tr>
															<td>Harley bike for coffin</td>
															<td>£1,018</td>
														</tr>
														<tr>
															<td>Trike</td>
															<td>£1,018</td>
														</tr>
														<tr>
															<td>Obituary notice</td>
															<td>£50 - £150</td>
														</tr>
														<tr>
															<td>Horse-drawn carraige (x2 of x4 horses)</td>
															<td>£1000 - £1500</td>
														</tr>
														<tr>
															<td>Embalming</td>
															<td>£100</td>
														</tr>
														<tr>
															<td>Removal outside of office hours</td>
															<td>£150 - £250</td>
														</tr>
														<tr>
															<td>White doves</td>
															<td>£125</td>
														</tr>
														<tr>
															<td>Doctor's fees (Practical plan only)</td>
															<td>£164</td>
														</tr>
														<tr>
															<td>Extra minister to conduct church service</td>
															<td>£200 - £250</td>
														</tr>
													</tbody>
												</table>
											</div>

											<p>To personalise your plan just call <strong>0800 088 4670</strong>. We’ll be happy to discuss an arrangement that works for you.</p>
										</section>
									</div>
									<div class="col5 margin1">
										<section class="plan__side plan__side--fill">
											<h5>Includes 3rd Party changes</h5>
												<ul class="icons">
													<li><img src="/wp-content/uploads/2017/03/fp-care@2x.png" width="101"> Doctor's fees</li>
													<li><img src="/wp-content/uploads/2017/03/fp-coffin@2x.png" width="100"> Cremation or burial fees</li>
													<li><img src="/wp-content/uploads/2017/03/fp-hearse@2x.png" width="132"> Minister's fees<br>(for service at crematorium)</li>
												</ul>
											<p>With the exception of Practical, all Damsons Funeral Plans contain a 3rd party fee allowance of £1200.**</p>
										</section>

										<section class="plan__side">
											<h5>This plan is available at:</h5>
												<div class="plan__side--fill plan__full__price">
													<h3 class="nomargin"></h3>
													<span>One-off payment</span>
													<img class="absolute" src="/wp-content/uploads/2017/03/payfull-coins@2x.png" width="48">
												</div>
										</section>

										<h5 class="or">
											<span>or</span>
										</h5>

										<section class="plan__side plan__calculator">
											<h5>Pay monthly from:</h5>
											<img class="deposit" src="/wp-content/uploads/2017/03/deposit-callout@2x.png" width="79">
												<div class="plan__side--fill">
													<div class="plan__curamount">
														<h3 class="nomargin"></h3>
														<span>per month</span>
														<img class="absolute" src="/wp-content/uploads/2017/03/installment-coins@2x.png" width="115">
													</div>
												</div>
												<div class="plan__calculator--duration">
													<ul>
														<li class="active" data-duration="12">12 months</li>
														<li data-duration="24">24 months</li>
														<li data-duration="36">36 months</li>
														<li data-duration="60">60 months</li>
														<li data-duration="120">120 months</li>
													</ul>
												</div>
												<div class="plan__results">
													<ul>
														<li>
															<span class="title">Deposit</span>
															<span class="number">£<?php echo $deposit; ?></span></span>
														</li>
														<li>
															<span class="title">Interest*</span>
															<span class="number total__interest">£0</span>
														</li>
														<li>
															<span class="title"><span class="duration__number"></span><br><small>by standing order</small></span>
															<span class="number total__month"></span>
														</li>
													</ul>	
												</div>
										</section>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>
				<div class="modal__end"><a href="" data-popup-close="plus-plan">Close this window</a></div>
			</div>

			<div class="modal" data-popup="essential-plan" data-full-price="3895">
				<div class="modal__outer modal__fixedbg" data-popup-close="essential-plan"></div>
				<div class="modal__contain">
					<header class="modal__head">
						<a class="modal__close" data-popup-close="essential-plan" href=""><i class="fa fa-times" aria-hidden="true"></i></a>
					</header>
					<div class="modal__content modal__plan">
						<h2>Essential Funeral Plan</h2>

						<div class="plan__summary">
						<p>The Essential Plan is the most popular in our range. Including a standard coffin, a limousine to transport your loved ones to the ceremony, four bearers and a hearse, this is the perfect choice for those who desire a finer-looking funeral.</p>
						</div>

						<div class="plan__footer">
							<div class="plan__price">
								<span>from</span>
								<strong>£45.89</strong>
								<span>per month</span>
								<span><small>(+ £<?php echo $deposit; ?> initial deposit)</small></span>
							</div>
							<div class="plan__rating">
								<span><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>
							</div>
						</div>

						<div class="plan__extra">
							<div class="col">
								<div class="col__wrapper col__nowrap">
									<div class="col7">
										<section>
										<h4>What's included in this plan?</h4>
										<ul class="ticks">
											<li>Attending to all necessary funeral arrangements</li>
											<li>Funeral director's professional services</li>
											<li>Removal of the deceased to funeral directors premises within 25 miles, normal working hours</li>
											<li>Preparation and care of the deceased prior to funeral</li>
											<li>Use of the chapel of rest for viewing arrangements</li>
											<li>Standard coffin</li>
											<li>Attendance of the conductor and bearers</li>
											<li>Hearse &amp; 1 Limousine</li>
											<li>All funeral staff required to conduct the service</li>
											<li>Full list of floral tributes</li>
											<li>Cremation, or Interment, Doctor and Minister costs**</li>
										</ul>
										</section>
										
										<section>
										<h4>Bespoke funeral plan</h4>
										<p>Any extras can be discussed upon enquiry, and if necessary right up until the time of need with your allocated funeral director. Please note, if any of your requests incur additional costs which are not included in your plan, either you or your loved ones will need to arrange for these to be paid.</p>
										
											<div class="bespoke__table">
												<table cellpadding="0" cellspacing="0" border="0">
													<tbody>
														<tr>
															<td>Wicker baskets</td>
															<td>£300</td>
														</tr>
														<tr>
															<td>Extra limousine</td>
															<td>£200 - £300</td>
														</tr>
														<tr>
															<td>Organist</td>
															<td>£60</td>
														</tr>
														<tr>
															<td>Suzuki bike for coffin</td>
															<td>£998</td>
														</tr>
														<tr>
															<td>Harley bike for coffin</td>
															<td>£1,018</td>
														</tr>
														<tr>
															<td>Trike</td>
															<td>£1,018</td>
														</tr>
														<tr>
															<td>Obituary notice</td>
															<td>£50 - £150</td>
														</tr>
														<tr>
															<td>Horse-drawn carraige (x2 of x4 horses)</td>
															<td>£1000 - £1500</td>
														</tr>
														<tr>
															<td>Embalming</td>
															<td>£100</td>
														</tr>
														<tr>
															<td>Removal outside of office hours</td>
															<td>£150 - £250</td>
														</tr>
														<tr>
															<td>White doves</td>
															<td>£125</td>
														</tr>
														<tr>
															<td>Doctor's fees (Practical plan only)</td>
															<td>£164</td>
														</tr>
														<tr>
															<td>Extra minister to conduct church service</td>
															<td>£200 - £250</td>
														</tr>
													</tbody>
												</table>
											</div>

											<p>To personalise your plan just call <strong>0800 088 4670</strong>. We’ll be happy to discuss an arrangement that works for you.</p>
										</section>
									</div>
									<div class="col5 margin1">
										<section class="plan__side plan__side--fill">
											<h5>Includes 3rd Party changes</h5>
												<ul class="icons">
													<li><img src="/wp-content/uploads/2017/03/fp-care@2x.png" width="101"> Doctor's fees</li>
													<li><img src="/wp-content/uploads/2017/03/fp-coffin@2x.png" width="100"> Cremation or burial fees</li>
													<li><img src="/wp-content/uploads/2017/03/fp-hearse@2x.png" width="132"> Minister's fees<br>(for service at crematorium)</li>
												</ul>
											<p>With the exception of Practical, all Damsons Funeral Plans contain a 3rd party fee allowance of £1200.**</p>
										</section>

										<section class="plan__side">
											<h5>This plan is available at:</h5>
												<div class="plan__side--fill plan__full__price">
													<h3 class="nomargin"></h3>
													<span>One-off payment</span>
													<img class="absolute" src="/wp-content/uploads/2017/03/payfull-coins@2x.png" width="48">
												</div>
										</section>

										<h5 class="or">
											<span>or</span>
										</h5>

										<section class="plan__side plan__calculator">
											<h5>Pay monthly from:</h5>
											<img class="deposit" src="/wp-content/uploads/2017/03/deposit-callout@2x.png" width="79">
												<div class="plan__side--fill">
													<div class="plan__curamount">
														<h3 class="nomargin"></h3>
														<span>per month</span>
														<img class="absolute" src="/wp-content/uploads/2017/03/installment-coins@2x.png" width="115">
													</div>
												</div>
												<div class="plan__calculator--duration">
													<ul>
														<li class="active" data-duration="12">12 months</li>
														<li data-duration="24">24 months</li>
														<li data-duration="36">36 months</li>
														<li data-duration="60">60 months</li>
														<li data-duration="120">120 months</li>
													</ul>
												</div>
												<div class="plan__results">
													<ul>
														<li>
															<span class="title">Deposit</span>
															<span class="number">£<?php echo $deposit; ?></span>
														</li>
														<li>
															<span class="title">Interest*</span>
															<span class="number total__interest">£0</span>
														</li>
														<li>
															<span class="title"><span class="duration__number"></span><br><small>by standing order</small></span>
															<span class="number total__month"></span>
														</li>
													</ul>	
												</div>
										</section>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>
				<div class="modal__end"><a href="" data-popup-close="essential-plan">Close this window</a></div>
			</div>

			<div class="modal" data-popup="simplicity-plan" data-full-price="3495">
				<div class="modal__outer modal__fixedbg" data-popup-close="simplicity-plan"></div>
				<div class="modal__contain">
					<header class="modal__head">
						<a class="modal__close" data-popup-close="simplicity-plan" href=""><i class="fa fa-times" aria-hidden="true"></i></a>
					</header>
					<div class="modal__content modal__plan">
						<h2>Simplicity Funeral Plan</h2>

						<div class="plan__summary">
						<p>Our Simplicity plan is an elegant step up from Practical for a little more money. This pre-paid package includes the 3rd party charges of doctors, ministers and burial/cremation fees, as well as a basic coffin, hearse, two bearers and care of the deceased.</p>
						</div>

						<div class="plan__footer">
							<div class="plan__price">
								<span>from</span>
								<strong>£40.99</strong>
								<span>per month</span>
								<span><small>(+ £<?php echo $deposit; ?> initial deposit)</small></span>
							</div>
							<div class="plan__rating">
								<span><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>
							</div>
						</div>

						<div class="plan__extra">
							<div class="col">
								<div class="col__wrapper col__nowrap">
									<div class="col7">
										<section>
										<h4>What's included in this plan?</h4>
										<ul class="ticks">
											<li>Attending to all necessary funeral arrangements</li>
											<li>Funeral director's professional services</li>
											<li>Removal of the deceased to funeral directors premises within 25 miles, normal working hours</li>
											<li>Preparation and care of the deceased prior to funeral</li>
											<li>Use of the chapel of rest for viewing arrangements</li>
											<li>Basic coffin</li>
											<li>Attendance of the conductor and bearers</li>
											<li>Hearse</li>
											<li>All funeral staff required to conduct the service</li>
											<li>Full list of floral tributes</li>
											<li>Cremation, or Interment, Doctor and Minister costs**</li>
										</ul>
										</section>
										
										<section>
										<h4>Bespoke funeral plan</h4>
										<p>Any extras can be discussed upon enquiry, and if necessary right up until the time of need with your allocated funeral director. Please note, if any of your requests incur additional costs which are not included in your plan, either you or your loved ones will need to arrange for these to be paid.</p>
										
											<div class="bespoke__table">
												<table cellpadding="0" cellspacing="0" border="0">
													<tbody>
														<tr>
															<td>Wicker baskets</td>
															<td>£300</td>
														</tr>
														<tr>
															<td>Extra limousine</td>
															<td>£200 - £300</td>
														</tr>
														<tr>
															<td>Organist</td>
															<td>£60</td>
														</tr>
														<tr>
															<td>Suzuki bike for coffin</td>
															<td>£998</td>
														</tr>
														<tr>
															<td>Harley bike for coffin</td>
															<td>£1,018</td>
														</tr>
														<tr>
															<td>Trike</td>
															<td>£1,018</td>
														</tr>
														<tr>
															<td>Obituary notice</td>
															<td>£50 - £150</td>
														</tr>
														<tr>
															<td>Horse-drawn carraige (x2 of x4 horses)</td>
															<td>£1000 - £1500</td>
														</tr>
														<tr>
															<td>Embalming</td>
															<td>£100</td>
														</tr>
														<tr>
															<td>Removal outside of office hours</td>
															<td>£150 - £250</td>
														</tr>
														<tr>
															<td>White doves</td>
															<td>£125</td>
														</tr>
														<tr>
															<td>Doctor's fees (Practical plan only)</td>
															<td>£164</td>
														</tr>
														<tr>
															<td>Extra minister to conduct church service</td>
															<td>£200 - £250</td>
														</tr>
													</tbody>
												</table>
											</div>

											<p>To personalise your plan just call <strong>0800 088 4670</strong>. We’ll be happy to discuss an arrangement that works for you.</p>
										</section>
									</div>
									<div class="col5 margin1">
										<section class="plan__side plan__side--fill">
											<h5>Includes 3rd Party changes</h5>
												<ul class="icons">
													<li><img src="/wp-content/uploads/2017/03/fp-care@2x.png" width="101"> Doctor's fees</li>
													<li><img src="/wp-content/uploads/2017/03/fp-coffin@2x.png" width="100"> Cremation or burial fees</li>
													<li><img src="/wp-content/uploads/2017/03/fp-hearse@2x.png" width="132"> Minister's fees<br>(for service at crematorium)</li>
												</ul>
											<p>With the exception of Practical, all Damsons Funeral Plans contain a 3rd party fee allowance of £1200.**</p>
										</section>

										<section class="plan__side">
											<h5>This plan is available at:</h5>
												<div class="plan__side--fill plan__full__price">
													<h3 class="nomargin"></h3>
													<span>One-off payment</span>
													<img class="absolute" src="/wp-content/uploads/2017/03/payfull-coins@2x.png" width="48">
												</div>
										</section>

										<h5 class="or">
											<span>or</span>
										</h5>

										<section class="plan__side plan__calculator">
											<h5>Pay monthly from:</h5>
											<img class="deposit" src="/wp-content/uploads/2017/03/deposit-callout@2x.png" width="79">
												<div class="plan__side--fill">
													<div class="plan__curamount">
														<h3 class="nomargin"></h3>
														<span>per month</span>
														<img class="absolute" src="/wp-content/uploads/2017/03/installment-coins@2x.png" width="115">
													</div>
												</div>
												<div class="plan__calculator--duration">
													<ul>
														<li class="active" data-duration="12">12 months</li>
														<li data-duration="24">24 months</li>
														<li data-duration="36">36 months</li>
														<li data-duration="60">60 months</li>
														<li data-duration="120">120 months</li>
													</ul>
												</div>
												<div class="plan__results">
													<ul>
														<li>
															<span class="title">Deposit</span>
															<span class="number">£<?php echo $deposit; ?></span>
														</li>
														<li>
															<span class="title">Interest*</span>
															<span class="number total__interest">£0</span>
														</li>
														<li>
															<span class="title"><span class="duration__number"></span><br><small>by standing order</small></span>
															<span class="number total__month"></span>
														</li>
													</ul>	
												</div>
										</section>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>
				<div class="modal__end"><a href="" data-popup-close="simplicity-plan">Close this window</a></div>
			</div>

			<div class="modal" data-popup="practical-plan" data-full-price="2495">
				<div class="modal__outer modal__fixedbg" data-popup-close="practical-plan"></div>
				<div class="modal__contain">
					<header class="modal__head">
						<a class="modal__close" data-popup-close="practical-plan" href=""><i class="fa fa-times" aria-hidden="true"></i></a>
					</header>
					<div class="modal__content modal__plan">
						<h2>Practical Funeral Plan</h2>

						<div class="plan__summary">
						<p>The Practical Plan is our most affordable option. With Funeral Director fees/services, a basic coffin, hearse and two bearers included, the Practical Plan is perfect for those with restricted budgets and a desire for ease.</p>
						</div>

						<div class="plan__footer">
							<div class="plan__price">
								<span>from</span>
								<strong>£28.74</strong>
								<span>per month</span>
								<span><small>(+ £<?php echo $deposit; ?> initial deposit)</small></span>
							</div>
							<div class="plan__rating">
								<span><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>
							</div>
						</div>

						<div class="plan__extra">
							<div class="col">
								<div class="col__wrapper col__nowrap">
									<div class="col7">
										<section>
										<h4>What's included in this plan?</h4>
										<ul class="ticks">
											<li>Attending to all necessary funeral arrangements</li>
											<li>Funeral director's professional services</li>
											<li>Removal of the deceased to funeral directors premises within 25 miles, normal working hours</li>
											<li>Preparation and care of the deceased prior to funeral</li>
											<li>Use of the chapel of rest for viewing arrangements</li>
											<li>Basic coffin</li>
											<li>Attendance of the conductor and bearers</li>
											<li>Hearse</li>
											<li>All funeral staff required to conduct the service</li>
											<li>Full list of floral tributes</li>
											<li>Cremation, or Interment, Doctor and Minister costs**</li>
										</ul>
										</section>
										
										<section>
										<h4>Bespoke funeral plan</h4>
										<p>Any extras can be discussed upon enquiry, and if necessary right up until the time of need with your allocated funeral director. Please note, if any of your requests incur additional costs which are not included in your plan, either you or your loved ones will need to arrange for these to be paid.</p>
										
											<div class="bespoke__table">
												<table cellpadding="0" cellspacing="0" border="0">
													<tbody>
														<tr>
															<td>Wicker baskets</td>
															<td>£300</td>
														</tr>
														<tr>
															<td>Extra limousine</td>
															<td>£200 - £300</td>
														</tr>
														<tr>
															<td>Organist</td>
															<td>£60</td>
														</tr>
														<tr>
															<td>Suzuki bike for coffin</td>
															<td>£998</td>
														</tr>
														<tr>
															<td>Harley bike for coffin</td>
															<td>£1,018</td>
														</tr>
														<tr>
															<td>Trike</td>
															<td>£1,018</td>
														</tr>
														<tr>
															<td>Obituary notice</td>
															<td>£50 - £150</td>
														</tr>
														<tr>
															<td>Horse-drawn carraige (x2 of x4 horses)</td>
															<td>£1000 - £1500</td>
														</tr>
														<tr>
															<td>Embalming</td>
															<td>£100</td>
														</tr>
														<tr>
															<td>Removal outside of office hours</td>
															<td>£150 - £250</td>
														</tr>
														<tr>
															<td>White doves</td>
															<td>£125</td>
														</tr>
														<tr>
															<td>Doctor's fees (Practical plan only)</td>
															<td>£164</td>
														</tr>
														<tr>
															<td>Extra minister to conduct church service</td>
															<td>£200 - £250</td>
														</tr>
													</tbody>
												</table>
											</div>

											<p>To personalise your plan just call <strong>0800 088 4670</strong>. We’ll be happy to discuss an arrangement that works for you.</p>
										</section>
									</div>
									<div class="col5 margin1">
										<section class="plan__side">
											<h5>This plan is available at:</h5>
												<div class="plan__side--fill plan__full__price">
													<h3 class="nomargin"></h3>
													<span>One-off payment</span>
													<img class="absolute" src="/wp-content/uploads/2017/03/payfull-coins@2x.png" width="48">
												</div>
										</section>

										<h5 class="or">
											<span>or</span>
										</h5>

										<section class="plan__side plan__calculator">
											<h5>Pay monthly from:</h5>
											<img class="deposit" src="/wp-content/uploads/2017/03/deposit-callout@2x.png" width="79">
												<div class="plan__side--fill">
													<div class="plan__curamount">
														<h3 class="nomargin"></h3>
														<span>per month</span>
														<img class="absolute" src="/wp-content/uploads/2017/03/installment-coins@2x.png" width="115">
													</div>
												</div>
												<div class="plan__calculator--duration">
													<ul>
														<li class="active" data-duration="12">12 months</li>
														<li data-duration="24">24 months</li>
														<li data-duration="36">36 months</li>
														<li data-duration="60">60 months</li>
														<li data-duration="120">120 months</li>
													</ul>
												</div>
												<div class="plan__results">
													<ul>
														<li>
															<span class="title">Deposit</span>
															<span class="number">£<?php echo $deposit; ?></span>
														</li>
														<li>
															<span class="title">Interest*</span>
															<span class="number total__interest">£0</span>
														</li>
														<li>
															<span class="title"><span class="duration__number"></span><br><small>by standing order</small></span>
															<span class="number total__month"></span>
														</li>
													</ul>	
												</div>
										</section>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>
				<div class="modal__end"><a href="" data-popup-close="practical-plan">Close this window</a></div>
			</div>

		<?php endif; ?>

		<header class="top">
			<div class="contain contain--top">
				<div class="top__bar">
					<div class="top__logo relative"><a href="<?php echo get_home_url(); ?>" class="abso__link abso__link--logo"></a><img src="<?php echo get_template_directory_uri(); ?>/assets/img/damsons__logo@2x.png" width="260px"></div>
					<div class="top__hamburger">
						<div class="hamburger__wrapper">
							<a class="hamburger__link"></a>
							<div class="line"></div>
							<div class="line"></div>
							<div class="line"></div>
						</div>
						<p>Menu</p>
					</div>
					<div class="top__box">
						<div class="box__wrapper">
							<ul>
								<li>
									<?php if(is_page('estate-administration') ) : ?>
									<a class="ea" href="mailto:info@damsonsestateadministration.co.uk">info@damsonsestateadministration.co.uk</a>
									<?php else : ?>
									<a href="mailto:info@damsonsfutureplanning.co.uk">info@damsonsfutureplanning.co.uk</a>
									<? endif; ?>
								</li>
								<li>
									<?php if(is_page('estate-administration') ) : ?>
									<span class="box__number">0800 088 4659</span>
									<?php else : ?>
									<span class="box__number">0800 088 4670</span>
									<? endif; ?>
								</li>
								<li>
									<button class="button button--yellow button--topbox">More details <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
								</li>
							</ul>
						</div>
						<div class="box__loginarea">
							<form class="form" action="" method="POST">
								<span>
									<label for="username">Username</label>
									<span class="input input-span">
										<input type="text" id="username" class="input__field" placeholder="Enter your username" name="username" required>
									</span>
								</span>
								<span>
									<label for="password">Password</label>
									<span class="input input-span">
										<input type="password" id="password" class="input__field" placeholder="Enter your password" name="password" required>
									</span>
								</span>
								<span class="input input--submit input--login">
									<input type="submit" value="Sign In" class="input__submit" name="submit">
								</span>	
							</form>
							<div class="loginarea__close">
								<i class="fa fa-lg fa-times" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="top__menu">
					<div class="contain">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</div>
				</div>
			</div>
			<div class="top__mobilebar">
				<div class="mobile__search" data-bar="search">
					<i class="fa fa-lg fa-fw fa-search" aria-hidden="true"></i><p>Search</p>
					<div class="mobile__search--close" data-close="search"><i class="fa fa-times" aria-hidden="true"></i><p>Close</p></div>
				</div>
				<div class="mobile__contact" data-bar="contact">
					<i class="fa fa-2x fa-fw fa-mobile" aria-hidden="true"></i><p>Contact</p>
					<div class="mobile__contact--close" data-close="contact"><i class="fa fa-times" aria-hidden="true"></i><p>Close</p></div>
				</div>
			</div>
			<div class="top__mobile-menu">
				<div class="contain">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'mobile__menu' ) ); ?>
					<button class="button button--yellow button--topbox">My account <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
				</div>
			</div>
			<div class="top__mobile-search" data-tab="search">
				<div class="contain">
					<?php get_search_form(); ?>
				</div>
			</div>
			<div class="top__mobile-contact" data-tab="contact">
				<div class="contain">
					<?php if(is_page('estate-administration') ) : ?>
						<span class="mobile-contact__number"><i class="fa fa-fw fa-mobile" aria-hidden="true"></i> 0800 088 4659</span>
					<?php else : ?>
						<span class="mobile-contact__number"><i class="fa fa-fw fa-mobile" aria-hidden="true"></i> 0800 088 4670</span>
					<? endif; ?>

					<button class="button button--yellow button--request">Request a callback <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
				</div>
			</div>
			<?php if(is_page('home') ) : ?>
			<div class="top__home">
				<div class="contain relative">
					<div class="home__image"><img src="<?php the_field('home_hero_image'); ?>"></div>
					<div class="home__content">
						<span>
							<?php the_field('home_header_content'); ?>
						</span>
					</div>
					<?php if ( is_active_sidebar( 'home-cards' ) ): ?>
					<div class="home__promo">
						<div class="home__promo__contain">
					    	<?php dynamic_sidebar( 'home-cards' ); ?>
				        </div>
				        <img class="home__promo__callout" src="/wp-content/uploads/2017/03/freewill-callout@2x.png" width="127" alt="Write your will with damsons for free">
				    </div>
				    <?php endif; ?>
				</div>
			</div>
			<?php else : ?>
			<div class="top__breadcrumbs">
				<div class="contain">
					<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div id="breadcrumbs">','</div>');
					} ?>
				</div>
			</div>
			<?php endif; ?>
		</header>
