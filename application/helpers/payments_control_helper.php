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
//comprobamos y devolvemos si el vehículo tiene impagos o no
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
                $cDate = get_this_biannual();
                break;

            case 'quarterly':
                //code si es el pago es trimestral
                $cDate = get_this_quarterly();
                break;

            case 'monthly':
                //code si es el pago es mensual
                $cDate = date('Ym');
                break;
        }
        
        //realizamos una consulta en collections pasando el id del vehículo y el cDate
        $collection = $CI->db->get_where('COLLECTIONS', array('id_vehicle' => $v->row()->id,'c_date' => $cDate));
        //comprobamos la consulta y si contiene datos sobreescribimos result a true
        if( $collection->num_rows() > 0 )
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
        $cDate = date('Y');
        $lastPayment = base_consult($cDate,$v);
        //booleano que devolvemos dependiendo de si el resultado de la consutla a collections dvuelve
        //o no datos
        $result = [];
        //si el resultado de la consulta es nulo, el result será un array con el año actual
        //en caso contrario, recorremos mediante un for la diferencia entre años y creamos una lista
        //de impagos
        if( $lastPayment->num_rows() > 0 ) 
        {

            for ($i = $lastPayment->row()->c_date + 1 ; $i <= $cDate ; $i++) { 
                
                $result[] = $i;
            }

        }
        //devolvemos el resultdao
        return $result;
    }
}

if ( ! function_exists('biannual') )
{
    function biannual($v)
    {
        $cDate = get_this_biannual();
        $lastPayment = base_consult($cDate,$v);
        //booleano que devolvemos dependiendo de si el resultado de la consutla a collections dvuelve
        //o no datos
        $result = [];
        //si el resultado de la consulta es nulo, el result será un array con el semestre actual
        //en caso contrario, recorremos mediante un for la diferencia entre semestre y creamos una lista
        //de impagos
        if( $lastPayment->num_rows() > 0 ) 
        {

            for ($i = $lastPayment->row()->c_date + 6 ; $i <= $cDate ; $i+=6) { 
                
                $i = change_year($i);
                $result[] = $i;
                
            }

        }
        //devolvemos el resultado
        return $result;
    }
}

if ( ! function_exists('quarterly') )
{
    function quarterly($v)
    {
        $cDate = get_this_quarterly();
        $lastPayment = base_consult($cDate,$v);
        //booleano que devolvemos dependiendo de si el resultado de la consutla a collections dvuelve
        //o no datos
        $result = [];
        //si el resultado de la consulta es nulo, el result será un array con el trimetre actual
        //en caso contrario, recorremos mediante un for la diferencia entre trimetre y creamos una lista
        //de impagos
        if( $lastPayment->num_rows() > 0 ) 
        {

            for ($i = $lastPayment->row()->c_date + 3 ; $i <= $cDate ; $i+=3) { 
                
                $i = change_year($i);
                $result[] = $i;

            }

        }
        //devolvemos el resultado
        return $result;
    }
}

if ( ! function_exists('monthly') )
{
    function monthly($v)
    {
        $cDate = date('Ym');
        $lastPayment = base_consult($cDate,$v);
        //booleano que devolvemos dependiendo de si el resultado de la consutla a collections dvuelve
        //o no datos
        $result = [];
        //si el resultado de la consulta es nulo, el result será un array con el mes actual
        //en caso contrario, recorremos mediante un for la diferencia entre meses y creamos una lista
        //de impagos
        if( $lastPayment->num_rows() > 0 ) 
        {

            for ($i= $lastPayment->row()->c_date + 1 ; $i <= $cDate ; $i++) { 
                
                $i = change_year($i);
                $result[] = $i;
            }

        }
        //devolvemos el resultado
        return $result;
    }
}

if ( ! function_exists('base_consult') )
{
    function base_consult($cDate,$v)
    {
        $CI =& get_instance();
        $CI->load->database();
        $result = null;
        //realizamos una consulta en collections pasando el id del vehículo y el cDate
        $collection = $CI->db->get_where('COLLECTIONS', array('id_vehicle' => $v->row()->id,'c_date' => $cDate));
        //si la consulta es null, es decir no obtiene datos, mostamos un vector con el pago/s pendientes/s
        if( $collection->num_rows() == 0 )
        {
            //obtenemos el último pago registrado
            $CI->db->order_by('id', 'DESC');
            $CI->db->limit(1);
            $result = $CI->db->get_where('COLLECTIONS', array('id_vehicle' => $v->row()->id));

        }else{

            $result = $collection;
        }

        return $result;
    }
}

if ( ! function_exists('get_this_quarterly') )
{
    function get_this_quarterly()
    {
        $result = null;
        //calculamos en trimestre que estamos
        $quarterly = floor((date('m')-1) / 3)+1;
        //según el trimestre, pasamos una fecha
        switch ($quarterly) {
            case 1:
                $result = date('Y').'01';
                break;

            case 2:
                $result = date('Y').'04';
                break;

            case 3:
                $result = date('Y').'07';
                break;
            
            default:
                $result = date('Y').'10';
                break;
        }

        return $result;
    }
}

if ( ! function_exists('get_this_biannual') )
{
    function get_this_biannual()
    {
        $result = null;
        //calculamos en trimestre que estamos
        $biannual = date('m');
        //según el trimestre, pasamos una fecha
        if( $biannual <= 6 ) {

            $result = date('Y').'01';

        }else{

            $result = date('Y').'07';
        }

        return $result;
    }
}
//calculamos el cambio de año
if ( ! function_exists('change_year') )
{
    function change_year($date)
    {
        $n = str_split($date);
        $n = $n[4].$n[5];

        if( $n == '13')
            $date = '201801';

        return $date;
    }
}