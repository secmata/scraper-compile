<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compile extends CI_Controller {

	private $url = "";

	public function __construct()
	{
		parent::__construct();
		$this->load->library('lib_curl');
		$this->load->library('lib_crawler');
		$this->load->library('lib_scraper');

		$this->url = "http://www.lazada.com.ph/catalog/?q=shoes";
	}

	public function index()
	{
		$this->destroy();
		$contents = $this->curl($this->url);
		//echo $contents;
		//$this->crawler($contents);
		//echo 'ok';
		$this->scraper_get_item_data($contents);
		//$host = explode('.', $_SERVER['HTTP_HOST']);
		//print_r($host);
	}

	public function curl($url){
		$contents = $this->lib_curl->get_contents($url);
		return $contents;
	}

	public function crawler($contents){
		$links = $this->lib_crawler->get_links($this->url, $contents);

		/*
		echo "<br>----------------------------------------------------------<br>";
		foreach ($links as $page) {
			$contents = $this->curl($page);
			$this->lib_crawler->get_links($page, $contents);
		}*/

		return $links;
	}

	public function scraper_get_item_data($contents){
		//header('content-type: text/plain');
		$item_data = $this->lib_scraper->get_item_data($contents);
	}
	

	public function destroy(){
		if(isset($_SESSION)){
			session_destroy();
		}

		$host = explode('.', $_SERVER['HTTP_HOST']);

		while ($host) {
		    $domain = '.' . implode('.', $host);

		    foreach ($_COOKIE as $name => $value) {
		        setcookie($name, '', 1, '/', $domain);
		    }

		    array_shift($host);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */