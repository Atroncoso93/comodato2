<?php
include ('controllers/connection.php');
$_SESSION['id_user'] = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;
// el archivo authorization.php se puede agregar a las paginas que quieras restringir.
$user_check = $_SESSION['id_user']; // utilizamos la variables de sesion del acceso para comprobar que el usuario este logeado.

$query = mysql_query("SELECT * FROM usuario_app WHERE rut = '$user_check'"); // comprobamos que existe el usuario con el id
$row = mysql_fetch_array($query); 
$id_user = $row['rut']; // nuevamente agregamos a una variable el id, el cual esta comprobado en la base de datos
$user_name = $row['usuario'];
$perfil = $row['perfil_usuario'];
$direccion_u = $row['direccion'];

if(!isset($id_user)) // si no esta logeado o no existe, se redirecciona a la pagina de login o acceso.
{
header("location: index.php?m=error");
}

?>