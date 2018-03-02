<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login  extends MX_Controller
{
	
	private $nameClass = null;
    private $class = null;

	public function __construct()
	{
		parent::__construct();
		//cargamos el helper para ayudarnos a la encriptación en caso necesario
		$this->load->helper('MY_encrypt_helper');
        $this->load->helper('generate_pass_helper');
		$this->nameClass = get_class($this);
        $this->class = 'm--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default';

	}

	public function index()
	{
		$data['lang'] = "es";
        $data['title'] = "Mundo Caravanas | Intranet";
        $data['robots'] = "noindex, follow";
        $data['typeLayout'] = "login";
        $data['content'] = $data['view'] = strtolower(__FUNCTION__."_".$this->nameClass);
        $data['class'] = $this->class;
        //mensajes para el usuario una vez validado el formulario  
        $data['msn'] = "";
        //Comprobamos que se ha realizado submit con el formulario
        if(isset($_POST['submitLogin']))
        {
        	//validamos los campos
        	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        	$this->form_validation->set_rules('pass', 'Contraseña', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            //comprobamos que la validación es correcta
            if ($this->form_validation->run())
            {
            	//almacenamos el email y la contraseña
	        	$email = $this->input->post('email');
	        	$pass = $this->input->post('pass');
	        	//consultamos la entidad Usuarios, toamendo emial como clave y @email como valor
	        	$usuario = $this->doctrine->em->getRepository("Entities\\Usuarios")->findOneBy(["email" => $email]);
	        	//si @usuarios es distinto de null, entonces comprobamos si el pass pasado desde el formulario es correcto
	        	if($usuario)
	        	{
	        		//si el usuario existe, comprobamos si la contrasela es correcta
	        		if(password_verify($pass, $usuario->getPass()))
                    {
                    	//si la contraseña es correcta, creamos la sesión del usuario
                    	$session_data['login'] = TRUE;
                    	$session_data['name'] = $usuario->getRazonsocial() ;
                    	$session_data['id'] = $usuario->getId();
                        $session_data['email'] = $usuario->getEmail();
                        $session_data['rol'] = $usuario->getRol();
                        $this->session->set_userdata($session_data);
                        //y redireccionamos al HOME de la app
                        redirect('/');
                    	
                    }else{
                    	//mensaje que mostramos si la contraseña no es correcta
                    	$data['msn'] = '<div class="alert alert-danger" role="alert">La contrasña con la que intentas acceder es correcta</div>';
                    }


	        	}else{
	        		//mensaje que mostramos al usuario si el usuario no es corrector
	        		$data['msn'] = '<div class="alert alert-danger" role="alert">El usuario con el que intentas acceder no existe</div>';
	        	}

            }

        	
        }
		//cargamos la vista, en este caso es la de login
        $this->load->view('layout',$data);
	}

    public function passwordRecovery() 
    {

        if( $this->input->is_ajax_request() )
        {
            //recuperamos el email
            $email = $this->input->post('email');
            //generamos una nueva contraseña
            $pass = generate_password();
            //enviamos el email con la nueva contraseña
            echo 'Se ha creado una nueva contraseña, por favor revisa tu correo.';

        }else
        {
            show_404();
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        redirect('/');
    }

}