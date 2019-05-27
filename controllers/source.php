<?php
include('connection.php');

if($_REQUEST['function'] == 'one'){
	
$direccion = $_REQUEST['term'];

$req = "SELECT DISTINCT calle FROM calles WHERE calle LIKE '%$direccion%' ORDER BY calle ASC "; 

$query = mysql_query($req);
$find_rows = mysql_num_rows($query);
    if ($find_rows == 0){
        $results[] = array("label" => "No hay datos");
    }
    else
    {
    	while($row = mysql_fetch_array($query)){
	         $results[] = array("label" => $row["calle"]);
        }   
    }   
	  echo json_encode($results);
}

if($_REQUEST['function'] == 'two'){
	
$numero = $_REQUEST['term'];
$direccion = $_REQUEST['direccion'];

$req = "SELECT DISTINCT numero FROM calles WHERE numero LIKE '%$numero%' AND calle='$direccion' ORDER BY numero ASC"; 

$query = mysql_query($req);
$find_rows = mysql_num_rows($query);
    if ($find_rows == 0){
        $results[] = array("label" => "No hay datos");
    }
    else
    {
    	while($row = mysql_fetch_array($query)){
	         $results[] = array("label" => $row["numero"]);
        }   
    }   
	  echo json_encode($results);

}

if($_REQUEST['function'] == 'three'){
	
$direccion = $_REQUEST['direccion'];
$numero = $_REQUEST['numero'];

$query = mysql_query("SELECT id, uv FROM calles WHERE calle = '$direccion' AND numero='$numero'");


$find_rows = mysql_num_rows($query);
    if ($find_rows == 0){
        $results[] = array("label" => "No hay datos");
    }
    else
    {
    	while($row = mysql_fetch_array($query)){
			  $results = array("id_direccion" => $row["id"], "uv" => $row["uv"]);
        }   
    }   
	  echo json_encode($results);

}