<?php 
/**
 * @package 	WordPress
 * @subpackage 	All Business
 * @version 	1.0.2
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function all_business_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'all-business');
	$tabs['icon'] = esc_attr__('Social Icons', 'all-business');
	$tabs['lightbox'] = esc_attr__('Lightbox', 'all-business');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'all-business');
	$tabs['error'] = esc_attr__('404', 'all-business');
	$tabs['code'] = esc_attr__('Custom Codes', 'all-business');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'all-business');
	}
	
	return $tabs;
}


function all_business_options_element_sections() {
	$tab = all_business_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'all-business');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'all-business');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'all-business');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'all-business');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'all-business');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'all-business');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'all-business');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;	
} 


function all_business_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = all_business_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'all-business'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => '' 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => CMSMASTERS_SHORTNAME . '_social_icons', 
			'title' => esc_html__('Social Icons', 'all-business'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => array( 
				'cmsmasters-icon-facebook-1|#|' . esc_html__('Facebook', 'all-business') . '|true||', 
				'cmsmasters-icon-gplus-1|#|' . esc_html__('Google+', 'all-business') . '|true||', 
				'cmsmasters-icon-instagram|#|' . esc_html__('Instagram', 'all-business') . '|true||', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'all-business') . '|true||', 
				'cmsmasters-icon-youtube-play|#|' . esc_html__('YouTube', 'all-business') . '|true||' 
			) 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'all-business'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'dark', 
			'choices' => array( 
				esc_html__('Dark', 'all-business') . '|dark', 
				esc_html__('Light', 'all-business') . '|light', 
				esc_html__('Mac', 'all-business') . '|mac', 
				esc_html__('Metro Black', 'all-business') . '|metro-black', 
				esc_html__('Metro White', 'all-business') . '|metro-white', 
				esc_html__('Parade', 'all-business') . '|parade', 
				esc_html__('Smooth', 'all-business') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_path', 
			'title' => esc_html__('Path', 'all-business'), 
			'desc' => esc_html__('Sets path for switching windows', 'all-business'), 
			'type' => 'radio', 
			'std' => 'vertical', 
			'choices' => array( 
				esc_html__('Vertical', 'all-business') . '|vertical', 
				esc_html__('Horizontal', 'all-business') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'all-business'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'all-business'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'all-business'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'all-business'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'all-business'), 
			'type' => 'number', 
			'std' => 1, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'all-business'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'all-business'), 
			'type' => 'number', 
			'std' => 0.2, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'all-business'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'all-business'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'all-business'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'all-business'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'all-business'), 
			'type' => 'select', 
			'std' => 'center', 
			'choices' => array( 
				esc_html__('Center', 'all-business') . '|center', 
				esc_html__('Fit', 'all-business') . '|fit', 
				esc_html__('Fill', 'all-business') . '|fill', 
				esc_html__('Stretch', 'all-business') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'all-business'), 
			'desc' => esc_html__('Sets buttons be available or not', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'all-business'), 
			'desc' => esc_html__('Enable the arrow buttons', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'all-business'), 
			'desc' => esc_html__('Sets the fullscreen button', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'all-business'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'all-business'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'all-business'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'all-business'), 
			'desc' => esc_html__('Sets the swipe navigation', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'all-business'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_color', 
			'title' => esc_html__('Text Color', 'all-business'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#292929' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'all-business'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#fbfbfb' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'all-business'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'all-business'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_rep', 
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
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_pos', 
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
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_att', 
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
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_size', 
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
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_search', 
			'title' => esc_html__('Search Line', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'all-business'), 
			'desc' => esc_html__('show', 'all-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'all-business'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'all-business'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_api_key', 
			'title' => esc_html__('Twitter API key', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => CMSMASTERS_SHORTNAME . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => CMSMASTERS_SHORTNAME . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'all-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

