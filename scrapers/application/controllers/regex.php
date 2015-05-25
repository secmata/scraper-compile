<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regex extends CI_Controller {

	//private $url = '';
	
	public function __construct()
	{
		
	}

	public function index()
	{	
		//echo 'ok';
		$randomArray = array("Derek", "123 Main St.", "PA", "12345", "(412)-537-5555",
		"12/12/1974", "dbanas123@gmail.com", "$1,234", "Turtle3Dove", "123-45-6789",
		"p* 1 ", "<p>Random Text</p>", "Mailman", "Mailwoman", "Jennifer", "Jenny",
		"Jen", "Doctor", "Doug", "dog");
	
		//print_r($randomArray);

		$matchName = preg_grep('%(?<=mail)woman%i', $randomArray);

		/*header('content-type: text/plain');
		preg_match_all("%Do[^g|ug]\w+%", "Doctor Doug dog", $matches);
		print_r($matches);*/

		foreach ($matchName as $result) {
			echo $result, "<br /><br />"; 
		}

		//echo "<br /><br />";
	}

	public function code(){
		$randStr = "Dick and Jane fetched a bucket of water";
		$chairPpl = "John Thompson (CEO) Mark Summers (CFO) Betty Wu (CTO)";
		//echo preg_replace("%Dick%", "Paul", $randStr);
		//echo str_replace("Jane", "Erica", $randStr);

		//echo substr($randStr, 9, 4);
		//echo strpos($randStr, "fetched");

		$noTitle = preg_split("%\s\(.{3}\)\s?%", $chairPpl);

		foreach ($noTitle as $found) {
			echo $found . "<br />";
		}

		echo strlen($chairPpl) . "<br /><br />";

		$strOne = "Doctor Jay";
		$strTwo = "Doctor jay";
		$strThree = "he went there";

		echo strcmp($strOne, $strTwo) . "<br /><br />";
		echo strcasecmp($strOne, $strTwo) . "<br /><br />";

		echo ucfirst($strThree) . "<br /><br />";
		echo ucwords($strThree) . "<br /><br />";
		echo strtolower($strThree) . "<br /><br />";
		echo strtoupper($strThree) . "<br /><br />";

		$htmlText = "<head><title>My web page</title></head>";
		echo strip_tags($htmlText);

		//trim ltrim rtrim 
		//php_strip_whitespace(filename)
	}
	
}

// \d{5} // digit
// \w*\b\d\s$  
// ^<.*>(.*)<.*>$ // tags
// Je[n|nnifer|nny] // or
// ^Do[^g|ug]\w+ //not or 
// ^\d{1,5}\s[A-Za-z.]+\s[A-Za-z.]{2,7} //addres
// [A-Za-z0-9._\%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4} //email
// \(?[0-9]{3}\)?-?[0-9]{3}[-. ]?[0-9]{4} //phone number
// (0?[1-9]|[12][0-9]|3[01])[-/.](0?[1-9]|[12][0-9]|3[01])[-/.](19|20)?[0-9]{2} //date
// \A(?=[-_a-zA-Z0-9]*?[A-Z])(?=[-_a-zA-Z0-9]*?[a-z])(?=[-_a-zA-Z0-9]*?[0-9])\S{6,10}  //password
// '%^mail(?!woman)%i //if not
// %(?<=mail)woman%i // if equal



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */