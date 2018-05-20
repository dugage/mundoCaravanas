<?php
namespace Repositories;
use Doctrine\ORM\EntityRepository;

/**
 * Class MenuPanelRepositorio
 * @package Repositories

 */
class MenuPanelRepositorio extends EntityRepository
{

  /**
   * @var string
   */
  private $entity = "Entities\\MenuPanel";

  /**
   * @return array
   */
  /*
    El metodo getMenu(), será llamado desde el módulo login, donde si el acceso es ok, 
    editara un documento html con el menú, es decir una vista, esto reducirá tiempo de carga
    ya que evitamos realizar una cosnulta cada vez que el usuario navega por la app
  */
   public function getMenu() {
    //variable donde almacenaremos el menú del
    $menu = "";
    //realizamos la consulta obteniendo todos los items que parent = 0
    $m = $this->_em->getRepository($this->entity)->findBy(["parent" => 0]);
    //recorremos si obtenemos datos, en caso contrario pasamos $menu como fue inicializado
    if( $m ) {
      //recorremos la cosnulta
      foreach ($m as $key => $v) {
        //llamamos al método privado _getSubMenu, i le pasamos el id del item
        $s = $this->_getSubMenu( $v->getId() );
        //dibujamos el menú
        $menu .= '<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" >';
        //si $s contiene datos, entonces hay un submenú, en ese caso realizamos camnbios y adaptamos el diseño para que sporte submenú
        if( $s ) {

          $menu .= '<a href="#"  class="m-menu__link m-menu__toggle">';
          $menu .= '<i class="m-menu__link-icon '.$v->getIcono().'"></i>';
          $menu .= '<span class="m-menu__link-text">'.$v->getName().'</span>';
          $menu .= '<i class="m-menu__ver-arrow la la-angle-right"></i>';
          $menu .= '</a>';
          $menu .= $s;

        }else{

          $menu .= '<a  href="'.site_url(url_title($v->getName())).'" class="m-menu__link ">';
          $menu .= '<i class="m-menu__link-icon '.$v->getIcono().'"></i>';
          $menu .= '<span class="m-menu__link-text">'.$v->getName().'</span>';
          $menu .= '</a>';
        }

        $menu .= '</li>';

      }
    }
    echo $menu;
   }
   //metodo de dibuja los submenú
   private function _getSubMenu( $parent ) {
    //donde dibujamos el submenu
    $submenu = NULL;
    $s = $this->_em->getRepository($this->entity)->findBy(["parent" => $parent]);
    //comprobamos si hay resultado en la consulta
    if( $s ) {
      //abrimos el div que contendrá el submenú
      $submenu .= '<div class="m-menu__submenu">';
      $submenu .= '<span class="m-menu__arrow"></span>';
      $submenu .= '<ul class="m-menu__subnav">';
      //recorremos la consulta
      foreach ($s as $key => $v) {

        $submenu .= '<li class="m-menu__item" aria-haspopup="true" >';
        $submenu .= '<a  href="'.site_url(url_title($v->getName())).'" class="m-menu__link ">';
        $submenu .= '<i class="m-menu__link-icon '.$v->getIcono().'"></i>';
        $submenu .= '<span class="m-menu__link-text">'.$v->getName().'</span>';
        $submenu .= '</a>';
        $submenu .= '</li>';

      }
      //cerramos el div
      $submenu .= '</ul>';
      $submenu .= '</div>';
      //retornamos submenú
      return $submenu;

    }else{

      return FALSE;
    }
    
   }
}
