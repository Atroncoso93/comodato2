<?php
 			 function validarRUT($rut){ // function que valida el RUT ingresado
				$rut = strrev($rut); // la cadena se da vuelta ejemplo 123 a 321
				$aux = 1; // inicializamos la variable en 1
				$suma = 0; // inicializamos la variable en 0
				for($i=0;$i<strlen($rut);$i++){ // recorremos el rut y medidimos su longitud
				$aux++; // auxiliar se le suma 1 (2)
				$suma += intval($rut[$i])*$aux; // cada numero de la cadena se multiplica por 2.
				if($aux == 7){ $aux=1; }
				}
				$digit = 11-$suma%11; 
				if($digit == 11){ // si es el resultado es 11 el digito verificador es 0
					$d = "0";
					}
				elseif($digit == 10){  // si el resultado es 10 el digito verificador es K
					$d = "K";
					}
				else{$d = $digit;} //
				return $d; // devolvemos el digito verificador para utilizarlo al comprobarlo con el digito del $_POST['digito'] 
			 }
			 
 			 function Rut($rut){ // function que valida el RUT ingresado
				$rut = strrev($rut); // la cadena se da vuelta ejemplo 123 a 321
				return $d; // devolvemos el digito verificador para utilizarlo al comprobarlo con el digito del $_POST['digito'] 
			 }			 
			 
			 function valida_email($email_a) { // funcion que valida el formato del email
				if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {return true;} 
				else { return false; }	
			 }
			 
			 function valida_telefono($email_a) { // funcion que valida el telefono que sea tipo int
				if (filter_var($email_a, FILTER_VALIDATE_INT)) {return true;} 
				else { return false; }	
			 }


			  function fecha($str){
				  
			  $fecha = explode("-",$str);
			  $dia = $fecha['2'];
			  $mes = $fecha['1'];
			  $ano = $fecha['0'];
			  echo "$dia-$mes-$ano";
			  }

			  function fecha_esp($str){
				  
			  $fecha = explode("-",$str);
			  $dia = $fecha['2'];
			  $mes = $fecha['1'];
			  $ano = $fecha['0'];
			  $fecha = "$dia-$mes-$ano";
			  return $fecha;
			  }			  

			  function fecha_rev($str){
				  
			  $fecha = explode("-",$str);
			  @$dia = $fecha['0'];
			  @$mes = $fecha['1'];
			  @$ano = $fecha['2'];
			  $fecha = "$ano-$mes-$dia";
			  return $fecha;
			  }

			  function edad($str){	
			  	if($str = "00-00-0000"){
			  		return 0;
			  	}else{	
					$date = fecha_rev($str);	
					list($Y,$m,$d) = explode("-", $date);
					$edad = (date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y);
					return $edad;
			  	}
			  }			  
			  
			  function fecha_larga($str){
				  
			  $fecha = explode("-",$str);
			  $dia = $fecha['2'];
			  $mes = $fecha['1'];
			  $ano = $fecha['0'];
			  
			  if ($mes=="01") $mes="Enero";
			  if ($mes=="02") $mes="Febrero";
			  if ($mes=="03") $mes="Marzo";
			  if ($mes=="04") $mes="Abril";
			  if ($mes=="05") $mes="Mayo";
			  if ($mes=="06") $mes="Junio";
			  if ($mes=="07") $mes="Julio";
			  if ($mes=="08") $mes="Agosto";
			  if ($mes=="09") $mes="Septiembre";
			  if ($mes=="10") $mes="Octubre";
			  if ($mes=="11") $mes="Noviembre";
			  if ($mes=="12") $mes="Diciembre";
							
			  echo "$dia $mes $ano";
			  }
			  
			  function precio($str){
			  return number_format($str, 0, '', '.');
			  }
			  
?>