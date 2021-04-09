<?php
	function add_stylesss_shop(){
	
		wp_enqueue_style("boot-style", get_template_directory_uri().'/css/bootstrap.min.css');
        wp_enqueue_style("fontawesome-style", get_template_directory_uri().'/css/font-awesome.min.css');
        if(!is_home() || !is_front_page()){
		wp_enqueue_style("flaticon-style", get_template_directory_uri().'/css/flaticon.css');
		wp_enqueue_style("slicknav-style", get_template_directory_uri().'/css/slicknav.min.css');
		wp_enqueue_style("jqueryui-style", get_template_directory_uri().'/css/jquery-ui.min.css');
		wp_enqueue_style("owl-style", get_template_directory_uri().'/css/owl.carousel.min.css');
		wp_enqueue_style("animatess-style", get_template_directory_uri().'/css/animate.css');

	}
	wp_enqueue_style("mainss-style", get_template_directory_uri().'/css/glider.min.css');
	wp_enqueue_style("main-style", get_template_directory_uri().'/css/style.css');
	wp_enqueue_style("customs-style", get_template_directory_uri().'/css/custom.css');
		
        wp_deregister_script('jquery');

        wp_register_script( 'jquery', includes_url('../wp-content/themes/Blue_Velvet/js/jquery-3.2.1.min.js') ,false, ' ', true);

		wp_enqueue_script("jquery");
		
        wp_enqueue_script("bootss-script",get_template_directory_uri()."/js/bootstrap.min.js", array(), '1.0.0', true);
        if(!is_home() || !is_front_page()){
		wp_enqueue_script("jqueryslick-script",get_template_directory_uri()."/js/jquery.slicknav.min.js", array(), '1.0.0', true);
		wp_enqueue_script("owls-script",get_template_directory_uri()."/js/owl.carousel.min.js", array(), '1.0.0', true);
		wp_enqueue_script("nicescroll-script",get_template_directory_uri()."/js/jquery.nicescroll.min.js", array(), '1.0.0', true);
		wp_enqueue_script("zooom-script",get_template_directory_uri()."/js/jquery.zoom.min.js", array(), '1.0.0', true);
		wp_enqueue_script("jqui-script",get_template_directory_uri()."/js/jquery-ui.min.js", array(), '1.0.0', true);
		wp_enqueue_script("maiiiin-script",get_template_directory_uri()."/js/main.js", array(), '1.0.0', true);
		
	}
	
	
	if(is_cart()){
		wp_enqueue_script("custooms-script",get_template_directory_uri()."/js/glider.min.js", array(), '1.0.0', true);
	wp_enqueue_script("custooms-glisder",get_template_directory_uri()."/js/glider-script.js", array(), '1.0.0', true);
}
	wp_enqueue_script("custoom-script",get_template_directory_uri()."/js/custom.js", array(), '1.0.0', true);

}
add_action("wp_enqueue_scripts" ,"add_stylesss_shop");  