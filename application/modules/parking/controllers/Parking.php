<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parking  extends MX_Controller
{
	private $nameClass = null;
	private $class = null;
	private $nameModule = null;
	private $breadCrumbs = array();

	public function __construct()
	{
		parent::__construct();
		$this->nameClass = get_class($this);
		$this->class = 'm-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default';
		$this->nameModule = "Parking";
		//migas de pan
		$this->breadCrumbs = array('Parking');
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
		//pasamos los datos básicos a la vista
		$data = $this->data;
        $data['content'] = $data['view'] = strtolower(__FUNCTION__."_".$this->nameClass);
        $data['class'] = $this->class;
        //nombre del módulo principal, es que nombre que mostramos al usuario
        $data['nameModule'] = $this->nameModule;
        //migas de pan
        $data['breadCrumbs'] = $this->breadCrumbs;
        //id único de la pagina, todo en mayúsculas
        $data['reference'] = strtolower($this->nameClass);
        //obtenemos el mapa del parkin y lo pasamos a la vista
        $data['parkingMap'] = $this->doctrine->em->getRepository("Entities\\Parking")->getParkingMap(5);
        //cargamos la vista, en este caso es la del panel
        $this->load->view('layout',$data);
	}

}