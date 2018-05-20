<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers  extends MX_Controller
{
	private $nameClass = null;
	private $class = null;
	private $nameModule = null;
	private $breadCrumbs = array();
	private $tableTh = array();//configura la cabecera de las tablas

	public function __construct()
	{
		parent::__construct();
		$this->nameClass = get_class($this);
		$this->class = 'm-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default';
		$this->nameModule = "Clientes";
		$this->breadCrumbs = array('Clietnes');
		/*
			Este vector nos ayuda a dibujar la tabla con los resultados de la consutla de todos los item
			para ellos es obligatortio el campo Id, además las claves que preceden al valor, tienen que
			ser nombradas tal cual estan el los geter de las entidad correspondiente a la consulta, hay que
			tener en cuenta que si esta tiene realiones, tendremos que consultar los nombres de los geter
			en la tabla en cuestión.
		*/
		$this->tableTh = array(

								'Id' => '#',
								'Name' => 'Nombre',
								'Surname' => 'Apellidos',
								'Nif' => 'NIF',
								'PhonePrimary' => 'Teléfono',
								'DischargeDate' => 'Alta'
							);
		//datos básicos
		$this->data = array(
								
							'lang' => 'es', 
							'robots' => 'noindex, follow',
							'typeLayout' => 'panel',
							'title' => 'Mundo Caravanas | Administración Parking',
							'class' => $this->class,
							'nameModule' => $this->nameModule,//nombre del módulo principal, es que nombre que mostramos al usuario
						);

	}

	public function index()
	{
		//cargamos las migas de pan en form de array, metemos tantos intem como sean necesarios
		//$this->breadCrumbs = array('caca','coco');
		//pasamos los datos básicos a la vista
		$data['lang'] = "es";
        $data['title'] = "Mundo Caravanas | Intranet";
        $data['robots'] = "noindex, follow";
        $data['typeLayout'] = "panel";
        $data['content'] = $data['view'] = strtolower(__FUNCTION__."_".$this->nameClass);
        $data['class'] = $this->class;
        //nombre del módulo principal, es que nombre que mostramos al usuario
        $data['nameModule'] = $this->nameModule;
        //migas de pan
        $data['breadCrumbs'] = $this->breadCrumbs;
        //id único de la pagina, todo en mayúsculas
        $data['reference'] = strtolower($this->nameClass);
        //pasamos la configuración de la cabecera de la tabla
        $data['tableTh'] = $this->tableTh;
        //Obtenemos dotos los datos de la tabla
        $data['getResult'] = $this->doctrine->em->getRepository("Entities\\Customers")->findAll();
        //cargamos la vista, en este caso es la del panel
        $this->load->view('layout',$data);
	}

	public function add()
	{
		//añadirmos a las migas de pan la sección donde nos encontramos actualmente
		array_push($this->breadCrumbs, "Nuevo cliente");
		//pasamos los datos básicos a la vista
		$data = $this->data;
		//pasamos los datos básicos a la vista
        $data['content'] = strtolower(__FUNCTION__."_".$this->nameClass);
        $data['view'] = strtolower(__FUNCTION__."_".$this->nameClass);
        //migas de pan
        $data['breadCrumbs'] = $this->breadCrumbs;
        //obtenemos los formatos de pago
        $data['getPayTypes'] = $this->doctrine->em->getRepository("Entities\\Paytypes")->findAll();
        //comprobamos formulario submit
        if( isset($_POST['submit-form']) ) {
        	//validamos los datos
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('surname', 'Apellidos', 'required');
            $this->form_validation->set_rules('nif', 'NIF', 'required|exact_length[9]');
            $this->form_validation->set_rules('zip', 'CP', 'required|exact_length[5]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('address', 'Dirección', 'required');
            $this->form_validation->set_rules('paytype_id', 'Forma de pago', 'required');
            $this->form_validation->set_rules('phone_primary', 'Teléfono', 'required|exact_length[9]');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            //si el formulario es correcto
            if ($this->form_validation->run())
            {
            	//llamamos al nmétodo que controla la acción de add y edit
            	$this->_setAndGetData();

            }
        }
        //cargamos la vista, en este caso es la del panel
        $this->load->view('layout',$data);
	}

	public function edit($id = 0)
	{
		//añadirmos a las migas de pan la sección donde nos encontramos actualmente
		array_push($this->breadCrumbs, "Editar cliente");
		//pasamos los datos básicos a la vista
		$data = $this->data;
		//pasamos los datos básicos a la vista
        $data['content'] = strtolower(__FUNCTION__."_".$this->nameClass);
        $data['view'] = strtolower(__FUNCTION__."_".$this->nameClass);
        //migas de pan
        $data['breadCrumbs'] = $this->breadCrumbs;
        //obtenemos y pasamos a la vista los datos
        $data['getResult'] = $this->doctrine->em->find("Entities\\Customers", $id);
        //obtenemos los formatos de pago
        $data['getPayTypes'] = $this->doctrine->em->getRepository("Entities\\Paytypes")->findAll();
        //pasamos el id
        $data['id'] = $id;
        //colección de tablas de submódulos
        $data['vehicles'] = $this->_secundaryTable($id);
        //comprobamos formulario submit
        if( isset($_POST['submit-form']) ) {
        	//validamos los datos
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('surname', 'Apellidos', 'required');
            $this->form_validation->set_rules('nif', 'NIF', 'required|exact_length[9]');
            $this->form_validation->set_rules('zip', 'CP', 'required|exact_length[5]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('address', 'Dirección', 'required');
            $this->form_validation->set_rules('paytype_id', 'Forma de pago', 'required');
            $this->form_validation->set_rules('phone_primary', 'Teléfono', 'required|exact_length[9]');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            //si el formulario es correcto
            if ($this->form_validation->run())
            {
            	//llamamos al nmétodo que controla la acción de add y edit
            	$this->_setAndGetData($id);

            }
        }
        //cargamos la vista, en este caso es la del panel
        $this->load->view('layout',$data);
	}

	public function delete($id = 0)
	{
		if( $id > 0 ){

			//obtenemos el dato mediante id
	        $getRow = $this->doctrine->em->find("Entities\\Customers", $id);
	        //eliminamos el item
	        $this->doctrine->em->remove($getRow);
	        $this->doctrine->em->flush();
	        //redireccionamos
	        redirect(site_url(strtolower($this->nameModule)));

		}else{

			show_404();
		}
	}
	//método para crear y editar los datos principales
	private function _setAndGetData($id = 0)
	{
		//comprobamos si el id es mayor o no a 0, si este es igual a 0
		//entendemos que lo que estamos es realizando un insert, si el mayor de 0
		//entendems que vamos a realizar una edición
		if( $id == 0 ) {
			//instanciamos la entidad
			$item = new Entities\Customers;

		}else {

			//realizamos una consulta pasando el id para obtener el item que vamos a editar
			$item = $this->doctrine->em->find("Entities\\Customers", $id);
		}
		//obtenemos el formato de pago seleccionado
		$payType = $this->doctrine->em->find("Entities\\Paytypes", $this->input->post('paytype_id'));
		//seteamos los datos
		$item->setName($this->input->post('name'));
		$item->setSurname($this->input->post('surname'));
		$item->setNif($this->input->post('nif'));
		$item->setPhonePrimary($this->input->post('phone_primary'));
		$item->setPhoneSecond($this->input->post('phone_secondary'));
		$item->setEmail($this->input->post('email'));
		$item->setAddress($this->input->post('address'));
		$item->setZip($this->input->post('zip'));
		$item->setPaytype($payType);
		$item->setState(1);
		//si no esta marcado estado
		if(!isset($_POST['state']))
			$item->setState(0);
		//si id es mayor de 0, es una add y por tanto hacemos persist
		if( $id == 0 )
			$this->doctrine->em->persist($item);

        $this->doctrine->em->flush();
        //finalmente realizamos la redirección al edit
        if( $id == 0 ) {

        	redirect(site_url(strtolower($this->nameModule).'/edit/'.$item->getId()));

        }else{

        	redirect(site_url(strtolower($this->nameModule).'/edit/'.$id));
        }
	}
	//este metodo devuelve la talba del submódulo vehicles
	private function _secundaryTable($id)
	{

		//configuración tabla vehicles
		$data['tableTh'] = array(

							'Id' => '#',
							'VehicleTypes' => 'Tipo',
							'VehicleBrands' => 'Marca',
							'Model' => 'Modelo',
							'LicensePlate' => 'Matrícula',
							'Parking' => 'Plaza',
							'DischargeDate' => 'Alta'
						);
		//lista de get para los objetos
		$data['keyObj'] = array(

							'VehicleTypes' => 'Name',
							'VehicleBrands' => 'Name',
							'Parking' => 'Id'
						);

		//obtenemos y pasamos a la vista los datos
        $data['getResult'] = $this->doctrine->em->getRepository("Entities\\Vehicles")->findBy(["customer" => $id]);
        $data['modal'] = 'hola';
        $data['image'] = true;
		//devolvemos la tabla
		return $this->load->view("resources/table",$data,true);
	}


}