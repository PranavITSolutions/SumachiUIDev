<?php 
/*
Plugin Name: The Daily Horoscope
Description: Add daily horoscope to your widgets, posts and pages. Select your sign and read your daily horoscope. <a href="http://dailyhoroscopeplugin.com" target="_blank">Dailyhoroscopeplugin.com</a>.
Version: 1.2
Tested up to: 4.6
Author: Dailyhoroscopeplugin.com
Author URI: http://dailyhoroscopeplugin.com
License: GPLv2
*/


class Horoscope_Widget extends WP_Widget {
     
    function __construct() {
    	parent::__construct(
         
	        // base ID of the widget
	        'horoscope_widget',
	         
	        // name of the widget
	        __('Horoscope Widget', 'Dailyhoroscope' ),
	         
	        // widget options
	        array (
	            'description' => __( 'Widget to display horoscopes.', 'Dailyhoroscope' )
	        )
	         
	    );
    }
     
    function form( $instance ) {
    }
     
    function update( $new_instance, $old_instance ) {       
    }
     
    function widget( $args, $instance ) {
    	wp_enqueue_script( 'daily-horoscope-script', plugins_url('js/script.js',__FILE__), array('jquery'));
    	wp_enqueue_style( 'daily-horoscope-style', plugins_url('css/style.css',__FILE__));

        $data = array(
            'base_url'            => plugin_dir_url( __FILE__ )
        );

        wp_localize_script( 'daily-horoscope-script', 'dailyHoroscopeGlobal', $data );

        echo '
        <aside class="widget" id="daily-horoscope">
        	<div id="daily-horoscope-panel">
        		<a href="http://dailyhoroscopeplugin.com" target="_blank"><h3>Daily Horoscope</h3></a>

        		<div id="daily-horoscope-date">
        			<i>'.Date('m/d/y').'</i>
        		</div>
	        	<select class="daily-horoscope-star">
	        		<option disabled selected>Select Your Sign</option>
					<option value="ari">Aries</option>
	        			<option value="tau">Taurus</option>
					<option value="gem">Gemini</option>
					<option value="can">Cancer</option>
					<option value="leo">Leo</option>
					<option value="vir">Virgo</option>
					<option value="lib">Libra</option>
					<option value="sco">Scorpio</option>
					<option value="sag">Sagittarius</option>
					<option value="cap">Capricorn</option>
					<option value="aqu">Aquarius</option>
					<option value="pis">Pisces</option>
	         	</select>
	         	<p class="daily-horoscope-display"></p>

        	</div>

         </aside>
        ';
    }
     
}

function daily_horoscope_widget() {
 
    register_widget( 'Horoscope_Widget' );
 
}
add_action( 'widgets_init', 'daily_horoscope_widget' );



function horoscope_widget_shortcode($atts) {
    
    global $wp_widget_factory;
    
    // extract(shortcode_atts(array(
    //     'widget_name' => FALSE
    // ), $atts));
    
    $widget_name = 'Horoscope_Widget';
    // $widget_name = wp_specialchars($widget_name);
    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')):
        $wp_class = 'WP_Widget_'.ucwords(strtolower($class));
        
        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct"),'<strong>'.$class.'</strong>').'</p>';
        else:
            $class = $wp_class;
        endif;
    endif;
    
    ob_start();
    the_widget($widget_name, array(), array('widget_id'=>'arbitrary-instance-horoscope_widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
    
}
add_shortcode('daily_horoscope','horoscope_widget_shortcode'); 
?>