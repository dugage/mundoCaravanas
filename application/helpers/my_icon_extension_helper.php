<?php

function icon_extension($archive)
{
  //mediante el punto, creamos un array donde @ex[1] será la extensión
  $ex = explode(".", $archive);
  //variable donde almacenamos el icono
  $icono = "fa fa-file-o";
  //array que contiene clave = extensión - valor = icono.
  $iconos = array(

                  'pdf' => 'fa-file-pdf-o',
                  'excel' => 'fa-file-excel-o',
                  'doc' => 'fa-file-word-o',
                  'dot' => 'fa-file-word-o',
                  'dotm' => 'fa-file-word-o',
                  'dotx' => 'fa-file-word-o',
                  'docm' => 'fa-file-word-o',
                  'jpg' => 'fa-file-image-o',
                  'jpeg' => 'fa-file-image-o',
                  'gif' => 'fa-file-image-o',
                  'png' => 'fa-file-image-o',

          );
  //comprobamos si existe coincidencia
  if( isset($iconos[$ex[1]]) )
    $icono = $iconos[$ex[1]];
  //retornamos el icono
  return $icono;
  
}

