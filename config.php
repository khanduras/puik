<?php

// run the generator.php file or fill this with a long string
// must not be empty
$config['encryptionKey'] = '';

// it is important to return the $config array!

// try to figure out the install path
$config['base_url']       = \Phile\Utility::getBaseUrl(); // use the Utility class to guess the base_url
$config['site_title']     = 'PUIK CMS'; // Site title
$config['theme']          = 'puik'; // Set the theme
$config['date_format']    = 'jS M Y'; // Set the PHP date format
$config['pages_order']    = 'meta.title:desc'; // Order pages by "title" (alpha) or "date"

// figure out the timezone
$config['timezone']       = (ini_get('date.timezone')) ? ini_get('date.timezone') : 'UTC'; // The default timezone

// only extend $config['plugins'] and not overwrite it, because some core plugins
// will be added to this config option by default. So, use this option in this way:
// $config['plugins']['myCustomPlugin'] = array('active' => true);
// also notice, each plugin has its own config namespace.
// activate plugins
$config['plugins'] = array(
	// key = vendor\\pluginName (vendor lowercase, pluginName lowerCamelCase
	'phile\\errorHandler'              => array(
		'active' => true,
		'handler' => \Phile\Plugin\Phile\ErrorHandler\Plugin::HANDLER_DEVELOPMENT
	), // the default error handler
	'phile\\parserMarkdown'            => array('active' => true), // the default parser
	'phile\\parserMeta'                => array('active' => true), // the default parser
	'phile\\templateTwig'              => array('active' => true), // the default template engine
	'phile\\phpFastCache'              => array('active' => false), // the default cache engine
	'phile\\simpleFileDataPersistence' => array('active' => false), // the default data storage engine
	'phile\\adminPanel'                => array('active' => true),  // the default admin panel
	'gibbs\\phileSubNavigation' 	   => array('active' => true),
	'khanduras\\puikManager'           => array('active' => true),
	'khanduras\\puikSearch'           => array('active' => true)
);

// are we using the adminPanel plugin?
if($config['plugins']['phile\\adminPanel']['active']) {
    // merge config with json if PhileAdmin is installed
    if (file_exists('config.json')) {
        $config = array_merge(
            $config,
            json_decode(file_get_contents('config.json'), true)
        );
    }
    // merge plugins with json if PhileAdmin is installed
    if(file_exists('config_plugins.json')) {
        $config['plugins'] = array_merge(
            $config['plugins'],
            json_decode(file_get_contents('config_plugins.json'), true)
        );
    }
}

return $config;
