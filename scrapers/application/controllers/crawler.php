<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crawler extends CI_Controller {

	private $url = "";
	private $regexp = "";
	private $base_url = "";
	private $c = array();

	public function __construct()
	{
		$this->url = "https://bestspace.co";

		//http://www.the-art-of-web.com/php/parse-links/
		$this->regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
		
		$this->base_url = parse_url($this->url, PHP_URL_HOST);		
	}

	public function index(){
		$this->get_links($this->url);

		echo "<br>----------------------------------------------------------<br>";

		foreach ($this->c as $page) {
			$this->get_links($page);
		}

		echo "<br>----------------------------------------------------------<br>";

		foreach ($this->c as $page) {
			echo $page."<br />";
		}
	}

	public function get_links($url)
	{	
		$input = @file_get_contents($url);
		//echo $input;
		preg_match_all("/$this->regexp/siU", $input, $matches);
	
		//echo "<pre>";
		//print_r($matches[2]);
		//echo "</pre>";

		$l = $matches[2];

		foreach ($l as $link) {

			//remove #variable
			if(strpos($link, "#")){
				$link = substr($link, 0, strpos($link, "#"));
			}

			//remove .
			if(substr($link, 0, 1) == "."){
				$link = substr($link, 1);
			}

			if(substr($link, 0, 7) == "http://"){
				$link = $link;
			}else if(substr($link, 0, 8) == "https://"){
				$link = $link;
			}else if(substr($link, 0, 2) == "//"){
				$link = substr($link, 2);
			}else if(substr($link, 0, 1) == "#"){
				$link = $url;
			}else if(substr($link, 0, 7) == "mailto:"){
				$link = "[".$link."]";
			}else{
				if(substr($link, 0, 1) != "/"){
					$link = $this->base_url."/".$link;
				}else{
					$link = $this->base_url.$link; 
				}
			}

			if(substr($link, 0, 7) != "http://" && substr($link, 0, 8) != "https://" && substr($link, 0, 1) != "["){
				if(substr($url, 0, 8) == "https://"){
					$link = "https//".$link;
				}else{
					$link = "http//".$link;
				}
			}

			echo $link."<br />";
			if(!in_array($link, $this->c)){
				array_push($this->c, $link);
			}
		}
	}


}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */