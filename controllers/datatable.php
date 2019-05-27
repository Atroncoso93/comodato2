<?php session_start();
include('connection.php'); 

if (@$_REQUEST['function'] === "comodatos"){

	$query = mysql_query("SELECT id_terreno, direccion, tipo_rol, uso_suelo FROM terreno")
	or die(mysql_error());
//seleccionamos la informacion de la base de datos y de la tabla.
	while ($row = mysql_fetch_array($query)){
		$array['data'][] = $row;
	}
	echo json_encode($array);
}


if (@$_REQUEST['function'] === "precarios"){

	$query = mysql_query("SELECT id_terreno, direccion, destino FROM precarios")
	or die(mysql_error());
//seleccionamos la informacion de la base de datos y de la tabla. 
	while ($row = mysql_fetch_array($query)){
		$array['data'][] = $row;
	}
	echo json_encode($array);
}


if (@$_REQUEST['function'] === "serviu") {

	$query = mysql_query("SELECT id_terreno, calle, Ncalle FROM terreno2")
	or die(mysql_error());
//seleccionamos la informacion de la base de datos y de la tabla. 
	while ($row = mysql_fetch_array($query)) {
		$array['data'][] = $row;
	}
	echo json_encode($array);
}


if (@$_REQUEST['function'] === "IND") {

	$query = mysql_query("SELECT id_terreno, calle, Ncalle FROM terreno3")
	or die(mysql_error());
//seleccionamos la informacion de la base de datos y de la tabla. 
	while ($row = mysql_fetch_array($query)) {
		$array['data'][] = $row;
	}
	echo json_encode($array);
}

?>