<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Lib_crawler{

	/**
     * CodeIgniter global
     *
     * @var string
     **/
    protected $array_link = array();

    /**
     * __construct
     *
     * @return void
     * @author Gifford
     **/
    public function __construct(){
       
    } 

    //$input = @file_get_contents($url);
    // echo $input;

    public function get_links($url, $contents){
         $base_url = parse_url($url, PHP_URL_HOST);
       
        $regex = '%<a\s+href="(.+)"\sclass=".+">\d+</a>%';
        preg_match_all($regex, $contents, $matches);
    
        /*echo "<pre>";
        print_r($matches[1]);
        echo "</pre>";*/

        $l = $matches[1];

        foreach ($l as $link) {
            if(substr($link, 0, 1) != "/"){
                    $link = $base_url."/".$link;
            }else{
                    $link = $base_url.$link; 
            }

            if(substr($link, 0, 7) != "http://" && substr($link, 0, 8) != "https://"){
                if(substr($url, 0, 8) == "https://"){
                    $link = "https//".$link;
                }else{
                    $link = "http//".$link;
                }
            }

           // echo $link . "<br />";
            if(!in_array($link, $this->array_link)){
                array_push($this->array_link, $link);
            }


        }
        
        /*
        echo "<pre>";
        print_r($this->array_link);
        echo "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>";
        */
        return $this->array_link;
    }



    public function sample(){
        return 'sample';
    }

}/* End of file lib_curl.php */
/* Location: ./application/libraries/lib_curl.php */