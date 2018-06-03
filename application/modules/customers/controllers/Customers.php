<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers  extends MX_Controller
{
	private $nameClass = null;
	private $class = null;
	private $nameModule = null;
//	private $customerid = 0;
	private $breadCrumbs = array();
	private $tableTh = array();//configura la cabecera de las tablas

	public function __construct()
	{
		parent::__construct();
		$this->nameClass = get_class($this);
		$this->class = 'm-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default';
		$this->nameModule = "Clientes";
		$this->breadCrumbs = array('Clientes');
		$this->load->helper('payments_control_helper');
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
		//cargamos las migas de pan en form de array, metemos tantos items como sean necesarios
		//$this->breadCrumbs = array('caca','coco');
		//pasamos los datos básicos a la vista
		$data['lang'] = "es";
        $data['title'] = "Mundo Caravanas | Intranet";
        $data['robots'] = "noindex, follow";
        $data['typeLayout'] = "panel";
        $data['content'] = $data['view'] = strtolower(__FUNCTION__."_".$this->nameClass);
        $data['class'] = $this->class;
        //nombre del módulo principal, es el nombre que mostramos al usuario
        $data['nameModule'] = $this->nameModule;
        //migas de pan
        $data['breadCrumbs'] = $this->breadCrumbs;
        //id único de la pagina, todo en minúsculas
        $data['reference'] = strtolower($this->nameClass);
        //pasamos la configuración de la cabecera de la tabla
        $data['tableTh'] = $this->tableTh;
        //Obtenemos todos los datos de la tabla
        $data['getResult'] = $this->doctrine->em->getRepository("Entities\\Customers")->findAll();
        //cargamos la vista, en este caso es la del panel
        $this->load->view('layout',$data);
	}

	public function add()
	{
		//añadimos a las migas de pan la sección donde nos encontramos actualmente
		array_push($this->breadCrumbs, "Nuevo cliente");
		//pasamos los datos básicos a la vista
		$data = $this->data;
		//pasamos los datos básicos a la vista
        $data['content'] = strtolower(__FUNCTION__."_".$this->nameClass);
        $data['view'] = strtolower(__FUNCTION__."_".$this->nameClass);
        //migas de pan
        $data['breadCrumbs'] = $this->breadCrumbs;
        //comprobamos formulario submit
        $this->validationSubmit();
        //cargamos la vista, en este caso es la del panel
        $this->load->view('layout',$data);
	}

	public function edit($id = 0)
	{
		//añadimos a las migas de pan la sección donde nos encontramos actualmente
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
        //pasamos el id
        $data['id'] = $id;
        //colección de tablas de submódulos
        $data['vehicles'] = $this->_secundaryTable($id);
        //comprobamos formulario submit
		$this->validationSubmit($id);
        //cargamos la vista, en este caso es la del panel
		$this->load->view('layout',$data);
		
	}

	private function validationSubmit($id = 0){
		if( isset($_POST['submit-form']) ) {
        	//validamos los datos
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('surname', 'Apellidos', 'required');
            $this->form_validation->set_rules('nif', 'NIF', 'required|exact_length[9]');
            $this->form_validation->set_rules('zip', 'CP', 'required|exact_length[5]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('address', 'Dirección', 'required');
			$this->form_validation->set_rules('EntranceRegister', 'Alta en puerta', 'numeric|max_length[4]');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            //si el formulario es correcto
            if ($this->form_validation->run())
            {
            	//llamamos al nmétodo que controla la acción de add y edit
            	$this->_setAndGetData($id);

            }
        }
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
	private function _setAndGetData($id)
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
		//seteamos los datos
		$item->setName($this->input->post('name'));
		$item->setSurname($this->input->post('surname'));
		$item->setNif($this->input->post('nif'));
		$item->setPhonePrimary($this->input->post('phone_primary'));
		$item->setPhoneSecond($this->input->post('phone_second'));
		$item->setEmail($this->input->post('email'));
		$item->setAddress($this->input->post('address'));
		$item->setZip($this->input->post('zip'));
		$item->setEntranceRegister($this->input->post('EntranceRegister'));
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
	//este metodo devuelve la tabla del submódulo vehicles
	private function _secundaryTable($id)
	{

		//configuración tabla vehicles
		$data['tableTh'] = array(

							'Id' => '#',
							'VehicleTypes' => 'Tipo',
							'VehicleBrands' => 'Marca',
							'Model' => 'Modelo',
							'Year' => 'Año', 
							'LicensePlate' => 'Matrícula',
							'Parking' => 'Plaza',
							'DischargeDate' => 'Alta'
						);
		//lista de get para los objetos
		$data['keyObj'] = array(

							'VehicleTypes' => 'Name',
							'VehicleBrands' => 'Name',
							'Parking' => 'Number'
						);

		//obtenemos y pasamos a la vista los datos
        $data['getResult'] = $this->doctrine->em->getRepository("Entities\\Vehicles")->findBy(["customer" => $id]);
        $data['modal'] = site_url('customers/');
        $data['nameModule'] = $this->nameModule . '/vehiculos';
		$data['image'] = true;
		$data['adminPay'] = true;
        $data['id'] = $id;
        $data['title'] = 'Vehículo';
		//devolvemos la tabla
		return $this->load->view("resources/table",$data,true);
	}

	public function getForm()
	{
		//si es un request ajax, en caso contrario 404
		if ( $this->input->is_ajax_request() ) {
		   	//almacenamos el id del cliente para relacionarlo con el vehículo
		   	$data['id'] = $this->input->post('id');
		   	$formType = $this->input->post('form_type');
		   	//Obtenemos los tipos de vehículos
        	$data['getVehiclesTypes'] = $this->doctrine->em->getRepository("Entities\\VehicleTypes")->findAll();
        	//Obtenemos todas las márcas
        	$data['getVehiclesBrands'] = $this->doctrine->em->getRepository("Entities\\VehicleBrands")->findAll();
        	//Obtenemos todos los parking abiertos
        	$data['getParking'] = $this->doctrine->em->getRepository("Entities\\Parking")->findBy(["state" => "0"]);
        	//obtenemos los formatos de pago
        	$data['getPayTypes'] = $this->doctrine->em->getRepository("Entities\\Paytypes")->findAll();
        	//comprobamos si el tipo de formulario es igual a edit, si es el caso pasamos los datos del vehículo que vamos
        	//a editar.
        	if( $formType == "edit" )

        		$data['getRow'] = $this->doctrine->em->find("Entities\\Vehicles", $data['id']); 
        	
		   	//pasamos el formulario para dibujarlo en el modal
			echo $this->load->view("partials/form_vehicle_".$formType,$data,true);

		}else{

			show_404();
		}
		
	}
	//método para añadir veículo, donde el id hace referencia al id de customer 
	//en la tabla customer
	public function setVehicle($id = 0) {
		if( $id > 0 ) {
			//instaciamos la entidad Vehicles
			$vehicle = new Entities\Vehicles;

			//buscamos el parking y cambiamos su estado a 1 para cerrar esa plaza.
			$parking = $this->doctrine->em->find("Entities\\Parking", $this->input->post('parking'));

			//obtenemos las id's
			$customer = $this->doctrine->em->find("Entities\\Customers", $id);
			$vehicletype = $this->doctrine->em->find("Entities\\VehicleTypes", $this->input->post('vehicle_types'));
			$vehiclebrand = $this->doctrine->em->find("Entities\\VehicleBrands", $this->input->post('vehicle_brands'));
			$payType = $this->doctrine->em->find("Entities\\Paytypes", $this->input->post('paytype_id'));

			//seteamos los datos
			$vehicle->setCustomer($customer);
			$vehicle->setParking($parking);
			$vehicle->setVehicleTypes($vehicletype);
			$vehicle->setVehicleBrands($vehiclebrand);
			$vehicle->setYear($this->input->post('year'));
			$vehicle->setLicensePlate($this->input->post('license_plate'));
			$vehicle->setModel($this->input->post('model'));
			$vehicle->setVin($this->input->post('vin'));
			$vehicle->setPayMethod($this->input->post('pay_method'));
			$vehicle->setPaytype($payType);

			//guardamos datos para vehiculos
			$this->doctrine->em->persist($vehicle);
			$this->doctrine->em->flush();

			//guardamos datos para parking
			$vehicleId = $vehicle->getId();
			$parking->setState(1);
			$parking->setVehicleId($vehicleId);
			$this->doctrine->em->flush();

			//redireccionamos
	        redirect(strtolower($this->nameModule.'/edit/'.$id));

		}else{

			show_404();
		}		
	}



	//método para editar vehículo donde el id hace referencia 
	//al id del vehículo en la tabla vehículo
	public function editVehicle($id = 0)
	{
		if( $id > 0 ) {

			//realizamos una consulta pasando el id para obtener el item que vamos a editar
			$vehicle = $this->doctrine->em->find("Entities\\Vehicles", $id);

			//verificamos si cambió o no el parking para abrir la antigua y cerrar la nueva
			$parking_new = $this->input->post('parking');
			if ($vehicle->getParking() != $parking_new) {
				$parking_old = $this->doctrine->em->find("Entities\\Parking", $vehicle->getParking());
				$parking_old->setState(0);
				$parking_old->setVehicleId(0);
			}

			//obtenemos las id's
			$customer = $this->doctrine->em->find("Entities\\Customers", $vehicle->getCustomer());
			$parking = $this->doctrine->em->find("Entities\\Parking", $parking_new);
			$payType = $this->doctrine->em->find("Entities\\Paytypes", $this->input->post('paytype_id'));

			//cerramos el parking
			$parking->setState(1);
			$parking->setVehicleId($id);
			$vehicletype = $this->doctrine->em->find("Entities\\VehicleTypes", $this->input->post('vehicle_types'));
			$vehiclebrand = $this->doctrine->em->find("Entities\\VehicleBrands", $this->input->post('vehicle_brands'));

			//Guardamos la id del cliente para la redirección
			$customerId = $customer->getId();
			
			//seteamos los datos
			$vehicle->setCustomer($customer);
			$vehicle->setParking($parking);
			$vehicle->setVehicleTypes($vehicletype);
			$vehicle->setVehicleBrands($vehiclebrand);
			$vehicle->setPaytype($payType);
			$vehicle->setYear($this->input->post('year'));
			$vehicle->setLicensePlate($this->input->post('license_plate'));
			$vehicle->setModel($this->input->post('model'));
			$vehicle->setVin($this->input->post('vin'));
			$vehicle->setPayMethod($this->input->post('pay_method'));

			//guardamos
			$this->doctrine->em->flush();
		
			//redireccionamos
	        redirect(site_url(strtolower($this->nameModule) . '/edit/' . $customerId));

		}else{

			show_404();
		}
	}
	//método para borrar el vehículo, donde id hace referencia 
	//al id del vehículo en la tabla vehículo, recuerda que para
	//borrar un vehículo hay que borrar toda la documentoación del mismo
	public function deleteVehicle($id)
	{
		if( $id > 0 ) {

			//obtenemos el dato mediante id
	        $getRow = $this->doctrine->em->find("Entities\\Vehicles", $id);

	        //abrimos el parking
	        $parking = $this->doctrine->em->find("Entities\\Parking", $getRow->getParking()->getId());
			$parking->setState(0);
			$parking->setVehicleId(0);

	        //Guardamos la id del cliente para la redirección
			$customerId = $getRow->getCustomer()->getId();

	        //eliminamos el item
	        $this->doctrine->em->remove($getRow);
	        $this->doctrine->em->flush();
	        //redireccionamos
	        redirect(site_url(strtolower($this->nameModule) . '/edit/' . $customerId));

		}else{

			show_404();
		}
	}
	//método que devuelve una consulta desde ajax la tabla con 
	//los doc que están vinculados al vehículo
	public function getDocList()
	{
		//si es un request ajax, en caso contrario 404
		if ( $this->input->is_ajax_request() ) {
		   	//almacenamos el id del vehículo
		   	$data['id'] = $this->input->post('id');
		   	$data['getResult'] = $this->doctrine->em->getRepository("Entities\\Attachments")->findBy(["tableAttachment" => "VEHICLES","rowId" => $data['id']]);
			echo $this->load->view("partials/doc_table",$data,true);

		}else{

			show_404();
		}
	}
	//muestra el archivo seleccionado
	public function showDoc($id = 0)
	{
		if( $id > 0 ) {

			//obtenemos el nombre del archivo
	        $doc = $this->doctrine->em->find("Entities\\Attachments", $id);
	        //mostramos el archivo al usuario
	        echo '<img src="'.base_url('assets/app/media/img/docs/'.$doc->getAttached()).'">';

		}else{

			show_404();
		}
	}

	//método para agregar una archivo
	public function addDoc($id = 0)
	{
		if ($id > 0)
		{
			//obtenemos el nombre del input file.
			$imgDoc = array_shift(array_keys($_FILES));
			//creamos las reglas para aceptar el archivo
			$config = array (
				'upload_path' => './assets/app/media/img/docs/',
				'allowed_types' => 'png|jpeg|jpg',
			);
			//cargamos la libreria para subir archivos
			$this->load->library('upload', $config);
			//comprobamos si se realizó correctamente
			if (!$this->upload->do_upload($imgDoc))
			{
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			}
			else
			{
				//obtenemos los datos del archivo subido
				$data =  $this->upload->data();
				//añadimos el archivo a la DB
				$doc = new Entities\Attachments;
				$doc->setName($this->input->post('name'));
				$doc->setAttached($data['file_name']);
				$doc->setTableAttachment('VEHICLES');
				$doc->setRowId($id);
				//obtenemos el objeto del vehiculo
				$vehicle = $this->doctrine->em->find("Entities\\Vehicles", $id);
				$this->doctrine->em->persist($doc);
				$this->doctrine->em->flush();
			}
			//redireccionamos
			redirect(site_url(strtolower($this->nameModule)).'/edit/'.$vehicle->getCustomer()->getId());
			

		}else{
				show_404();
		}
	}

	//método para borrar el archivo seleccionado
	public function deleteDoc($id = 0)
	{
		if( $id > 0 ) {

			//obtenemos el nombre del archivo
	        $doc = $this->doctrine->em->find("Entities\\Attachments", $id);
	        //obtenemos el objeto vehículo
	        $vehicle = $this->doctrine->em->find("Entities\\Vehicles", $doc->getRowid());
	        //eliminamos el item
	        $this->doctrine->em->remove($doc);
	        $this->doctrine->em->flush();
			//redireccionamos
	        redirect(site_url(strtolower($this->nameModule)).'/edit/'.$vehicle->getCustomer()->getId());

		}else{

			show_404();
		}
	}
	//método que devuelve una lista con los pagos del vehículo
	public function getCollectionPay()
	{
		//si es un request ajax, en caso contrario 404
		if ( $this->input->is_ajax_request() ) {

			//pasamos el formulario para dibujarlo en el modal
			echo $this->load->view("partials/collection_pay",true);

		}else{

			show_4040();
		}
	}

}