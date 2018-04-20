<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 *
 * @package	CodeIgniter
 * @author	Benjamín García
 * @copyright	''
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	''
 * @since	Version 1.0.0
 */


/**
 * Info images Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Benjamín García
 */

// ------------------------------------------------------------------------

if ( ! function_exists('send_email'))
{
	function send_email($param = array())
	{
		$CI =& get_instance();
		$CI->load->library('parser'); //load parser library
		$CI->load->database(); //load database library

		$data = array(

      		'web' => 'www.creamerito.com',
      		'company' => 'CREAMERITO',
			'email' => 'soporte@creamerito.com',
			'title' => $param['title'],
			'h1' => $param['h1'],
			'banner' => $param['banner'],
			'button' => $param['button'],
			'link' => $param['link'],
			'primary_color' => '#4BBDBD',
			'secondary_color' => '#000',
			'tamplate_db' => $param['tamplate_db']

            );

		$data['body'] = '';

		$aux = explode('|', $param['body']);// if the string content '|' it's convert in an array();

		foreach ($aux as $key => $value)
		{
			//initialicer $query to FALSE
			$query = FALSE;
			//if tamplate_db = ture
			if( $data['tamplate_db'] )
				$query = $CI->db->get_where('email_template', array('name' => $value));//consult the table and returns a result of the body load

			if ($query)
			{
				$data['body'] .= $query->row()->content;
			}
			else
			{
				$data['body'] .= $value;//if consult no result, load the text.
			}
		}

		$message = $CI->parser->parse('email/email', $data,TRUE); //load and parse data and draw email templatre to send

		if(!$param['print'])
		{

			if($param['ftn'] == 'ci')
			{
				return codeigniter_email($param,$message);

			}elseif($param['ftn'] == 'php')
			{
				return php_email($param,$message);
			}

		}else
		{
			echo $message;
		}

	}
}

if ( ! function_exists('codeigniter_email'))
{
	function codeigniter_email($param = array(),$message)
	{
		$CI =& get_instance();
		$CI->load->library('email'); //load email library

		$config = Array(

					'protocol' => 'smtp',
			        'smtp_host' => 'smtp.creamerito.com',
			        'smtp_port' => '587',
			        'smtp_user' => 'soporte@creamerito.com',
			        'smtp_pass' => '&4222SFcrb',
			        'mailtype'  => 'html',
			        'wordwrap'  => TRUE,
			        'charset' => 'utf-8'

				    );

		$CI->email->initialize($config);
		$CI->email->set_newline("\r\n");
		$CI->email->from('soporte@creamerito.com','CREAMERITO');
		$CI->email->subject($param['subject']);
		$CI->email->message($message);
		$CI->email->to($param['to']);
		if($param['cc']){ $CI->email->cc($param['cc']);}
		if($param['bcc']){ $CI->email->bcc($param['bcc']);}

		if($param['debugger'])
		{

			if (!$CI->email->send())
			{
			   echo $CI->email->print_debugger();
			   return FALSE;
			}

		}else
		{
			$CI->email->send();
		}
	}
}

if ( ! function_exists('php_email'))
{
	function php_email($param = array(),$message)
	{
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "From: Uniformall<no-reply>\r\n";
		$headers .= "Return-path: Uniformall\r\n";

		if($param['cc'])
		{
			$headers .= "Cc: ".$param['cc']."\r\n";
		}

		if($param['bcc'])
		{
			$headers .= "Bcc: ".$param['bcc']."\r\n";
		}

		if(mail($param['to'],$param['subject'],$message,$headers))
		{
			return TRUE;

		}else
		{
			return FALSE;
		}
	}
}

/* End of file my_send_email_helper.php */
/* Location: helpers/my_send_email_helper.php */
