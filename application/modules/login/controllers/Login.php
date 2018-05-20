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
        $data['title'] = "Mundo Caravanas | Login";
        $data['typeLayout'] = "login";
        $data['view'] = strtolower(__FUNCTION__."_".$this->nameClass);
        $data['content'] = strtolower(__FUNCTION__."_".$this->nameClass);
        $data['class'] = $this->class;
        //mensajes para el usuario una vez validado el formulario  
        $data['msn'] = null;
        //Comprobamos que se ha realizado submit con el formulario
        if(isset($_POST['submitLogin']))
        {
        	//validamos los campos
        	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        	$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[8]');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            //comprobamos que la validación es correcta
            if ($this->form_validation->run())
            {
            	//almacenamos el email y la contraseña
	        	$email = $this->input->post('email');
	        	$pass = $this->input->post('password');
                //echo encode_string($pass);
	        	//consultamos la entidad Usuarios, toamendo emial como clave y @email como valor
	        	$usuario = $this->doctrine->em->getRepository("Entities\\Users")->findOneBy(["email" => $email,"rol" => 1]);
	        	//si @usuarios es distinto de null, entonces comprobamos si el pass pasado desde el formulario es correcto
                if($usuario)
	        	{
	        		//si el usuario existe, comprobamos si la contrasela es correcta
	        		if(password_verify($pass, $usuario->getPassword()))
                    {
                    	//si la contraseña es correcta, creamos la sesión del usuario
                    	$session_data['login'] = TRUE;
                    	$session_data['name'] = $usuario->getName() ;
                    	$session_data['id'] = $usuario->getId();
                        $session_data['email'] = $usuario->getEmail();
                        $session_data['rol'] = $usuario->getRol();
                        $this->session->set_userdata($session_data);
                        //y redireccionamos al HOME de la app
                        redirect('/');
                    	
                    }else{
                    	//mensaje que mostramos si la contraseña no es correcta
                    	$data['msn'] = '<div class="alert alert-danger" role="alert">La contraseña con la que intentas acceder no es correcta</div>';
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

        $data['title'] = "Mundo Caravanas | Recuperar contraseña";
        $data['typeLayout'] = "login";
        $data['view'] = strtolower(__FUNCTION__."_".$this->nameClass);
        $data['content'] = strtolower(__FUNCTION__."_".$this->nameClass);
        $data['class'] = $this->class;
        $data['msn'] = null;
        //compobamos ....
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


        if ( $this->form_validation->run() == TRUE )
        {

            $email = $this->input->post('email');
            //comprobamos si existe el usuario
            $isUser = $this->doctrine->em->getRepository("Entities\\Users")->findOneBy(["email" => $email,"rol" => 1]);

            if( $isUser == null ) {

                $data['msn'] =  '<div class="alert alert-danger" role="alert">El usuario con el que intentas recuperar tu acceso no existe.</div>';

            }
            else
            {
                $this->load->helper('my_send_email_helper');
                $pass = generate_password();

                $body = '<strong>Has solicitado recuperar el acceso a tu cuenta en Mundo Caravanas</strong><br/>';
                $body .= 'Estos son tus datos de acceso<br/>';
                $body .= 'Email: '.$email.'<br/>';
                $body .= 'Contraseña: '.$pass.'<br/>';

                $config_e = array(

                                'ftn' => 'php',
                                'title' => 'Recuperar acceso Mundo Caravanas',
                                'body' => $body,
                                'h1' => 'Recuperar acceso Mundo Caravanas',
                                'banner' => null,
                                'button' => null,
                                'link' => '#',
                                'subject' => 'Recuperar acceso Mundo Caravanas',
                                'to' => $email,
                                'cc' => FALSE,
                                'bcc' => FALSE,
                                'print' => TRUE,
                                'debugger' => TRUE,
                                'tamplate_db' => FALSE
                            );

                $sendMail = send_email($config_e);
                //si el email fue enviado correctamente guardamos la nueva contraseña editando el campo pass
                //en caso contrario, no hacemos nada, y mostramos un error al usuario
                if( $sendMail ) {
                    //codificamos el pass
                    $pass = encode_string($pass);
                    //seteamos el datos
                    $isUser->setPassword($pass);
                    //guaramos
                    $this->doctrine->em->flush();
                    //y mostramos al usuario un mensaje de que todo fué bien, y que su nueva contraseña ha sido enviada.
                    $data['msn'] = '<div class="alert alert-warning" role="alert"> <strong>Hemos enviado un email con tu nueva contraseña.</strong> </div>';
                
                }else{

                    $data['msn'] =  '<div class="alert alert-danger" role="alert">En este momento tenemos problemas con el servidor y no es posible realizar la acción.</div>';
                }
            }

        }

        $this->load->view('layout', $data);

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