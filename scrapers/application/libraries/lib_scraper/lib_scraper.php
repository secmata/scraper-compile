<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Lib_scraper{

	/**
     * CodeIgniter global
     *
     * @var string
     **/
    protected $ci;
  

    /**
     * __construct
     *
     * @return void
     * @author Gifford
     **/
    public function __construct(){
   
    }

    public function get_item_data($contents){
       /*
        $regex = '%<a\s.*class="product-card.*>(.|\n)+data-sku-simple%';
        preg_match_all($regex, $contents, $matches);
    
    
        
        
        
        echo "<pre>";
        print_r($matches);
        //echo "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>";
        //*/
        //return $this->array_link;

      
       
        $regex = '%<a\s+href="(.|\n)+"\sclass=".+">\d+</a>%';
        preg_match_all($regex, $contents, $matches);
    
        echo "<pre>";
        print_r($matches[1]);
        echo "</pre>";
    } 

    public function sample(){
        return 'sample';
    }

}/* End of file lib_curl.php */
/* Location: ./application/libraries/lib_curl.php */