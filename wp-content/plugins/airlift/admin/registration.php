<div class="malcare9">
	<section id="malcare-1">
		<div class="malcare-logo-img text-center">
			<img height="70" width="240" src="<?php echo esc_url(plugins_url("/../img/airlift-logo.svg", __FILE__)); ?>" alt="">
		</div>
		<div class="container-malcare" id="">
			<div class="row">
				<div class="col-xs-12 malcare-1-container">
					<h2 class="text-center heading">Signup to improve performance of your website with AirLift</h2>
					<?php $this->showErrors(); ?>
					<div class="search-container text-center ">
						<form action="<?php echo esc_url($this->bvinfo->appUrl()); ?>/plugin/signup" style="padding-top:10px; margin: 0px;" onsubmit="document.getElementById('get-started').disabled = true;"  method="post" name="signup">
							<input type='hidden' name='bvsrc' value='wpplugin' />
							<input type='hidden' name='origin' value='airlift' />
							<?php echo $this->siteInfoTags(); ?>
							<input type="text" placeholder="Enter your email address to continue" id="email" name="email" class="search" required>
							<h5 class="check-box-text mt-2"><input type="checkbox" class="check-box" name="consent" value="1">
							<label>I agree to AirLift <a href="https://airlift.net/tos/" target="_blank" rel="noopener noreferrer">Terms of Service</a> and <a href="https://airlift.net/privacy/" target="_blank" rel="noopener noreferrer">Privacy Policy</a></label></h5>
							<button id="get-started" type="submit" class="e-mail-button"><span class="text-white">Submit</span></button>		
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>