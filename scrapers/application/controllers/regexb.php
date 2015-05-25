<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regexb extends CI_Controller {
	
	public function __construct()
	{
		
	}

	public function index()
	{	
		//$file = fopen("http://www.derbylane.com/EntriesResult/SP01-05-2011eRES.HTM", "r");
		//$file2 = fopen("http://www.derbylane.com/EntriesResult/SP01-05-2011eRES.HTM", "r");

		$file = fopen("http://localhost/sample24/", "r");
		$file2 = fopen("http://localhost/sample24/", "r");

		$count = 1;
		while (!feof($file)) {
			preg_match_all ("%^(Derby Lane)\s+([\w]+?)\s+([\w]{3}\s+[\d]{2}\s+[\d]{4})\s+([\w]+)\s+.+Grade\s+([\w])\s+\((\d{3})\)\s+Time:\s+(.*)$%", fgets($file), $raceinfo, PREG_SET_ORDER);
			preg_match_all ("%^([A-Za-z'\s]+)(\d{2}.?)\s+(\d)\s+(\d)\s+(\d)\s+([^A-Z]*)\s+([A-Z]{1}\w{1}.*)%", fgets($file2), $doginfo, PREG_SET_ORDER);
			
			
			//$file = fopen("file:///C:/Users/bem/Desktop/REGEX/1/24/Rosnet,Inc%20-%20Greyhound%20Racing.html", "r");
			//$file2 = fopen("file:///C:/Users/bem/Desktop/REGEX/1/24/Rosnet,Inc%20-%20Greyhound%20Racing.html", "r");
			/*if($raceinfo){
			print "<pre>";
			print_r($raceinfo);
			print "</pre>";
			}*/

			if($doginfo){
			print "<pre>";
			print_r($doginfo);
			print "</pre>";
			}
			/*
			foreach ($raceinfo as $val) {
				echo $count++ . "<br />";
				echo "Match: ". $val[0]."<br />";
				echo "Location: ". $val[1]."<br />";
				echo "Day: ". $val[2]."<br />";
				echo "Date: ". $val[3]."<br />";
				echo "Time of Day: ". $val[4]."<br />";
				echo "Grade: ". $val[5]."<br />";
				echo "Length: ". $val[6]."<br />";
				echo "Winning Time: ". $val[7]."<br /><br />";
				echo "<hr /><hr />";
			}

			foreach ($doginfo as $val2) {
				if (!strlen(strstr($val2[0], "Derby Lane"))>0) {
					// echo "Dog Info: ". $val2[0]."<br />";
					echo "Name: ". $val2[1]."<br />";
					echo "Weight: ". $val2[2]."<br />";
					echo "Post Position: ". $val2[3]."<br />";
					echo "Order Leaving Box(off): ". $val2[4]."<br />";
					echo "Position at Break: ". $val2[5]."<br />";
					
					$restOfNums = preg_replace("%\s+%", " ", $val2[6]);
					$restOfNums = explode(" ", $restOfNums);
					if (count($restOfNums) == 6) {
						echo "Break Lead: ". $restOfNums[0] . "<br />";
						echo "Position at Stretch: ". $restOfNums[1] . "<br />";
						echo "Position Dog Finished: ". $restOfNums[2] . "<br />";
						echo "Seconds to Complete Race: ". $restOfNums[3] . "<br />";
						echo "Final Odds: ". $restOfNums[4] . "<br /><br />";
						echo "<hr />"; } else { echo "Break Lead: ". $restOfNums[0] . "<br />";
						echo "Position at Stretch: ". $restOfNums[1] . "<br />";
						echo "Stretch Lead: ". $restOfNums[2] . "<br />";
						echo "Position Dog Finished: ". $restOfNums[3] . "<br />";
						echo "Finish Lead: ". $restOfNums[4] . "<br />";
						echo "Seconds to Complete Race: ".$restOfNums[5] . "<br />";
						echo "Final Odds: ". $restOfNums[6] . "<br /><br />";
						echo "<hr />";
					} 
				} 
			}*/
		}
		
		//print_r($file);

		fclose($file);
		fclose($file2); 
		exit(); 
	}

	public function code()
	{
		
	}
	
}





/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */