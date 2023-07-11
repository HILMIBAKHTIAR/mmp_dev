<?php
$index["debug"] = 0;
// $index["ajax"] = ;
// $index["filter"] = 1;

// $i                                           = 0;
// $index_filter["field"][$i]["label"] = "Data Status";
// $index_filter["field"][$i]["input"] = "data_status";
// $index_filter["field"][$i]["input_element"] = "select1";
// $index_filter["field"][$i]["input_option"] = array("3|All","1|Non-Active","2|Active");
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

$index_table["column"][$i]["name"] 		= "supplier";
$index_table["column"][$i]["sort"] 		= "";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Supplier";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "material";
$index_table["column"][$i]["sort"] 		= "";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Material";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "lot_number";
$index_table["column"][$i]["sort"] 		= "";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Lot Number";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "qty";
$index_table["column"][$i]["sort"] 		= "";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Quantity Material";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "tanggal_kedatangan";
$index_table["column"][$i]["sort"] 		= "";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Tanggal Kedatangan";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "tanggal_pengecekan";
$index_table["column"][$i]["sort"] 		= "";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Tanggal Pengecekan";
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



$index["query_select"] = " 	SELECT
							a.*
							, b.nama as supplier
							from thqapsolventadhesive a 
							left join mhrelasi b on b.nomor = a.nomormhrelasi
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