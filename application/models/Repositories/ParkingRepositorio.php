<?php
namespace Repositories;
use Doctrine\ORM\EntityRepository;

/**
 * Class ParkingRepositorio
 * @package Repositories

 */
class ParkingRepositorio extends EntityRepository
{

  /**
   * @var string
   */
  private $entity = "Entities\\Parking";

  /**
   * @return array
   */
  /*
    El metodo getMenu(), será llamado desde el módulo login, donde si el acceso es ok, 
    editara un documento html con el menú, es decir una vista, esto reducirá tiempo de carga
    ya que evitamos realizar una cosnulta cada vez que el usuario navega por la app
  */
   public function getParkingMap($limit) {
    //obtenemos el mapa del parking
    $parkingMap = $this->_drawParkingMap($limit);
    //devolvemos el mapa del parking
    return $parkingMap;

   }
   
   private function _drawParkingMap($limit)
   {
      //variable donde dibujaremos las pazar de parking
      $parkingMap = '';
      //obtenemos todas las plazas del parking
      $parkingRows = $this->_em->getRepository($this->entity)->findAll();
      //recorremoy dibujam
      foreach ($parkingRows as $key => $parking) {
        //obtenemos el vehículo vinculado al parking
        $vehicle = $this->_em->find("Entities\\Vehicles", $parking->getVehicleid());

        $parkingMap .= '<div class="parking col-md-2">';
        $parkingMap .= $parking->getNumber();
        $parkingMap .= '<br/>';
        //comprobamos si la plaza está ocupada o no, en caso de ocupada = 1 el icono = rojo, en caso de estar libre = 0 verde
        //al mismo tiempo si la plaza está coupada, doibujamos el btn para que pueda abrir una ficha de cliente.
        if( $parking->getState() == 0 ) {

          $parkingMap .= '<i style="font-size: 1.5em; color:green;" class="flaticon-transport"></i>';

        }else{

          $parkingMap .= '<i style="font-size: 1.5em; color:red;" class="flaticon-transport"></i>';
          $parkingMap .= '<br/>';
          $parkingMap .= '<a target="_blank" href="'.site_url('clientes/edit/'.$vehicle->getCustomer()->getId()).'" class="btn btn-secondary m-btn m-btn--custom">Ver cliente</a>';
        }

        
        $parkingMap .= '</div>';

      }
      
      //devolvemos el mapa del parking
      return $parkingMap;
      
   }

}
