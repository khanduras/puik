Phile UI Kit (PUIK) Framework
====
PhileCMS is a flat-file CMS with no database required. 
   * [PhileCMS Homepage](http://philecms.com/)
   * [PhileCMS Github](https://github.com/PhileCMS/Phile/)
   * [PhileCMS G+ Community](https://plus.google.com/u/0/communities/105363272048954062353)

UI Kit is a "A lightweight and modular front-end framework for developing fast and powerful web interfaces." 
 * [UI Kit Homepage](http://getuikit.com)
 * [UI Kit Github](https://github.com/uikit/uikit)
 * [UI Kit G+ Community](https://plus.google.com/communities/114238665434626719878)


# 1. Installation
  * Clone this repo
  * Run generator.php and copy into config.php
  * You'll be able to access admin by going to admin/ or clicking the link in the bottom footer

###Admin Panel
Once you get PUIK properly installed, explore the Admin Panel as it will let you add pages and change settings without having to edit a file. You won't be able to access Admin or the Phile CMS without adding the text from generator.php.

###puikManager
There are plenty of options found in the config.php file for this plugin.

````php
	'page_width' => 'full', 					// fluid, full, fixed
	'style' => 'almost-flat',   				// almost-flat, gradient, flat
	'navbar' => 'sticky', 						// off, static, sticky
	'sidebar' => 'left', 						// off, left, right
	'navbar_layout' => 'main_navbar', 			// {{ theme_dir }}/assets/layout/*.html
	'footer_layout' => 'main_footer', 			// {{ theme_dir }}/assets/layout/*.html
	'sidebar_layout' => 'main_sidebar', 		// {{ theme_dir }}/assets/layout/*.html
	'post_layout' => 'post', 		            // {{ theme_dir }}/assets/layout/*.html
	'page_layout' => 'page', 		            // {{ theme_dir }}/assets/layout/*.html
	'customizer' => '', 						// {{ theme_dir }}/assets/*.css
    'grid_max' => '10',                         // 10,6,5,4,3,2,1
    'grid_sidebar' => '3',                      // 1 to grid_max
    'sidebar_title' => 'Main Menu',             //

````
These settings can be changed in the following order:
  * puikManager config.php defaults
  * PUIK config.php main configuration override
  * Phile Admin config settings
  * Page Meta

This allows individual pages to have unique settings, but a global setting that can be changed easily. There are more options in page meta data as well that will override defaults.

#2. Thanks To
This project couldn't be possible if it wasn't for the open-source community of developers

  * [Gilbert Pellegrom](http://gilbert.pellegrom.me/) for developing Pico
  * [Yootheme](http://www.yootheme.com/) for creating [UI Kit](http://getuikit.com)
  * [James Doyle](https://github.com/james2doyle) & Frank Nägler ([NeoBlack](https://github.com/NeoBlack)) et al for PhileCMS, forked from Pico
  * A [community of plugin developers](https://github.com/PhileCMS/Phile/wiki/%5BCOMMUNITY%5D-Plugins) who taught me how to work with Phile and Pico.

#3. Contact
My name is [Daniel James](mailto:daniel.james@chiefqualakon.net). Email me if you're interested in helping me with this project. I'm not a PHP Developer but I see a benefit to a package like PUIK. 
