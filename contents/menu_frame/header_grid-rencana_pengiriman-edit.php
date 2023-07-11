<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];




$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}

$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"] 						= "Kode";
$edit["field"][$i]["input"] 						= "kode";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]       = "Date";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"] 						= "Up";
$edit["field"][$i]["input"] 						= "up";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Toleransi";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "toleransi_customer";
$i++;

$edit["field"][$i]["label"]                     = "Nama Barang";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhbarang";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_barangjadi";
// $edit["field"][$i]["browse_set"]["param_output"]     = array(
//     "nomor|nomorthspk"
// );
// $edit["field"][$i]["browse_set"]["call_function"] = array(
// 	"load_grid_detail"
// );
$i++;


$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Pembayaran";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhtop";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_top";
$i++;


$edit["field"][$i]["label"] 					= "Jumlah Warna";
$edit["field"][$i]["input"]						= "jumlah_warna";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "Komposisi";
$edit["field"][$i]["input"]						= "komposisi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "MOQ";
$edit["field"][$i]["input"]						= "moq";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "Size";
$edit["field"][$i]["input"]						= "size";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "Harga";
$edit["field"][$i]["input"]						= "harga";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] = "Status";
$edit["field"][$i]["input"] = "status_aktif";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("1|Aktif", "0|Tidak Aktif");
$i++;



if ($edit["mode"] != "add") {

	$edit["query"] = " SELECT
    a.*,
    DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
    CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhbarang',
    CONCAT(c.nama, '|', c.nomor) AS 'browse|nomormhtop',
    CONCAT(d.toleransi_pengiriman, '|', d.nomor) AS 'browse|nomormhrelasi'
    FROM threncanapengiriman a
    left join mhbarang b on b.nomor = a.nomormhbarang
    left join mhtop c on c.nomor = a.nomormhtop
    left join mhrelasi d on d.nomor = a.nomormhrelasi
    WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update"); 
$edit_navbutton = generate_navbutton($edit_navbutton);
if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=SALES_ORDER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}

?>

<script type="text/javascript">
    $(document).ready(function() {
        // get_nomormhusaha();
        // myFunction();
    });


    function load_grid_detail()
	{	
	var no = $('#nomorthspk').val();
	
	var pages = 'pages/grid_load.php?id=spk_printing_baru_detail-load&no='+no+'';
	jQuery(<?=$grid_elm[0]?>).jqGrid('setGridParam',
	{
		url:pages,
		datatype:'json',
		loadComplete:function(data)
		{
			<?=$grid_str[0]?>_load = 0;
			actGridComplete_<?=$grid_str[0]?>();
		}
	});
	jQuery(<?=$grid_elm[0]?>).trigger('reloadGrid');
	}


    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    function viewDataAction(nomor) {
        window.open("?m=spk_printing_baru_detail&f=header_grid&&sm=edit&a=edit&no=" + nomor);
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>
