<?php
if (!defined( 'BASEPATH')) exit('No direct script access allowed');
class Session
{
    private $CI;
    function __construct()
    {

        $this->CI =& get_instance();
		$this->CI->load->helper('url');

		if(!isset($this->CI->session))
		{

			$this->CI->load->library('session');
		}

    }

    public function check_login()
    {
       if($this->CI->uri->segment(1) != "login")
       {

       		if(!isset($this->CI->session->userdata['login']))
            {
                redirect('/login');

            }else{

                if(!$this->CI->session->userdata['login'])
                {
                    redirect('/');
                }
            }

	   }
    }

}
