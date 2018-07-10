<?php 
/**
 * @package 	WordPress
 * @subpackage 	All Business
 * @version 	1.1.1
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function all_business_options_general_tabs() {
	$cmsmasters_option = all_business_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'all-business');
	
	if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'all-business');
	}
	
	$tabs['header'] = esc_attr__('Header', 'all-business');
	$tabs['content'] = esc_attr__('Content', 'all-business');
	$tabs['footer'] = esc_attr__('Footer', 'all-business');
	
	return $tabs;
}


function all_business_options_general_sections() {
	$tab = all_business_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'all-business');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'all-business');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'all-business');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'all-business');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'all-business');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;
} 


function all_business_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = all_business_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'liquid', 
			'choices' => array( 
				esc_html__('Liquid', 'all-business') . '|liquid', 
				esc_html__('Boxed', 'all-business') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_type', 
			'title' => esc_html__('Logo Type', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'image', 
			'choices' => array( 
				esc_html__('Image', 'all-business') . '|image', 
				esc_html__('Text', 'all-business') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_url', 
			'title' => esc_html__('Logo Image', 'all-business'), 
			'desc' => esc_html__('Choose your website logo image.', 'all-business'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'all-business'), 
			'desc' => esc_html__('Choose logo image for retina displays.', 'all-business'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_title', 
			'title' => esc_html__('Logo Title', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => ((get_bloginfo('name')) ? get_bloginfo('name') : CMSMASTERS_FULLNAME), 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'all-business'), 
			'desc' => esc_html__('enable', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'all-business'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'all-business'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_col', 
			'title' => esc_html__('Background Color', 'all-business'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#ffffff' 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_img', 
			'title' => esc_html__('Background Image', 'all-business'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'all-business'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'all-business') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'all-business') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'all-business') . '|repeat-y', 
				esc_html__('Repeat', 'all-business') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_pos', 
			'title' => esc_html__('Background Position', 'all-business'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'top center', 
			'choices' => array( 
				esc_html__('Top Left', 'all-business') . '|top left', 
				esc_html__('Top Center', 'all-business') . '|top center', 
				esc_html__('Top Right', 'all-business') . '|top right', 
				esc_html__('Center Left', 'all-business') . '|center left', 
				esc_html__('Center Center', 'all-business') . '|center center', 
				esc_html__('Center Right', 'all-business') . '|center right', 
				esc_html__('Bottom Left', 'all-business') . '|bottom left', 
				esc_html__('Bottom Center', 'all-business') . '|bottom center', 
				esc_html__('Bottom Right', 'all-business') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'all-business') . '|scroll', 
				esc_html__('Fixed', 'all-business') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_size', 
			'title' => esc_html__('Background Size', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'all-business') . '|auto', 
				esc_html__('Cover', 'all-business') . '|cover', 
				esc_html__('Contain', 'all-business') . '|contain' 
			) 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'all-business'), 
			'desc' => esc_html__('enable', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content by Default', 'all-business'), 
			'desc' => esc_html__('enable', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line', 
			'title' => esc_html__('Top Line', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_height', 
			'title' => esc_html__('Top Height', 'all-business'), 
			'desc' => esc_html__('pixels', 'all-business'), 
			'type' => 'number', 
			'std' => '36', 
			'min' => '30' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'all-business'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'all-business') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
	if (CMSMASTERS_DONATIONS) {
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line_donations_but', 
			'title' => esc_html__('Top Donations Button', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line_donations_but_text', 
			'title' => esc_html__('Top Donations Button Text', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => esc_html__('Donate Now!', 'all-business'), 
			'class' => 'nohtml' 
		);
	}
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'all-business') . '|none', 
				esc_html__('Top Line Social Icons', 'all-business') . '|social', 
				esc_html__('Top Line Navigation', 'all-business') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_styles', 
			'title' => esc_html__('Header Styles', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'l_nav', 
			'choices' => array( 
				esc_html__('Default Style', 'all-business') . '|default', 
				esc_html__('Compact Style Left Navigation', 'all-business') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'all-business') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'all-business') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'all-business'), 
			'desc' => esc_html__('pixels', 'all-business'), 
			'type' => 'number', 
			'std' => '100', 
			'min' => '80' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'all-business'), 
			'desc' => esc_html__('pixels', 'all-business'), 
			'type' => 'number', 
			'std' => '44', 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_search', 
			'title' => esc_html__('Header Search', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
	if (CMSMASTERS_DONATIONS) {
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_donations_but', 
			'title' => esc_html__('Header Donations Button', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_donations_but_text', 
			'title' => esc_html__('Header Donations Button Text', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => esc_html__('Donate Now!', 'all-business'), 
			'class' => 'nohtml' 
		);
	}
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'none', 
			'choices' => array( 
				esc_html__('None', 'all-business') . '|none', 
				esc_html__('Header Social Icons', 'all-business') . '|social', 
				esc_html__('Header Custom HTML', 'all-business') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'all-business'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'all-business') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'all-business'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'all-business'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'all-business'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
	if (CMSMASTERS_EVENTS_CALENDAR) {
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_events_layout', 
			'title' => esc_html__('Events Calendar Layout Type', 'all-business'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
	}
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'all-business'), 
			'desc' => 'Layout for pages of non-listed types', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'all-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'left', 
			'choices' => array( 
				esc_html__('Left', 'all-business') . '|left', 
				esc_html__('Right', 'all-business') . '|right', 
				esc_html__('Center', 'all-business') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_scheme', 
			'title' => esc_html__('Heading Custom Color Scheme by Default', 'all-business'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'default', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'all-business'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'all-business'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'all-business') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'all-business') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'all-business') . '|repeat-y', 
				esc_html__('Repeat', 'all-business') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'all-business') . '|scroll', 
				esc_html__('Fixed', 'all-business') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'all-business') . '|auto', 
				esc_html__('Cover', 'all-business') . '|cover', 
				esc_html__('Contain', 'all-business') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'all-business'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => '#eeeeee' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'all-business'), 
			'desc' => esc_html__('pixels', 'all-business'), 
			'type' => 'number', 
			'std' => '80', 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bottom_scheme', 
			'title' => esc_html__('Bottom Custom Color Scheme', 'all-business'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'bottom', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'all-business'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => '14141414', 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_scheme', 
			'title' => esc_html__('Footer Custom Color Scheme', 'all-business'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'footer', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_type', 
			'title' => esc_html__('Footer Type', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'small', 
			'choices' => array( 
				esc_html__('Default', 'all-business') . '|default', 
				esc_html__('Small', 'all-business') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'all-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'nav', 
			'choices' => array( 
				esc_html__('None', 'all-business') . '|none', 
				esc_html__('Footer Navigation', 'all-business') . '|nav', 
				esc_html__('Social Icons', 'all-business') . '|social', 
				esc_html__('Custom HTML', 'all-business') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'all-business'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'all-business'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'all-business'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'all-business'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_social', 
			'title' => esc_html__('Footer Social Icons', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'all-business'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'all-business') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => CMSMASTERS_FULLNAME . ' &copy; ' . date('Y') . ' | ' . esc_html__('All Rights Reserved', 'all-business'), 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

