<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home  extends MX_Controller
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
		$this->nameModule = "Panel";
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
        //cargamos la vista, en este caso es la del panel
        $this->load->view('layout',$data);
	}

}