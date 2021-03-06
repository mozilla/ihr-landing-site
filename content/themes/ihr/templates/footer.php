<footer class="content-info">

<div class="newsletter-signup" id="newsletter-signup">
<div class="wrap">
	<div class="container">

		<div class="heading">
			<h3><?php _e('Keep me updated','ihr'); ?></h3>

			<p><?php _e('Receive email about this project and Mozilla.','ihr'); ?></p>
		</div>


		<form id="newsletter_form" class="signup-form" name="newsletter_form" action="https://www.mozilla.org/en-US/newsletter/" method="post">
			<input type="hidden" id="fmt" name="fmt" value="H">
			<input type="hidden" id="lang" name="lang" value="<?php echo ICL_LANGUAGE_CODE ?>">
			<input type="hidden" id="newsletters" name="newsletters" value="internet-health-report-group">

			<div id="newsletter_errors" class="newsletter_errors"></div>

			<div id="newsletter_email" class="form_group form_group_email">
				<label for="email" class="hidden-label">Email: </label>
				<input type="email" id="email" name="email" class="signup-form__email" required="required" placeholder="<?php _e('Email address','ihr'); ?>" size="30">
				

				<div id="newsletter_privacy" class="form_group form_group-agree">
					<label for="privacy">
					<input type="checkbox" id="privacy" name="privacy" class="signup-form__checkbox" required="">
					<div class="signup-form__checkbox-label"><?php _e('I’m okay with mozilla handling my info as explained in this <a href="https://www.mozilla.org/privacy/websites/">privacy notice</a>.','ihr'); ?>
					</div>
					</label>
				</div>


				<button id="newsletter_submit" type="submit" class="signup-form__btn" onclick="ga('send', 'event', 'Signup', 'Form Submitted', 'Internet Health Report')"><?php _e('Sign up','ihr'); ?></button>
			</div>


			<div>
			</div>

		</form>

		<p id="newsletter_thanks" class="signup-form__submission"><?php _e('Thanks for joining. Please check your inbox or your spam filter for an email confirmation from us.','ihr'); ?></p>



	</div>

</div>
</div>


<div class="footer-content">
<div class="wrap">
	<div class="container">

		<div class="link-list">

			<a href="mailto:internethealth@mozillafoundation.org"><span class="icon-mail"></span><?php _e('Contact','ihr'); ?></a>
			<a href="https://www.mozilla.org/foundation/licensing/website-content/"><span class="icon-cc"></span><?php _e('License','ihr'); ?></a>

			<a href="https://www.mozilla.org/about/governance/policies/participation/"><span class="icon-conduct"></span><?php _e('Community','ihr'); ?></a>
			<?php //<a href=""><span class="icon-conduct"></span>Code of Conduct</a> ?>
			<a href="https://www.mozilla.org/about/legal/terms/mozilla/"><span class="icon-legal"></span><?php _e('Legal','ihr'); ?></a>
			<a href="https://www.mozilla.org/privacy/websites/"><span class="icon-privacy"></span><?php _e('Privacy','ihr'); ?></a>
			<?php //<a href=""><span class="icon-cookies"></span>Cookies</a> ?>
			<a href="/feed/"><span class="icon-rss"></span><?php _e('RSS','ihr'); ?></a>

		</div>


		<a class="logo" href="http://mozilla.org">Mozilla.org</a>

		<div class="statement"><?php _e('We are a global non-profit dedicated to putting you in control of your online experience and shaping the future of the web for the public good. Visit us at <a href="http://mozilla.org">mozilla.org</a>','ihr'); ?>
		</div>

	</div>
</div>
</div>


</footer>


<div id="tablet-sized"></div>
<div id="mobile-sized"></div>