<?php
$index["debug"] = 1;
$index["ajax"] = 1;
$index["filter"] = 1;
$index_navbutton["generate"] .= "|filter_column";
$index["filter_column"] = 1;

$filter["start_date"] 	= $_SESSION["setting"]["filter_start_date"];
$filter["end_date"] 	= $_SESSION["setting"]["filter_end_date"];

$i = 0;
$index_filter["field"][$i]["label"]                     = "customer";
// $index_filter["field"][$i]["label_class"]                 = "req";
$index_filter["field"][$i]["input"]                     = "nomormhrelasi";
// $index_filter["field"][$i]["input_class"]                 = "required";
$index_filter["field"][$i]["input_element"]             = "browse";
$index_filter["field"][$i]["browse_setting"]             = "master_customer_po";
$i++;

$index_filter["field"][$i]["label"] = "Tanggal Awal";
$index_filter["field"][$i]["input"] = "tanggal_awal";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;
$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"] = "Tanggal Akhir";
$index_filter["field"][$i]["input"] = "tanggal_akhir";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;

// $i                                           = 0;
// $index_filter["field"][$i]["label"] = "Data Status";
// $index_filter["field"][$i]["input"] = "data_status";
// $index_filter["field"][$i]["input_element"] = "select1";
// $index_filter["field"][$i]["input_option"] = array("3|All", "1|Non-Active", "2|Active");
// $index_filter["field"][$i]["input_col"]      = "col-md-4";
// $i++;

// $index_filter["field"][$i]["form_group"] = 0;
// $index_filter["field"][$i]["label"] = "Item Code";
// $index_filter["field"][$i]["input"] = "item_code";
// $i++;

// $index_filter["field"][$i]["form_group"] = 0;
// $index_filter["field"][$i]["label"] = "Item Name";
// $index_filter["field"][$i]["input"] = "item_name";
// $i++;



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
$index_table["column"][$i]["visible"] 	= visible_index_column("kode");
$i++;

$index_table["column"][$i]["name"] 		= "tanggal";
$index_table["column"][$i]["sort"] 		= "a.tanggal";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Tanggal PO";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("tanggal");
$i++;

$index_table["column"][$i]["name"] 		= "customer";
$index_table["column"][$i]["sort"] 		= "b.nama";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Nama";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("customer");
$i++;


$index_table["column"][$i]["name"] 		= "action";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Action";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;



$index["query_select"] = " 	SELECT
							a.*, 
							b.nama customer,
							DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
							from thjualorder a
							join mhrelasi b on b.nomor = a.nomormhrelasi and b.status_aktif > 0
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