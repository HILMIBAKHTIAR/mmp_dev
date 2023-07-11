<?php
$index["debug"] = 0;
$index["ajax"] = 0;
$index_navbutton["generate"] = "reload|add|export_excel|import_excel";

$i = 0;
$index_table["column"][$i]["name"] 		= "no";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "kode";
$index_table["column"][$i]["sort"] 		= "a.kode";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Kode";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "nama";
$index_table["column"][$i]["sort"] 		= "a.nama";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Nama";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;


$index_table["column"][$i]["name"] 		= "status_aktif";
$index_table["column"][$i]["sort"] 		= "a.status_aktif";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Status Aktif";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "action";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Action";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;



$index["query_select"] = " SELECT
							a.*
							FROM 
							mhbarang a
										";

$index["query_where"] .= "	AND a.nomor <> 0 AND a.nomormhbarangkelompok = 7";
$index["default_order"] = "	a.nomor DESC";
?>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
      	<form method="post" enctype="multipart/form-data" action="pages/IMPORTLOKASIBARANGJADI.php">
			<div class="form-group">

				<label>Achieved Code :</label>
				<input type="text" name="nama">
				<br>

				<label>Kategori :</label>
				<input type="text" name="kategori">
				<br>

				<label>Tipe Item :</label>
				<input type="text" name="tipe_item">
				<br>

				<label>Upload File:</label>
				<input type="file" name="fileImport">
				<br>
				
				<label>Note:</label>
				<textarea id="note" name="note" rows="4" cols="50"></textarea>
				
		
			</div>
	        <button type="submit" class="btn btn-success">Import</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    	</form>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
		$(".bs-example div:first-child").append(
			'<a data-toggle="tooltip" title="Import Data" class="btn btn-default import_excel" data-original-title="Import Data">'
				+'<i class="fa fa-file-excel-o" aria-hidden="true"></i>'
			+'</a>');
		$(".import_excel").click(function(){
			$('#myModal').modal('show');
		});
		$(".finish_bg").parents("tr").find("td").css("background-color", "rgba(107, 208, 152, 0.37)");
	});
</script>



