<?php
/**
 * The template for displaying the footer.
 */
?>

<footer class="footer footer--main">
	<div class="footer__contain">
		<div class="footer-item margin0">
			<div class="textwidget">
				<ul>
					<li><img src="/wp-content/themes/dv4/assets/img/damsons__logo--white.png"></li>
					<li><div class="social-media">
							<a href="https://www.facebook.com/DamsonsFP/?fref=ts" target="_blank"><i class="fa fa-fw fa-lg fa-facebook-official" aria-hidden="true"></i></a>
							<a href="https://twitter.com/Damsonsfp" target="_blank"><i class="fa fa-fw fa-lg fa-twitter" aria-hidden="true"></i></a>
							<a href="https://uk.pinterest.com/damsonsfp/" target="_blank"><i class="fa fa-fw fa-lg fa-pinterest" aria-hidden="true"></i></a>
						</div>
					</li>
					<?php if(is_page('estate-administration') ) : ?>
					<li><a href="mailto:info@damsonsestateadministration.co.uk">info@damsonsestateadministration.co.uk</a></li>
					<?php else: ?>
					<li><a href="mailto:info@damsonsfutureplanning.co.uk">info@damsonsfutureplanning.co.uk</a></li>
					<?php endif; ?>
					<?php if(is_page('estate-administration') ) : ?>
					<li><span class="footer__number"><i class="fa fa-fw fa-phone" aria-hidden="true"></i> 0800 088 4659</span></li>
					<?php else: ?>
					<li><span class="footer__number"><i class="fa fa-fw fa-phone" aria-hidden="true"></i> 0800 088 4670</span></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="footer-item margin0">			
			<div class="textwidget">
				<div class="footer__copyright">
					<?php if(is_page( array('estate-administration', 'dea-terms-conditions') ) ) : ?>
					&copy; <script>document.write(new Date().getFullYear())</script> Damsons Estate Administration | <a href="/dea-terms-conditions/">Terms and Conditions</a> | <a href="/privacy/">Privacy Policy</a> | <a href="/complaints/">Feedback</a> | <a href="/cookies/">Cookies</a> | <a href="/sitemap.xml" target="_blank">Sitemap</a> | <a href="/contact/">Contact Us</a>
					<?php elseif (is_page( array('will-writing', 'will-writing-terms-conditions') ) ) : ?>
					&copy; <script>document.write(new Date().getFullYear())</script> Damsons Future Planning | <a href="/will-writing-terms-conditions/">Terms and Conditions</a> | <a href="/privacy/">Privacy Policy</a> | <a href="/complaints/">Feedback</a> | <a href="/cookies/">Cookies</a> | <a href="/sitemap.xml" target="_blank">Sitemap</a> | <a href="/contact/">Contact Us</a>
					<?php else : ?>
					&copy; <script>document.write(new Date().getFullYear())</script> Damsons Future Planning | <a href="/privacy/">Privacy Policy</a> | <a href="/complaints/">Feedback</a> | <a href="/cookies/">Cookies</a> | <a href="/sitemap.xml" target="_blank">Sitemap</a> | <a href="/contact/">Contact Us</a>
					<?php endif; ?>
				</div>
				<div class="footer__info">
					<?php if(is_page('estate-administration') ) : ?>
					<small>Damsons Estate Administration Limited is registered in England and Wales with company registration number 08047449. Its registered office is at Adamson House, Pomona Strand, Old Trafford M16 0TT ICO Reg. No. Z3293537</small>
					<?php else : ?>
					<small>Damsons Future Planning Limited is registered in England and Wales with company registration number 07403561. Its registered office is at Adamson House, Pomona Strand, Old Trafford M16 0TT ICO Reg. No. Z3173156 VAT Reg. No. 156668569</small>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="footer-item margin0">
			<div class="textwidget">
				<div class="footer__offer">
					<img src="/wp-content/themes/dv4/assets/img/damsons__offer.png">
					<div class="footer__offer--content">
						<strong>Make a will and protect your future. Free of charge!</strong>
						<p>Normally £49.99</p>
						<a href="/willapp/">Damsons Will Builder</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
