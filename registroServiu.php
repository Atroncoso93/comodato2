<?php 
include('header.php');
include('controllers/functions.php');

if (isset($_POST['guardar'])) {
	/* variables del formulario   */
	$calle = $_POST['calle'];
	$Ncalle = $_POST['Ncalle'];
	$Aclaratoria = $_POST['aclaratoria'];
	$rol_sii = $_POST['rol_sii'];
	$fojas = $_POST['fojas'];
	$numeroCBR = $_POST['numeroCBR'];
	$anoCBR = $_POST['anoCBR'];
	$avaluo_fiscal = $_POST['avaluo_fiscal'];
	$superficie_terrenom2 = $_POST['superficie_terrenom2'];
	$comodato1 = $_POST['comodato1'];
	$estado = $_POST['estado'];
	$resolucion = $_POST['resolucion'];
	$inicio = $_POST['inicio'];
	$termino = $_POST['termino'];
	$entidad_ocupante = $_POST['entidad_ocupante'];

	/*  Consultas  */				
	if (! isset($error)) {

		$query = mysql_query("INSERT INTO terreno2 (calle, Ncalle, Aclaratoria, rol_sii, fojas, numeroCBR, anoCBR, avaluo_fiscal, superficie_terrenom2, comodato1, estado, resolucion, inicio, termino, entidad_ocupante) VALUES ('$calle','$Ncalle','$Aclaratoria','$rol_sii','$fojas','$numeroCBR','$anoCBR','$avaluo_fiscal','$superficie_terrenom2','$comodato1','$estado','$resolucion','$inicio','$termino','$entidad_ocupante')") 
			or die(mysql_error());

		if ($query) { //si esta ok se registra al nuevo terreno
			header("Location: serviu.php");
		} else    //si ocurre error se arroja mensaje
			echo "<div id='alerta' class='error'><div><a id='cerrar' title='Cerrar'>x</a></div>Ha ocurrido un error y no se pudo registrar El Terreno</div>"; 


		if (isset($error)) { // comprobamso si existen errores en los campos, si lo hay los mostrara en pantalla
			echo "<div id='alerta' class='error'>";
			echo "<div><a id='cerrar' title='Cerrar'>x</a></div>";

			foreach ($error as $errores)
				echo $errores."<br>";

			echo "</div>";
		}
	}
}

?>

<script> //validacion campo numerico
	function solonumeros(e) {
		key = e.keyCode || e.which;
		teclado = String.fromCharCode(key);
		numeros = '0123456789';
		especiales = '8-37-38-46-13'; //array
		teclado_especial = false;

		for(var i in especiales) {
			if (key == especiales[i]) {
				teclado_especial = true;
			}
		}

		if (numeros.indexOf(teclado) == -1 && ! teclado_especial) {
			return false;
		}
	}
</script>

<!--migas de pan -->

	<div class="breadcrum">
		<a href="comodatos.php">Inicio</a> >  Formulario de Ingreso > REGISTRO SERVIU
	</div>
	<!--comienzo del formulario  -->

	<h2>Antecedentes Generales del Terreno</h2>
	<h3>Direccion del terreno o propiedad</h3>

	<form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-1">Calle</label>
			<div class="col-sm-3">
				<input class="input-text" name="calle" id="direccion" required>
			</div>
			<label class="control-label col-sm-1">Nº</label>
			<div class="col-sm-1">
				<input class="input-text" name="Ncalle" onkeypress="return solonumeros(event)" id="direccion" required>
			</div>
			<label class="control-label col-sm-1">Aclaratoria</label>
			<div class="col-sm-3">
				<input class="input-text" name="aclaratoria" id="direccion" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-1" for="pwd">Rol SII</label>
			<div class="col-sm-1">
				<input class="input-text"  name="rol_sii" id="rol_sii" required>
			</div>
		</div>

		<h3 >Inscripcion conservador de bienes raices</h3>

		<div class="form-group">
			<label class="control-label col-sm-1">Fojas</label>
			<div class="col-sm-3">
				<input class="input-text" name="fojas" id="fojas" required>
			</div>
			<label class="control-label col-sm-1">Nº</label>
			<div class="col-sm-1">
				<input class="input-text" name="numeroCBR" onkeypress="return solonumeros(event)" id="numeroCBR" required>
			</div>			
			<label class="control-label col-sm-1">Año</label>
			<div class="col-sm-3">
				<input class="input-text" name="anoCBR" onkeypress="return solonumeros(event)" id="anoCBR" required>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-1">Avalúo Fiscal</label>
			<div class="col-sm-3">
				<input class="input-text"  name="avaluo_fiscal" onkeypress="return solonumeros(event)" id="avaluo_fiscal" required>
			</div>
			<label class="control-label col-sm-3">Superficie Del Terreno M2</label>
			<div class="col-sm-3">
				<input class="input-text"  name="superficie_terrenom2" id="superficie_terrenom2" required>
			</div>
		</div>

		<h3 >ADMINISTRACION</h3>

		<table>
			<tr>
				<td><strong>COMODATO</strong></td>
				<td><input class="input-text"  name="comodato1" id="comodato1"  required></td>
			</tr>
			<tr>
				<td><strong>ESTADO</strong></td>
				<td><input class="input-text"  name="estado" id="estado" required ></td>
			</tr>
			<tr>
				<td><strong>Nº RESOLUCION</strong></td>
				<td><input class="input-text"  name="resolucion" id="resolucion" required ></td>
			</tr>
			<tr>
				<td><STRONG>INICIO</STRONG></td>
				<td><input class="input-text"  name="inicio" id="inicio" required ></td>
			</tr>
			<tr>
				<td><STRONG>TERMINO</STRONG></td>
				<td><input class="input-text"  name="termino" id="termino" required ></td>
			</tr>
		</table>
		<br/>

		<div class="form-group">
			<label class="control-label col-sm-2">Entidad ocupante</label>
			<div class="col-sm-7">
				<textarea class="input-text" rows="6" name="entidad_ocupante" id="entidad_ocupante" required></textarea>
			</div>
		</div>
		<br />
		<br />  

		<div class="formulario pull-center">
			<button type="submit" class="btn btn-primary" name="guardar"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Datos</button>
			<button type="button" class="btn btn-primary" onclick="javascript:document.location.href ='serviu.php'"><span class="glyphicon glyphicon-repeat"></span>Volver</button>
        </div>

    </form>

<?php include('footer.php')?>