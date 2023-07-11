<?php
$index["debug"] = 1;
$index["ajax"] = 1;

$index["filter"] = 1;
$index_filter["hide"] = 0;
$index_navbutton["generate"] .= "|filter_column";
$index["filter_column"] = 1;

$filter["start_date"] 	= $_SESSION["setting"]["filter_start_date"];
$filter["end_date"] 	= $_SESSION["setting"]["filter_end_date"];

// --------------------------------FILTER------------------------------------
$i = 0;

$index_filter["field"][$i]["label"]                     = "Nomor SPK";
$index_filter["field"][$i]["input"]                     = "nomorthspkmmp";
$index_filter["field"][$i]["input_element"]             = "browse";
$index_filter["field"][$i]["browse_setting"]             = "spk";
$i++;

$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"]                     = "Barang";
$index_filter["field"][$i]["input"]                     = "nomorthbarang";
$index_filter["field"][$i]["input_element"]             = "browse";
$index_filter["field"][$i]["browse_setting"]             = "master_barang_customerv2";
$i++;

$index_filter["field"][$i]["label"] 			= "Tanggal Awal";
$index_filter["field"][$i]["label_class"] 		= "req";
$index_filter["field"][$i]["input"] 			= $filter["start_date"];
$index_filter["field"][$i]["input_class"] 		= "required date_1";
if (empty($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_" . $filter["start_date"]]))
	$index_filter["field"][$i]["input_value"] 	= date($_SESSION["setting"]["date"]);
$i++;

$index_filter["field"][$i]["form_group"] 		= 0;
$index_filter["field"][$i]["label"] 			= "Tanggal Akhir";
$index_filter["field"][$i]["label_class"] 		= "req";
$index_filter["field"][$i]["input"] 			= $filter["end_date"];
$index_filter["field"][$i]["input_class"] 		= "required date_1";
if (empty($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_" . $filter["end_date"]]))
	$index_filter["field"][$i]["input_value"] 	= date($_SESSION["setting"]["date"]);
$i++;


$i = 0;
$index_table["column"][$i]["name"] 		= "no";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "kodespk";
$index_table["column"][$i]["sort"] 		= "b.kode";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "spk";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("kodespk");
$i++;

$index_table["column"][$i]["name"] 		= "barang";
$index_table["column"][$i]["sort"] 		= "c.nama_barang_customer";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "barang";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("barang");
$i++;

$index_table["column"][$i]["name"] 		= "kode_cylinder";
$index_table["column"][$i]["sort"] 		= "a.kode_cylinder";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "kode cylinder";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("kode_cylinder");
$i++;

$index_table["column"][$i]["name"] 		= "peruntukan";
$index_table["column"][$i]["sort"] 		= "a.peruntukan";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "peruntukan";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("peruntukan");
$i++;

$index_table["column"][$i]["name"] 		= "action";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Action";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index["query_select"] = " 	SELECT
							a.*
							, b.kode as kodespk
							, c.nama_barang_customer as barang
							from thkeluarmasukcylinder a 
							join thspkmmp b on b.nomor = a.nomorthspkmmp and b.status_aktif = 1
							join thbarang c on c.nomor = a.nomorthbarang and c.status_aktif = 1
										";

$index["query_where"] .= "	AND a.nomor <> 0";
$index["default_order"] = "	a.nomor DESC";
?>

<div class="modal fade preview" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div id="previmg"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.preview').on('show.bs.modal', function(e) {
		var id = $(e.relatedTarget).data('id');
		console.log(id);
		$("#previmg").html("<img src='" + id + "' id='profilepic' style='cursor:pointer;display:inline;margin: 0 auto; height:auto; width:100%;'>");
	});

	function duplicateItem(nomor) {
		var m = <?php echo "\"" . $_GET['m'] . "\"" ?>;
		var lokasi = "pages/duplicate_item.php?m=" + m + "&table=mitem&no=" + nomor;
		// alert(lokasi);
		location.href = lokasi;
	}
</script>