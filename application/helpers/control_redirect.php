<?php
if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 
class Control_redirect
{
    private $CI;
    function __construct()
    {
    	
        $this->CI =& get_instance();
		$this->CI->load->helper('url');
		$this->CI->load->model('Main_model');
		
		if(!isset($this->CI->session))
		{
			
			$this->CI->load->library('session');
		}
        
    }    
 
    public function redirect()
    {
    	
		if(count($this->CI->Main_model->get_languages() > 1))
       	{
    	
	       if($this->CI->uri->segment(1) == "")
	       {
	
		        redirect('/es');
			
		   }
		   
		}
    }

}