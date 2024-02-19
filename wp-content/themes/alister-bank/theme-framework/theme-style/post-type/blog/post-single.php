<?php
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version		1.1.6
 * 
 * Post Single Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = alister_bank_get_global_options();

$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);


list($cmsmasters_layout) = alister_bank_theme_page_layout_scheme();

if ($cmsmasters_layout == 'fullwidth') {
	$cmsmasters_image_thumb_size = 'cmsmasters-full-masonry-thumb';
} else {
	$cmsmasters_image_thumb_size = 'post-thumbnail';
}


$cmsmasters_post_format = get_post_format();


$cmsmasters_post_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_post_sharing_box', true);

$cmsmasters_post_author_box = get_post_meta(get_the_ID(), 'cmsmasters_post_author_box', true);

$cmsmasters_post_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_post_more_posts', true);

?>
<!--_________________________ Start Post Single Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_open_post'); ?>>
	<?php 
	if ($cmsmasters_option['alister-bank' . '_blog_post_cat']) {
		alister_bank_get_post_category(get_the_ID(), 'category', 'post');
	}
	
	
	if ($cmsmasters_post_title == 'true') {
		alister_bank_post_title_nolink(get_the_ID(), 'h2');
	}
	
	
	if (
		$cmsmasters_option['alister-bank' . '_blog_post_date'] || 
		$cmsmasters_option['alister-bank' . '_blog_post_author'] 
	) {
		echo '<div class="cmsmasters_post_cont_info entry-meta">';
			
			alister_bank_get_post_date('post');
			
			alister_bank_get_post_author('post');
			
		echo '</div>';
	}
	
	
	if ($cmsmasters_post_format == 'image') {
		$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);
		
		alister_bank_post_type_image(get_the_ID(), $cmsmasters_post_image_link, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == 'gallery') {
		$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));
		
		alister_bank_post_type_slider(get_the_ID(), $cmsmasters_post_images, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == 'video') {
		$cmsmasters_post_video_type = get_post_meta(get_the_ID(), 'cmsmasters_post_video_type', true);
		$cmsmasters_post_video_link = get_post_meta(get_the_ID(), 'cmsmasters_post_video_link', true);
		$cmsmasters_post_video_links = get_post_meta(get_the_ID(), 'cmsmasters_post_video_links', true);
		
		alister_bank_post_type_video(get_the_ID(), $cmsmasters_post_video_type, $cmsmasters_post_video_link, $cmsmasters_post_video_links, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == '' && !post_password_required() && has_post_thumbnail()) {
		$cmsmasters_post_image_show = get_post_meta(get_the_ID(), 'cmsmasters_post_image_show', true);
		
		if ($cmsmasters_post_image_show != 'true') {
			alister_bank_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'cmsmasters_open_post_img', false, false, false, true, false);
		}
	} elseif ($cmsmasters_post_format == 'audio') {
		$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);
		
		alister_bank_post_type_audio($cmsmasters_post_audio_links);
	}
	
	
	if (get_the_content() != '') {
		echo '<div class="cmsmasters_post_content entry-content">';
			
			the_content();
			
			
			wp_link_pages(array( 
				'before' => '<div class="subpage_nav">' . '<strong>' . esc_html__('Pages', 'alister-bank') . ':</strong>', 
				'after' => '</div>', 
				'link_before' => ' [ ', 
				'link_after' => ' ] ' 
			));
			
		echo '</div>';
	}
	
	
	if (
		$cmsmasters_option['alister-bank' . '_blog_post_tag'] || 
		$cmsmasters_option['alister-bank' . '_blog_post_like'] || 
		$cmsmasters_option['alister-bank' . '_blog_post_comment'] 
	) {
		echo '<footer class="cmsmasters_post_footer entry-meta">';
			
			alister_bank_get_post_tags();
			
			
			if (
				$cmsmasters_option['alister-bank' . '_blog_post_date'] || 
				$cmsmasters_option['alister-bank' . '_blog_post_author'] 
			) {
				echo '<div class="cmsmasters_post_meta_info entry-meta">';
					
					alister_bank_get_post_likes('post');
					
					alister_bank_get_post_comments('post');
					
				echo '</div>';
			}
			
		echo '</footer>';
	}
	?>
</article>
<!--_________________________ Finish Post Single Article _________________________ -->
<?php 

if ($cmsmasters_option['alister-bank' . '_blog_post_nav_box']) {
	$order_cat = (isset($cmsmasters_option['alister-bank' . '_blog_post_nav_order_cat']) ? $cmsmasters_option['alister-bank' . '_blog_post_nav_order_cat'] : false);
	alister_bank_prev_next_posts($order_cat);
}


if ($cmsmasters_post_sharing_box == 'true') {
	alister_bank_sharing_box(esc_html__('Like this post?', 'alister-bank'), 'h3');
}


if ($cmsmasters_post_author_box == 'true') {
	alister_bank_author_box(esc_html__('About author', 'alister-bank'), 'h3', 'h4');
}


if (get_the_tags()) {
	$tgsarray = array();
	
	foreach (get_the_tags() as $tagone) {
		$tgsarray[] = $tagone->term_id;
	}
} else {
	$tgsarray = '';
}


if ($cmsmasters_post_more_posts != 'hide') {
	alister_bank_related( 
		'h3', 
		esc_html__('More posts', 'alister-bank'), 
		esc_html__('No posts found', 'alister-bank'), 
		$cmsmasters_post_more_posts, 
		$tgsarray, 
		$cmsmasters_option['alister-bank' . '_blog_more_posts_count'], 
		$cmsmasters_option['alister-bank' . '_blog_more_posts_pause'], 
		'post' 
	);
}


$get_post = get_post( get_the_ID() );
$show_ping = ( 'open' === $get_post->ping_status );

if ( $show_ping ) {
	echo alister_bank_get_pings( get_the_ID(), 'h3' );
}


comments_template();

