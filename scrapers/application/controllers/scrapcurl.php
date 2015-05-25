<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scrapcurl extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
        $this->load->library('lib_curl');
	}

	public function index(){
		$url = "http://www.lazada.com.ph/catalog/?q=shoes";
		$curl_scraped_page = $this->curl($url);
		echo $curl_scraped_page;
	}

	public function curl($url){

		// Assigning cURL options to an array
		$options = Array(
			CURLOPT_RETURNTRANSFER => TRUE, // Setting cURL's option to return the webpage data
			CURLOPT_FOLLOWLOCATION => TRUE, // Setting cURL to follow location HTTP headers
			CURLOPT_CONNECTTIMEOUT => 120, // Setting the amount of time(in seconds) before the request time out
			CURLOPT_TIMEOUT => 120, // Setting the maximum amount of time for cURL to execute queries
			CURLOPT_MAXREDIRS => 10, // Setting the maximum number of redirections to follow
			CURLOPT_USERAGENT => $this->lib_curl->random_user_agent(), // Setting the useragent
			CURLOPT_URL => $url, // Setting cURL's URL's URL option with the $url variable passed into the function
		);

		$ch = curl_init(); //Initialising cURL
		curl_setopt_array($ch, $options); //Setting cURL's options the previously assigned data in $option
		$data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
		//curl_close($ch);  // Closing cURL
		return $data; // Returning the data from the function

	}

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */