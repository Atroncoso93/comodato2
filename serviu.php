<?php include("header.php"); ?>
<script>
$(document).ready(function() {
	$('#example1').dataTable( {
		"ajax":'controllers/datatable.php?function=serviu',
		"order": [[0,"desc"]],
		"aoColumns": [
		{ "data": "id_terreno" },
		{ "data": "calle" },
        { "data": "Ncalle" },	
    	{ "data": "id_terreno" }	//id
    ],
    "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
	  $('td:eq(3)', nRow).html('<a href="ver-documentos-serviu.php?key='+aData[0]+'" class="ver"><span class="glyphicon glyphicon-file"></span></a> <a href="editar-serviu.php?key='+aData[0]+'" class="ver"><span class="glyphicon glyphicon-pencil"></span></a> <a href="print-ficha-serviu.php?key='+aData[0]+'" class="imprimir" target="_blank"><span class="glyphicon glyphicon-print"></span></a> <a href="eliminar-serviu.php?key='+aData[0]+'" class="" onclick="return confirm(\'\Esta seguro que desea eliminar Terreno N ° '+aData[0]+'\ ?\'\)"><span class="glyphicon glyphicon-remove"></span></a>');
	  return nRow;
	  },


	  	"language": {
	  		"lengthMenu": "Mostrar _MENU_ registros por pagina",
			"sSearch": "Buscador: _INPUT_",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Los registros no estan disponibles",
			"sZeroRecords": "No se encontraron registros",
			"sEmptyTable": "No hay información disponible."
			// "sPrevious": "Previo",
			 //"sNext":"Siguiente"
	
			}
		});
});

</script>
<h3>Lista registros Serviu <a title="Exportar a Excel" target="_blank" href="exportar-serviu.php"><span class="glyphicon glyphicon-folder-open" style="float:right; font-size:17px;"></span></a> </h3>
<br />

<table id="example1" class="tabla display">
	<thead>
		<tr class="fila">
			<th>ID</th>
			<th>Calle</th>
			<th>N° Calle</th>
			<th width="150px">acciones</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<?php include("footer.php"); ?>