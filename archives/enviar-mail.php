<?php

   	if($_SESSION['perfil'] === 'admin' || $_SESSION['perfil'] === 'coordinador'){

		$result = mysql_query("SELECT nombre, correo_usuario FROM sgt_usuario WHERE id_direccion ='".$id_direc."'");
		$row = mysql_fetch_array($result);			   
		$nombre = $row['nombre'];
		$correo_secre = $row['correo_usuario'];
		
		$to = $correo_secre;
		$subject = 'N° SOL.:'.$id_sol.' Nuevo Mensaje - SGT - Municipalidad de La Florida';
		  
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=utf-8\r\n"; 		 
		//$headers .= "From: Municipalidad de La Florida <info@laflorida.cl> \r\n";
		   
		$message = '<html><body style="font-family:Arial; font-size: 12px;">';	
		$message .= '<pre style="font-family:Arial; font-size: 13px;">Estimado/a <b>'.$nombre.'</b>:
		
Tiene un mensaje nuevo, perteneciente a la <strong>Solicitud N°'.$id_sol.'</strong>


Puede revisar la informacion accediendo al <a href="#">Panel de Usuario</a>.
		
Saludos Cordiales - Municipalidad de La Florida
			   </pre>';	
		$message .= '<pre style="font-family:Arial; font-size: 13px; font-weight:bold">*No conteste este correo.</pre>';
		$message .= '</body></html>';		  
				
		mail($to, $subject, $message, $headers);
	}
	
	if($_SESSION['perfil'] === 'secre'){

		$result = mysql_query("SELECT nombre, correo_usuario FROM sgt_usuario WHERE id_usuario ='".$usuario_not."'");
		$row = mysql_fetch_array($result);			   
		$nombre = $row['nombre'];
		$correo_secre = $row['correo_usuario'];
		
		$to = $correo_secre;
		$subject = 'N° SOL.:'.$id_sol.' Nuevo Mensaje - SGT - Municipalidad de La Florida';
		  
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=utf-8\r\n";   
		//$headers .= "From: Municipalidad de La Florida <info@laflorida.cl> \r\n";		 
		   
		$message = '<html><body style="font-family:Arial; font-size: 12px;">';	
		$message .= '<pre style="font-family:Arial; font-size: 13px;">Estimado/a <b>'.$nombre.'</b>:
		
Tiene un mensaje nuevo, perteneciente a la <strong>Solicitud N°'.$id_sol.'</strong>

Puede revisar la informacion accediendo al <a href="#">Panel de Usuario</a>.
		
Saludos Cordiales - Municipalidad de La Florida
			   </pre>';	
		$message .= '<pre style="font-family:Arial; font-size: 13px; font-weight:bold">*No conteste este correo.</pre>';
		$message .= '</body></html>';		  
				
		mail($to, $subject, $message, $headers);	
	
	}
?>