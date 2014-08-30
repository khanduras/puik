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

##Features
 * Responsive, Mobile-First Design
 * Easy to learn, Powerful yet Simple
 * Use UI Kit [Customizer](http://www.getuikit.com/docs/customizer.html) to quickly and beautifully transform UI Kit to your own design
 * Complete package with Phile and Phile Admin

##Theme and Plugins
PUIK includes a UI Kit based boilerplate with many features and functions built into an easy to manage config file. There are also many different core plugins for modular functionalities.

###Plugins:
 * puikManager :: Manages options for UI Kit ex. Navbar, Sidebar, Footer and Content layouts and options
 * puiKSearch :: Adds [UI Kit Search](http://www.getuikit.com/docs/addons_search.html)
 * more to come....

###Themes:
 * puik :: A robust theme required for all PUIK plugins.
 
##Getting Started

###Installation
  * Clone this repo
  * Run generator.php and copy into config.php
  * You'll be able to access admin by going to admin/ or clicking the link in the bottom footer

###Admin Panel
Once you get PUIK properly installed, explore the Admin Panel as it will let you add pages and change settings without having to edit a file. 

###puikManager
There are plenty of options found in the config.php file for this plugin.

````php
'page_width' => 'fluid', 					//fluid, full, fixed
'style' => 'flat',							//almost-flat, gradient, flat
'navbar' => 'sticky', 						//off, static, sticky
'sidebar' => 'left', 						//off, left, right
'navbar_layout' => 'main_navbar', 			// {{ theme_dir }}/layout/*.html
'footer_layout' => 'main_footer', 			// {{ theme_dir }}/layout/*.html
'sidebar_layout' => 'main_sidebar', 		// {{ theme_dir }}/layout/*.html
'content_layout' => 'main_content', 		// {{ theme_dir }}/layout/*.html
'customizer' => '', 						// {{ theme_dir }}/*.css

````
These settings can be changed in the following order:
  * puikManager config.php defaults
  * PUIK config.php main configuration override
  * Phile Admin config settings
  * Page Meta

This allows individual pages to have unique settings, but a global setting that can be changed easily.

##Ambitions
I have already [started this project](https://github.com/khanduras/pico_uikit) with Pico before I discovered Phile. You can see a demo of what I'd like to accomplish [here](http://puik.khanduras.net).

##Thanks To
This project couldn't be possible if it wasn't for the open-source community of developers

  * [Gilbert Pellegrom](http://gilbert.pellegrom.me/) for developing Pico
  * [Yootheme](http://www.yootheme.com/) for creating [UI Kit](http://getuikit.com)
  * [James Doyle](https://github.com/james2doyle) & Frank Nägler ([NeoBlack](https://github.com/NeoBlack)) et al for PhileCMS, forked from Pico
  * A [community of plugin developers](https://github.com/PhileCMS/Phile/wiki/%5BCOMMUNITY%5D-Plugins) who taught me how to work with Phile and Pico.

##Contact
My name is [Daniel James](mailto:daniel.james@chiefqualakon.net). Email me if you're interested in helping me with this project. I'm not a PHP Developer but I see a benefit to a package like PUIK. 
