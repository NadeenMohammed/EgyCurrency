<?php 
/**
 * @package 	WordPress
 * @subpackage 	Alister Bank
 * @version		1.0.0
 * 
 * Admin Panel Post, Project, Profile Settings
 * Created by CMSMasters
 * 
 */


function alister_bank_options_single_tabs() {
	$tabs = array();
	
	
	$tabs['post'] = esc_attr__('Post', 'alister-bank');
	
	if (CMSMASTERS_PROJECT_COMPATIBLE && class_exists('Cmsmasters_Projects')) {
		$tabs['project'] = esc_attr__('Project', 'alister-bank');
	}
	
	if (CMSMASTERS_PROFILE_COMPATIBLE && class_exists('Cmsmasters_Profiles')) {
		$tabs['profile'] = esc_attr__('Profile', 'alister-bank');
	}
	
	
	return apply_filters('cmsmasters_options_single_tabs_filter', $tabs);
}


function alister_bank_options_single_sections() {
	$tab = alister_bank_get_the_tab();
	
	
	switch ($tab) {
	case 'post':
		$sections = array();
		
		$sections['post_section'] = esc_attr__('Blog Post Options', 'alister-bank');
		
		
		break;
	case 'project':
		$sections = array();
		
		$sections['project_section'] = esc_attr__('Portfolio Project Options', 'alister-bank');
		
		
		break;
	case 'profile':
		$sections = array();
		
		$sections['profile_section'] = esc_attr__('Person Block Profile Options', 'alister-bank');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return apply_filters('cmsmasters_options_single_sections_filter', $sections, $tab);
} 


function alister_bank_options_single_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = alister_bank_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = alister_bank_settings_single_defaults();
	
	
	switch ($tab) {
	case 'post':
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_post_layout', 
			'title' => esc_html__('Layout Type', 'alister-bank'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_post_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'alister-bank') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_post_title', 
			'title' => esc_html__('Post Title', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_post_title'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_post_date', 
			'title' => esc_html__('Post Date', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_post_date'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_post_cat', 
			'title' => esc_html__('Post Categories', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_post_cat'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_post_author', 
			'title' => esc_html__('Post Author', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_post_author'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_post_comment', 
			'title' => esc_html__('Post Comments', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_post_comment'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_post_tag', 
			'title' => esc_html__('Post Tags', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_post_tag'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_post_like', 
			'title' => esc_html__('Post Likes', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_post_like'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_post_nav_box', 
			'title' => esc_html__('Posts Navigation Box', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_post_nav_box'] 
		);

		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_post_nav_order_cat', 
			'title' => esc_html__('Posts Navigation Order by Category', 'alister-bank'), 
			'desc' => esc_html__('enable', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_post_nav_order_cat'] 
		);

		if (class_exists('Cmsmasters_Content_Composer')) {
			$options[] = array( 
				'section' => 'post_section', 
				'id' => 'alister-bank' . '_blog_post_share_box', 
				'title' => esc_html__('Sharing Box', 'alister-bank'), 
				'desc' => esc_html__('show', 'alister-bank'), 
				'type' => 'checkbox', 
				'std' => $defaults[$tab]['alister-bank' . '_blog_post_share_box'] 
			);
		}
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_post_author_box', 
			'title' => esc_html__('About Author Box', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_post_author_box'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_more_posts_box', 
			'title' => esc_html__('More Posts Box', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_more_posts_box'], 
			'choices' => array( 
				esc_html__('Show Related Posts', 'alister-bank') . '|related', 
				esc_html__('Show Popular Posts', 'alister-bank') . '|popular', 
				esc_html__('Show Recent Posts', 'alister-bank') . '|recent', 
				esc_html__('Hide More Posts Box', 'alister-bank') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_more_posts_count', 
			'title' => esc_html__('More Posts Box Items Number', 'alister-bank'), 
			'desc' => esc_html__('posts', 'alister-bank'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_more_posts_count'], 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'alister-bank' . '_blog_more_posts_pause', 
			'title' => esc_html__('More Posts Slider Pause Time', 'alister-bank'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'alister-bank'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['alister-bank' . '_blog_more_posts_pause'], 
			'min' => '0', 
			'max' => '20' 
		);
		
		
		break;
	case 'project':
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_title', 
			'title' => esc_html__('Project Title', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_title'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_details_title', 
			'title' => esc_html__('Project Details Title', 'alister-bank'), 
			'desc' => esc_html__('Enter a project details block title', 'alister-bank'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_details_title'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_date', 
			'title' => esc_html__('Project Date', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_date'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_cat', 
			'title' => esc_html__('Project Categories', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_cat'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_author', 
			'title' => esc_html__('Project Author', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_author'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_comment', 
			'title' => esc_html__('Project Comments', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_comment'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_tag', 
			'title' => esc_html__('Project Tags', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_tag'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_like', 
			'title' => esc_html__('Project Likes', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_like'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_link', 
			'title' => esc_html__('Project Link', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_link'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_share_box', 
			'title' => esc_html__('Sharing Box', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_share_box'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_nav_box', 
			'title' => esc_html__('Projects Navigation Box', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_nav_box'] 
		);

		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_nav_order_cat', 
			'title' => esc_html__('Projects Navigation Order by Category', 'alister-bank'), 
			'desc' => esc_html__('enable', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_nav_order_cat'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_author_box', 
			'title' => esc_html__('About Author Box', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_author_box'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_more_projects_box', 
			'title' => esc_html__('More Projects Box', 'alister-bank'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_more_projects_box'], 
			'choices' => array( 
				esc_html__('Show Related Projects', 'alister-bank') . '|related', 
				esc_html__('Show Popular Projects', 'alister-bank') . '|popular', 
				esc_html__('Show Recent Projects', 'alister-bank') . '|recent', 
				esc_html__('Hide More Projects Box', 'alister-bank') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_more_projects_count', 
			'title' => esc_html__('More Projects Box Items Number', 'alister-bank'), 
			'desc' => esc_html__('projects', 'alister-bank'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_more_projects_count'], 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_more_projects_pause', 
			'title' => esc_html__('More Projects Slider Pause Time', 'alister-bank'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'alister-bank'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_more_projects_pause'], 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_project_slug', 
			'title' => esc_html__('Project Slug', 'alister-bank'), 
			'desc' => esc_html__('Enter a page slug that should be used for your projects single item', 'alister-bank'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_project_slug'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_pj_categs_slug', 
			'title' => esc_html__('Project Categories Slug', 'alister-bank'), 
			'desc' => esc_html__('Enter page slug that should be used on projects categories archive page', 'alister-bank'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_pj_categs_slug'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'alister-bank' . '_portfolio_pj_tags_slug', 
			'title' => esc_html__('Project Tags Slug', 'alister-bank'), 
			'desc' => esc_html__('Enter page slug that should be used on projects tags archive page', 'alister-bank'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_portfolio_pj_tags_slug'], 
			'class' => '' 
		);
		
		
		break;
	case 'profile':
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'alister-bank' . '_profile_post_title', 
			'title' => esc_html__('Profile Title', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_profile_post_title'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'alister-bank' . '_profile_post_details_title', 
			'title' => esc_html__('Profile Details Title', 'alister-bank'), 
			'desc' => esc_html__('Enter a profile details block title', 'alister-bank'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_profile_post_details_title'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'alister-bank' . '_profile_post_cat', 
			'title' => esc_html__('Profile Categories', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_profile_post_cat'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'alister-bank' . '_profile_post_comment', 
			'title' => esc_html__('Profile Comments', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_profile_post_comment'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'alister-bank' . '_profile_post_like', 
			'title' => esc_html__('Profile Likes', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_profile_post_like'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'alister-bank' . '_profile_post_nav_box', 
			'title' => esc_html__('Profiles Navigation Box', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_profile_post_nav_box'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'alister-bank' . '_profile_post_nav_order_cat', 
			'title' => esc_html__('Profiles Navigation Order by Category', 'alister-bank'), 
			'desc' => esc_html__('enable', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_profile_post_nav_order_cat'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'alister-bank' . '_profile_post_share_box', 
			'title' => esc_html__('Sharing Box', 'alister-bank'), 
			'desc' => esc_html__('show', 'alister-bank'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['alister-bank' . '_profile_post_share_box'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'alister-bank' . '_profile_post_slug', 
			'title' => esc_html__('Profile Slug', 'alister-bank'), 
			'desc' => esc_html__('Enter a page slug that should be used for your profiles single item', 'alister-bank'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_profile_post_slug'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'alister-bank' . '_profile_pl_categs_slug', 
			'title' => esc_html__('Profile Categories Slug', 'alister-bank'), 
			'desc' => esc_html__('Enter page slug that should be used on profiles categories archive page', 'alister-bank'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['alister-bank' . '_profile_pl_categs_slug'], 
			'class' => '' 
		);
		
		
		break;
	}
	
	
	return apply_filters('cmsmasters_options_single_fields_filter', $options, $tab);
}

