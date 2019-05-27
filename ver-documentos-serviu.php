<?php include('header.php');

$id_contrato = $_REQUEST['key'];

if (isset($_POST["guardar"])) {

  $file = implode(',', $_FILES['adjuntar']['size']);

  if ($file[0] > 0) {
    $direc = "documentos_serviu/" . $id_contrato;

    if (! is_dir($direc)) {
      mkdir($direc, 0777);
    }

    foreach ($_FILES['adjuntar']['tmp_name'] as $key => $value ) {

      copy($_FILES['adjuntar']['tmp_name'][$key],
        "documentos_serviu/" . $id_contrato . "/" . $_FILES['adjuntar']['name'][$key]);

      $url = "documentos_serviu/".$id_contrato."/".$_FILES['adjuntar']['name'][$key];

      mysql_query("INSERT INTO documento_serviu(id_contrato, documento, url)
        VALUES ('".$id_contrato."','".$_FILES['adjuntar']['name'][$key]."','".$url."')")
        or die(mysql_error());
    }
  }
}

if (isset($_REQUEST["eliminar"])) {

  $id_eliminar = $_REQUEST['eliminar'];

  $query = mysql_query("DELETE FROM documento_serviu WHERE id_documento = '$id_eliminar' ") or die (mysql_error());
  }

?>


<h3> documento </h3>
<br />
<form method="post" enctype="multipart/form-data" class="form-horizontal">
  <!--Inicio -->
  <div class="form-group">
    <label class="control-label col-sm-2">Contrato</label>
    <div class="col-sm-2">
      <div class="fileUpload btn btn-primary">
        Seleccionar Documento<input type="file" class="upload" name="adjuntar[]" id="uploadBtn1" multiple="multiple">
      </div>
    </div>
    <div class="col-sm-3">
      <input placeholder="Seleccione archivo" type="text" id="uploadFile1" class="input-text" disabled="disabled" >
    </div>
  </div>
  <br />
  <br />
  <div class="form-group">
    <div class="col-sm-12 pull-center">
      <button type="submit" class="btn btn-primary" name="guardar" id="guardar"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Datos</button>
    </div>
  </div>
</form>
<br>
<br>

<table id="table1" class="tabla display" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Documentos</th>
    </tr>
  </thead>
  <tbody>
<?php
$query = mysql_query("SELECT id_documento, url, documento FROM documento_serviu WHERE id_contrato = $id_contrato");
// SELECT `id_documento`, `url`, `documento`, `id_contrato` FROM `documento_serviu` WHERE 1
if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
?>
    <tr>
      <td><a href=" <?php echo $row['url']; ?>"><?php echo $row['documento']; ?></a> <a href="ver-documento-serviu.php?key=<?php echo $id_contrato; ?>&eliminar=<?php echo $row['id_documento']; ?>"><span class="glyphicon glyphicon-remove"></a>
      </td>
    </tr>
<?php	
		}
  } else {

?>        
    <tr>
      <td>No existe documento asociados</a></td>
    </tr>
<?php
  }

?>

  </tbody>
</table>

<script>
  $( document ).ready(function() {
    $("#uploadBtn1").change(function() { var file = $(this).val(); $("#uploadFile1").val(file);})
  });
</script>
<br>
<div class="formulario pull-center">
  <button type="button" class="btn btn-primary" onclick="javascript:document.location.href = 'serviu.php'"><span class="glyphicon glyphicon-repeat"></span> Volver</button>
</div>

<?php include('footer.php'); ?>