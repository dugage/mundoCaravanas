<?php 
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
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter Payments Control Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Dugage Team
 * @link		https://dugage.com
 * 
 */
if ( ! function_exists('have_pending_payments') )
{
    /*
    *Determina mediante una consulta a la talba collection, si este tiene o no
    *pagos pendientes, para ello se pasa el id del vehículo para obtener el formato de pago
    *anual, semestral ... en forma de vector.
    */
    function have_pending_payments($id = 0) 
    {
        //hacemos uso de get_instance para poder utilizar desde
        //este espacio las librerías
        $CI =& get_instance();
        //cargamos la librería para conectarnos a la base de datos y utilizar
        //el query builder
        $CI->load->database();
        //mediante el id realizamos una consulta en vehicles y obtenemos los datos de este
        $vehicle = $CI->db->get_where('VEHICLES', array('id' => $id));
        //llamamos a la función que corresponde para cada tipo de pago
        $result = check_payments($vehicle);
        //devolvemos un verdadero o falso, donde  verdadero será que tiene pagos pendientes
        return $result;
    }
}
//devuelve un listado con los pagos pendientes
//este es realizado tomando como parametro, el tipo de pago
//yearly,biannual,quarterly o monthly. 
if ( ! function_exists('get_collection') )
{
    function get_collection($id){
        //obtenemos el objeto Vehícle mediente su id
        $CI =& get_instance();
        $CI->load->database();
        $vehicle = $CI->db->get_where('VEHICLES', array('id' => $id));
        //Utilizando el método de pago, llamamos a la función correspondiente
        $func = $vehicle->row()->pay_method;
        $calloectionList = $func($vehicle);
        //devolvemos la lista
        return $calloectionList;
    }
}
//comprobamos y devolvemos si el vehículo tiene inpagos o no
if ( ! function_exists('check_payments') )
{
    function check_payments($v)
    {
        $CI =& get_instance();
        $CI->load->database();
        //variable que almacena el code fecha
        $cDate = null;
        //booleano que devolvemos dependiendo de si el resultado de la consutla a 
        //collections devuelve o no datos
        $result = false;
        //menú para mostar el código de fecha según el tipo de pago
        switch ($v->row()->pay_method) {

            case 'yearly':
                //code si es el pago es anual
                $cDate = date('Y');
                break;

            case 'biannual':
                //code si es el pago es semestral
                $cDate = date('Y');
                break;

            case 'quarterly':
                //code si es el pago es trimestral
                $cDate = date('Y');
                break;

            case 'monthly':
                //code si es el pago es mensual
                $cDate = date('Y');
                break;
        }
        
        //realizamos una consulta en collections pasando el id del vehículo y el cDate
        $collection = $CI->db->get_where('COLLECTIONS', array('id_vehicle' => $v->row()->id,'c_date' => $cDate));
        //comprobamos la consulta y si contiene datos sobreescribimos result a true
        if( $collection->num_rows() > 0 != null )
            $result = true;
        //devolvemos el resultdao
        return $result;
    }
}
//funciones de listado de impagos según tipo de pago
if ( ! function_exists('yearly') )
{
    /*
    *Crea una lista con los pagos, pendientes, en caso de no tener pagos pendientes, devuelve null
    */
    function yearly($v)
    {
        $CI =& get_instance();
        $CI->load->database();
        //alamceanmos el en el que estamos actualmente
        $cDate = date('Y');
        //booleano que devolvemos dependiendo de si el resultado de la consutla a collections dvuelve
        //o no datos
        $result = null;
        //realizamos una consulta en collections pasando el id del vehículo y el cDate
        $collection = $CI->db->get_where('COLLECTIONS', array('id_vehicle' => $v->row()->id,'c_date' => $cDate));
        //si la consulta es null, es decir no obtiene datos, mostamos un vector con el pago/s pendientes/s
        if( $collection->num_rows() == 0 )
        {
            //obtenemos el último pago registrado
            $CI->db->order_by('id', 'DESC');
            $CI->db->limit(1);
            $lastPayment = $CI->db->get_where('COLLECTIONS', array('id_vehicle' => $v->row()->id));
            //si el resultado de la consulta es nulo, el result será un array con el año actual
            //en caso contrario, recorremos mediante un for la diferencia entre años y creamos una lista
            //de impagos
            if( $lastPayment->num_rows() == 0 ) 
            {

                $result = array( $cDate );

            }else{

                for ($i= $lastPayment->row()->c_date + 1 ; $i <= $cDate ; $i++) { 
                    
                    $result[] = $i;
                }

            }
        }
        //devolvemos el resultdao
        return $result;
    }
}

function biannual()
{
    return 'biannual';
}

function monthly()
{
    return 'monthly';
}

function quarterly()
{
    return 'quarterly';
}