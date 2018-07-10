<?php 
/**
 * @package 	WordPress
 * @subpackage 	All Business
 * @version		1.0.0
 * 
 * Admin Panel Theme Settings Import/Export
 * Created by CMSMasters
 * 
 */


function all_business_options_demo_tabs() {
	$tabs = array();
	
	
	$tabs['import'] = esc_attr__('Import', 'all-business');
	$tabs['export'] = esc_attr__('Export', 'all-business');
	
	
	return $tabs;
}


function all_business_options_demo_sections() {
	$tab = all_business_get_the_tab();
	
	
	switch ($tab) {
	case 'import':
		$sections = array();
		
		$sections['import_section'] = esc_html__('Theme Settings Import', 'all-business');
		
		
		break;
	case 'export':
		$sections = array();
		
		$sections['export_section'] = esc_html__('Theme Settings Export', 'all-business');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return $sections;
} 


function all_business_options_demo_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = all_business_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'import':
		$options[] = array( 
			'section' => 'import_section', 
			'id' => CMSMASTERS_SHORTNAME . '_demo_import', 
			'title' => esc_html__('Theme Settings', 'all-business'), 
			'desc' => esc_html__("Enter your theme settings data here and click 'Import' button", 'all-business'), 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		
		break;
	case 'export':
		$options[] = array( 
			'section' => 'export_section', 
			'id' => CMSMASTERS_SHORTNAME . '_demo_export', 
			'title' => esc_html__('Theme Settings', 'all-business'), 
			'desc' => esc_html__("Click here to export your theme settings data to the file", 'all-business'), 
			'type' => 'button', 
			'std' => esc_html__('Export Theme Settings', 'all-business'), 
			'class' => 'cmsmasters-demo-export' 
		);
		
		
		break;
	}
	
	
	return $options;	
}

