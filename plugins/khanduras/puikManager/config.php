<?php
/**
 * puikManager Settings
 */
$config = array(
/* Setting config information for PhileAdmin */
  'info' => array(
    'author' => array(
      'name' => 'Daniel James',
      'homepage' => 'https://github.com/khanduras/puik'
      ),
    'namespace' => 'Khanduras',
    'url' => 'https://github.com/khanduras/puik',
    'version' => '1.0.3'
    ),
/**
 * Global Setings
 * Unable to override with page meta
 */
	'posts_title' => 'Posts',                   //
	'posts_slug' => 'posts',                    //
	'pages_title' => 'Pages',                   //
	'pages_slug' => 'pages',                    //
/**
 * Default Layout Settings 
 * Declare in main config.php for global override and in meta for page override
 */
	'page_width' => 'fluid', 					// fluid, full, fixed
	'style' => 'flat',							// almost-flat, gradient, flat
	'navbar' => 'sticky', 						// off, static, sticky
	'sidebar' => 'left', 						// off, left, right
	'navbar_layout' => 'main_navbar', 			// {{ theme_dir }}/assets/layout/*.html
	'footer_layout' => 'main_footer', 			// {{ theme_dir }}/assets/layout/*.html
	'sidebar_layout' => 'main_sidebar', 		// {{ theme_dir }}/assets/layout/*.html
	'content_layout' => 'main_content', 		// {{ theme_dir }}/assets/layout/*.html
	'customizer' => '', 						// {{ theme_dir }}/assets/*.css

	

);

return $config;
