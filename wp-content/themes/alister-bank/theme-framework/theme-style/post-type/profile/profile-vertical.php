<?php
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version		1.0.0
 * 
 * Profile Vertical Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_profile_social = get_post_meta(get_the_ID(), 'cmsmasters_profile_social', true);

$cmsmasters_profile_subtitle = get_post_meta(get_the_ID(), 'cmsmasters_profile_subtitle', true);

?>
<!--_________________________ Start Profile Vertical Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_profile_vertical'); ?>>
	<div class="profile_outer">
	<?php
	if (has_post_thumbnail()) {
		alister_bank_thumb(get_the_ID(), 'cmsmasters-square-thumb', true, false, false, false, false);
	} else {
		echo '<div class="cmsmasters_img_wrap no_image">' . 
			'<span>' . 
				'<span class="cmsmasters_theme_icon_image"></span>' . 
			'</span>' . 
		'</div>';
	}
	
	
	echo '<div class="profile_inner">';
		
		alister_bank_profile_heading(get_the_ID(), 'h3', $cmsmasters_profile_subtitle, 'h6');
		
		alister_bank_profile_exc_cont();
		
		alister_bank_profile_social_icons($cmsmasters_profile_social, $profile_id);
		
	echo '</div>';
	?>
	</div>
</article>
<!--_________________________ Finish Profile Vertical Article _________________________ -->

