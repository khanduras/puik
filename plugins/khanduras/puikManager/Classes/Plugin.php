<?php
/**
 * Plugin class
 *
 * PuikManager works with puik theme and twig to integrate UI Kit http://getuikit.com
 * Adds Navbar, Sidebar, Footer Layouts
 *
 **/
namespace Phile\Plugin\Khanduras\PuikManager;

/**
 * @author  Daniel James
 * @link    https://github.com/khanduras/puik
 * @license http://opensource.org/licenses/MIT
 * @package Phile\Plugin\khanduras\puikManager
 */
class Plugin extends \Phile\Plugin\AbstractPlugin implements \Phile\Gateway\EventObserverInterface {
	// $this->settings will be filled with the data from the config.php file from the plugin folder
	// var_dump($this->settings);
	//
	/**
	 * global variables can be accessed with $this->variable;
	 **/
	
	private $config;
	private $action;
	private $posts_title;
	private $posts_slug;
	
	//
	/**
	 * the constructor
	 * register events you wish to make use of and initialize variables
	 */
	public function __construct() {
        \Phile\Event::registerEvent('config_loaded', $this);
        \Phile\Event::registerEvent('request_uri', $this);	
        \Phile\Event::registerEvent('after_read_file_meta', $this);

        \Phile\Event::registerEvent('template_engine_registered', $this);
        $this->config = \Phile\Registry::get('Phile_Settings');
	}

	/**
	 * event method
	 * @param string $eventKey
	 * @param null   $data
	 *
	 * @return mixed|void
	 */
	public function on($eventKey, $data = null) {
	

        if($eventKey == 'config_loaded')
        {
            $this->config_loaded($data);   
            return;
        }
	    if ($eventKey == 'request_uri') {
			$uri = explode('/', $data['uri']);
            if($uri[0] == $this->posts_slug) {
			    $this->render($data, 'posts', '200');
			}
			return;
		}
        if($eventKey == 'template_engine_registered')
        {
            $this->template_engine_registered($data);   
            return;
        }
	    if ($eventKey == 'after_read_file_meta') {
			$this->after_read_file_meta($data);
			return;      
		}
	}
	
    private function config_loaded($data) {
        //Define defaults for post titles and slugs		
		if (isset($this->config['posts_title'])) {			
			$this->posts_title = $this->config['posts_title'];
		} else {
		    $this->posts_title = $this->settings['posts_title'];
		}

	    if (isset($this->config['posts_slug'])) {
	         $this->posts_slug = $this->config['posts_slug'];
		} else {
	         $this->posts_slug = $this->settings['posts_slug'];
	    }

        return;	
    }
    
    private function template_engine_registered($data) {
        $data['data']['posts_title'] = $this->posts_title;
        $data['data']['posts_url'] = $this->config['base_url']  . '/' . $this->posts_slug;
        return;
    }
	private function after_read_file_meta($data) {
        if (isset($this->action)) {
            $data['meta']['content_layout'] = $this->action;
        }
        //Check if meta is blank, then copy config.php or plugin settings to meta data
		if(!isset($data['meta']['page_width'])) {			
			if (isset($this->config['page_width'])) {
				$data['meta']['page_width'] = $this->config['page_width'];
			} else {
				$data['meta']['page_width'] = $this->settings['page_width'];
			}
		}		
		if(!isset($data['meta']['style'])) {			
			if (isset($this->config['style'])) {
				$data['meta']['style'] = $this->config['style'];
			} else {
				$data['meta']['style'] = $this->settings['style'];
			}
		}		
		if(!isset($data['meta']['navbar'])) {			
			if (isset($this->config['navbar'])) {
				$data['meta']['navbar'] = $this->config['navbar'];
			} else {
				$data['meta']['navbar'] = $this->settings['navbar'];
			}
		}
		
		if(!isset($data['meta']['sidebar'])) {			
			if (isset($this->config['sidebar'])) {
				$data['meta']['sidebar'] = $this->config['sidebar'];
			} else {
				$data['meta']['sidebar'] = $this->settings['sidebar'];
			}
		}
        //To do: Check if *_source is an actual file but Phile error handler does that too.
        // Navbar
		if(!isset($data['meta']['navbar_layout'])) {			
			if (isset($this->config['navbar_layout'])) {
				$data['meta']['navbar_layout'] = $this->config['navbar_layout'];
			} else {
				$data['meta']['navbar_layout'] = $this->settings['navbar_layout'];
			}
		}
		$navbar_source = 'assets/layout/' . $data['meta']['navbar_layout'] . '.html';
		$data['meta']['navbar_source'] = $navbar_source;
        // Sidebar
		if(!isset($data['meta']['sidebar_layout'])) {			
			if (isset($this->config['sidebar_layout'])) {
				$data['meta']['sidebar_layout'] = $this->config['sidebar_layout'];
			} else {
				$data['meta']['sidebar_layout'] = $this->settings['sidebar_layout'];
			}
		}
		$sidebar_source = 'assets/layout/' . $data['meta']['sidebar_layout'] . '.html';
		$data['meta']['sidebar_source'] = $sidebar_source;
        // Footer
		if(!isset($data['meta']['footer_layout'])) {			
			if (isset($this->config['footer_layout'])) {
				$data['meta']['footer_layout'] = $this->config['footer_layout'];
			} else {
				$data['meta']['footer_layout'] = $this->settings['footer_layout'];
			}
		}
		$footer_source = 'assets/layout/' . $data['meta']['footer_layout'] . '.html';
		$data['meta']['footer_source'] = $footer_source;
        // Content
		if(!isset($data['meta']['content_layout'])) {			
			if (isset($this->config['content_layout'])) {
				$data['meta']['content_layout'] = $this->config['content_layout'];
			} else {
				$data['meta']['content_layout'] = $this->settings['content_layout'];
			}
		}
		$content_source = 'assets/layout/' . $data['meta']['content_layout'] . '.html';
		$data['meta']['content_source'] = $content_source;
        // Customizer
		if(!isset($data['meta']['customizer'])) {			
			if (isset($this->config['customizer'])) {
				$data['meta']['customizer'] = $this->config['customizer'];
			} else {
				$data['meta']['customizer'] = $this->settings['customizer'];
			}
		}
		
        // Convert untyped content pages to 'simple'		
		if (!isset($data['meta']['content_type'])) $data['meta']['content_type'] = 'simple';

    }	

   	public function render($data, $action, $status = '200') {
		// set the appropriate headers
		$codes = array(
			'200' => 'OK',
			'500' => 'Internal Server Error',
			'404' => 'Not Found'
			);
		header($_SERVER['SERVER_PROTOCOL'].' '.$status.' '.$codes[$status]);
		header("Content-Type: text/html; charset=UTF-8");

        $this->action = $action;
        return;
    }   
}
