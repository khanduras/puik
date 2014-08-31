<?php
/**
 * Plugin class
 *
 * PuikManager works with puik theme and twig to integrate UI Kit http://getuikit.com
 * Adds Navbar, Sidebar, Footer Layouts
 *
 **/
namespace Phile\Plugin\Khanduras\PuikSearch;

/**
 * @author  Daniel James
 * @link    https://github.com/khanduras/puik
 * @license http://opensource.org/licenses/MIT
 * @package Phile\Plugin\khanduras\puikSearch
 */
class Plugin extends \Phile\Plugin\AbstractPlugin implements \Phile\Gateway\EventObserverInterface {
	// $this->settings will be filled with the data from the config.php file from the plugin folder
	// var_dump($this->settings);
	//
	/**
	 * global variables can be accessed with $this->variable;
	 **/
	
	private $config;
	
	//
	/**
	 * the constructor
	 * register events you wish to make use of and initialize variables
	 */
	public function __construct() {
        \Phile\Event::registerEvent('request_uri', $this);
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
	
	    if ($eventKey == 'request_uri') {
			$uri = explode('/', $data['uri']);
			if($uri[0] == 'query') $this->do_search();  
			return;       
		}
	}
	
    public function get_search_results($search_field) {
		$json = array(
			"results" => array(
				array(
					"title" => "Google",
					"url" => "http://google.com",
					"text" => "A large search engine"),
				array(
					"title" => "Microsoft",
					"url" => "http://microsoft.com",
					"text" => "Devices and Services company"),
				array(
					"title" => "Apple",
					"url" => "http://apple.com",
					"text" => "iPad, iPhone, Mac, iOS"),
				array(
					"title" => "IBM",
					"url" => "http://ibm.com",
					"text" => "Innovators of hardware and software")
			)
		);		
		return json_encode($json);
		//return file_get_contents('uikit_search.json');
	}
	
	public function do_search() {	
		if ((isset($_REQUEST['search'])) && (!empty($_REQUEST['search'])))
		{
			$search_field = $_REQUEST['search'];
			$json = $this->get_search_results($search_field);
			die($json);
		}
	}
	

}
