<?php
	// SETTING DEFAULT
	$edit["debug"]       = 1;
	$edit["uppercase"]   = 1;
	$edit["unique"]      = array("kode|Kode");
	$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
	$edit["string_summary"] 	= $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
	// $edit["manual_save"]="contents/menu_frame/header_grid-transaksi_order_pembelian_lokal_stok-save.php";

	if ($edit["mode"] != "add") {
		$edit["query"] = "
		SELECT 
		a.*,
		DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
		CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi'
		FROM thbeliorder a	
		left join mhrelasi b on b.nomor = a.nomormhrelasi
		WHERE a.nomor = " . $_GET["no"];

		$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

		$edit = fill_value($edit, $r);

		if ($edit["debug"] > 0)
			echo $edit["query"] . '<br>';
	}

	$edit['sp_add'] = "sp_add_order_pembelian";
	$edit["sp_add_param"] = array("param_nomormhadmin|0", "param_mode|1");
	$edit['sp_edit'] = "sp_add_order_pembelian";
	$edit["sp_edit_param"] = array("param_nomormhadmin|0", "param_mode|1");
	$_POST["param_nomormhadmin"] 		= $_SESSION["login"]["nomor"];
	$_POST["param_mode"] 				= "";

	$edit["sp_approve"] = "sp_disetujui_order_pembelian";
	$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
	$edit["sp_disapprove"] = "sp_disetujui_order_pembelian";
	$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
	$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
	$_POST["param_status_disetujui"] = 1;
	$_POST["param_status_dibatalkan"] = 0;
	$_POST["param_nomor"] = $_GET["no"];
	$_POST["param_mode"] = "";

	// SETTING DATA GRID FOR SAVE
	// grid 1 
	
$i = 0;
$edit["detail"][$i]["table_name"] = "tdbeliorder";
$edit["detail"][$i]["field_name"] = array(
	"nomorthbelipermintaan",
	"nomortdbelipermintaan",
	"nomormhbarang",
	"nomormhsatuan",
	"nomormhsatuanunit",
	"jumlah",
	"jumlah_konversi",
	"jumlah_unit",
	"harga_satuan",
	"diskon_1",
	"total_diskon",
	"subtotal", 
	"keterangan",
	"tanggal_permintaan_kirim|coltemplate_date_1"
	
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;



	// END SETTING DATA GRID

	// SETTING FORM HEADER

	$i = 0;
	if (!empty($_GET["a"]) && $_GET["a"] == "view") {
		$edit["field"][$i]["box_tabs"] = array(
			"data|Data",
			"info|Info"
		);
	}
	// SETTING FIELD
	$edit["field"][$i]["box_tab"]                 = "data";

	
	$edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["label"] = "Tanggal";
	$edit["field"][$i]["input"] = "tanggal";
	$edit["field"][$i]["label_class"] = "req ";
	$edit["field"][$i]["input_class"] = "required date_1";
	$i++;


	$edit["field"][$i]["label"] 						= "Permintaan";
	$edit["field"][$i]["input"] 						= "kode";
	$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
	if ($edit["mode"] == "add")
		$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
	$i++;

	$edit["field"][$i]["label"] 						= "Supplier";
	// $edit["field"][$i]["label_class"] 					= "req";
	$edit["field"][$i]["input"] 						= "nomormhrelasi";
	// $edit["field"][$i]["input_class"] 					= "required";
	$edit["field"][$i]["input_element"] 				= "browse";
	$edit["field"][$i]["browse_setting"] 				= "master_supplier";
	// $edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
	$i++;

	$edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["label"] = "Status PPN";
	$edit["field"][$i]["input"] = "status_ppn";
	$edit["field"][$i]["input_element"] = "select1";
	$edit["field"][$i]["input_option"] = array("Non PPN|Non PPN", "Exclude|Exclude", "Include|Include");
	$edit["field"][$i]["input_attr"]["onchange"] = "toggle_ppn()";
	$i++;


	$edit["field"][$i]["label"]                   = "TOP (Term Of Payment)";
	$edit["field"][$i]["input"]                   = "top";
	$edit["field"][$i]["input_class"]             = "required type_number_nominus";
	$edit["field"][$i]["label_class"]      = "req";
	$i++;

	




	$edit = generate_info($edit, $r, "insert|update|approve|disapp");
	$i = count($edit["field"]);

	// ================================================================================== UPLOAD ======================================================

$index = 0;
if ($edit["mode"] != "add") {
    $edit["field"][$i]["box_tab"]             = "upload";
    $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
    $edit["field"][$i]["input_element"]     = 'No Uploaded File';

    $file_nomor = $_GET["no"];
    $file_tabel = $edit["table"];
    $file_query = mysqli_query($con, " 
	SELECT nomor, `directory`, nama, category  
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		category = 'ORDERBELI' AND 
		tablename = '$file_tabel' AND 
		filenumber = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $edit["field"][$i]["input_element"] .= '<a class="btn btn-block btn-outline btn-midnight" style= "white-space: break-spaces; margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["directory"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["category"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            if ($edit["mode"] != "view")
                $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="color:white;position:relative;top:-26px;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>';
            $edit["field"][$i]["input_element"] .= '</div>';
            $index++;
        }
    }
    $edit["field"][$i]["input_save"] = "skip";
    $i++;
}


// ==================================================================================END UPLOAD ======================================================

	// GRID DETAIL ORDER PEMBELIAN
	
$edit["field"][$i]["box_tab"]                                 = "pra_order_beli";
$grid[0]                                                      = $i;

$edit["field"][$i]["input_element"]                           = "grid";
$edit["field"][$i]["grid_set"]                                = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                          = "order_pembelian_detail";
$edit["field"][$i]["grid_set"]["option"]["caption"]           = "'Detail Order Beli'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]          = "	
	'Kode Permintaan',	
	'Barang',
	'Qty',
	'Satuan',
	'Keterangan',
	'Qty',
	'Satuan',		
	'Harga',
	'Diskon 1(%)',
	'total_diskon',
	'Sub Total',
	'Keterangan',
	'nomorthbelipermintaan',
	'nomortdbelipermintaan',
	'jumlah_konversi',
	'jumlah',
	'nomormhbarang',
	'nomormhsatuan',
	'Tanggal Kirim'
	";
$edit["field"][$i]["grid_set"]["column"]                      = array(
	"kode_permintaan",
	"nama_barang",
	"qty_permintaan",
	"satuan_permintaan",
	"keterangan_permintaan",
	"jumlah_unit",
	"satuan_purchasing",
	"harga_satuan",
	"diskon_1",
	"total_diskon",
	"subtotal",
	"keterangan",
	"nomorthbelipermintaan",
	"nomortdbelipermintaan",
	"jumlah_konversi",
	"jumlah",
	"nomormhbarang",
	"nomormhsatuan",
	"tanggal_permintaan_kirim"

);
$edit["field"][$i]["grid_set"]["var"]["default_data"]         = "{
	kode_permintaan:'',
	nama_barang:'',
	qty_permintaan:'0',
	satuan_permintaan:'',
	keterangan_permintaan:'',
	jumlah_unit:'0',
	satuan_purchasing:'',
	harga_satuan:'0',
	diskon_1:'0',
	total_diskon:'',
	subtotal:'0',
	keterangan:'',
	nomorthbelipermintaan:'',
	nomortdbelipermintaan:'',
	jumlah_konversi:'1',
	jumlah:'0',
	nomormhbarang:'',
	nomormhsatuan:'',
	tanggal_permintaan_kirim:''
}";

// $edit["field"][$i]["grid_set"]["navgrid"] = 0;
// $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;

$edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;

$j                                                            = 0;
// AUTOCOMPLETE GRID
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'kode_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'kode_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "250";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "800";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'qty_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'qty_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'satuan_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'satuan_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "240";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'keterangan_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'keterangan_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "240";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'satuan_purchasing'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'satuan_purchasing'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_purchasing }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'harga_satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'harga_satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
if ($edit["mode"] != "add" AND $grup["harga"] == 0) {

}
$j++;



$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'diskon_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'diskon_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'total_diskon'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'total_diskon'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomorthbelipermintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomorthbelipermintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomortdbelipermintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomortdbelipermintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jumlah_konversi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jumlah_konversi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'tanggal_permintaan_kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'tanggal_permintaan_kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_date_1";
$j++;


$row 																						= 0;
$k 														   									= 0;


$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]           				= "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]	= "'kode_permintaan'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "5";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]     		= "'Permintaan'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]           				= "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]	= "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "6";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]     		= "'Purchasing'";
$k++;
$row++;

$i++;




	// $i++;
	// END GRID DETAIL ORDER PEMBELIAN

	$edit["field"][$i]["label"]              = "Keterangan";
	$edit["field"][$i]["label_col"] = "col-sm-12";
	$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
	$edit["field"][$i]["input"] = "keterangan";
	$edit["field"][$i]["input_class"] = "";
	$edit["field"][$i]["input_col"] = "col-sm-6";
	$edit["field"][$i]["input_element"] = "textarea";
	$edit["field"][$i]["input_attr"]["rows"] = "10";
	$edit["field"][$i]["input_attr"]["cols"] = "70";
	$i++;

	// $edit 	= generate_summary($edit, "subtotal", $edit["detail"][0]["grid_id"]);
	$edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["form_group_class"]       = "";
	$edit["field"][$i]["label"]                  = "Subtotal";
	$edit["field"][$i]["input"]                  = "subtotal";
	$edit["field"][$i]["input_col"] = "col-sm-4";
	$edit["field"][$i]["input_class"] = "iptmoney";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	if ($edit['mode'] == 'add') {
		$edit["field"][$i]["input_attr"]["value"] = "0";
	}
	$i++;

	$edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["label"]                  = "Discount";
	$edit["field"][$i]["input"]                  = "diskon_prosentase";
	$edit["field"][$i]["input_col"] = "col-sm-2";
	$edit["field"][$i]["input_class"] = "iptpercent";
	$edit["field"][$i]["input_attr"]["maxlength"] = $_SESSION["setting"]["limit_percent"];
	if ($edit['mode'] == 'add') {
		$edit["field"][$i]["input_attr"]["value"] = "0";
	}
	$i++;

	$edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["label"]                  = "";
	$edit["field"][$i]["input"]                  = "diskon_nominal";
	$edit["field"][$i]["input_col"] = "col-sm-2";
	$edit["field"][$i]["input_class"] = "iptmoney";
	if ($edit['mode'] == 'add') {
		$edit["field"][$i]["input_attr"]["value"] = "0";
	}
	$i++;

	$edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["label"]                  = "UM";
	$edit["field"][$i]["input"]                  = "uang_muka";
	$edit["field"][$i]["input_col"] = "col-sm-4";
	$edit["field"][$i]["input_class"] = "iptmoney";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	if ($edit['mode'] == 'add') {
		$edit["field"][$i]["input_attr"]["value"] = "0";
	}
	$i++;

	$edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["form_group_class"]       = "";
	$edit["field"][$i]["label"]                  = "Total";
	$edit["field"][$i]["input"]                  = "total_include";
	$edit["field"][$i]["input_col"] = "col-sm-4";
	$edit["field"][$i]["input_class"] = "iptmoney";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	$edit["field"][$i]["input_attr"]["id"] = "total_include";
	if ($edit['mode'] == 'add') {
		$edit["field"][$i]["input_attr"]["value"] = "0";
	}
	$edit["field"][$i]["input_save"]             = "skip";
	$i++;

	$edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["label"]                  = "DPP";
	$edit["field"][$i]["input"]                  = "dpp";
	$edit["field"][$i]["input_col"] = "col-sm-4";
	$edit["field"][$i]["input_class"] = "iptmoney";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	if ($edit['mode'] == 'add') {
		$edit["field"][$i]["input_attr"]["value"] = "0";
	}
	$i++;

	$edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["label"]                  = "PPN";
	$edit["field"][$i]["input"]                  = "ppn_prosentase";
	$edit["field"][$i]["input_col"] = "col-sm-2";
	$edit["field"][$i]["input_class"] = "iptpercent";
	$edit["field"][$i]["input_attr"]["maxlength"] = $_SESSION["setting"]["limit_percent"];
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	if ($edit['mode'] == 'add') {
		$edit["field"][$i]["input_attr"]["value"] = "0";
	}
	$i++;

	$edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["label"]                  = "";
	$edit["field"][$i]["input"]                  = "ppn_nominal";
	$edit["field"][$i]["input_col"] = "col-sm-2";
	$edit["field"][$i]["input_class"] = "iptmoney";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	if ($edit['mode'] == 'add') {
		$edit["field"][$i]["input_attr"]["value"] = "0";
	}
	$i++;

	$edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["form_group_class"]       = "";
	$edit["field"][$i]["label"]                  = "Total";
	$edit["field"][$i]["input"]                  = "total";
	$edit["field"][$i]["input_col"] = "col-sm-4";
	$edit["field"][$i]["input_class"] = "iptmoney";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	if ($edit['mode'] == 'add') {
		$edit["field"][$i]["input_attr"]["value"] = "0";
	}
	$i++;
	

	$i 		= count($edit["field"]);
	// $edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["form_group_class"] = "hiding";
	$edit["field"][$i]["label"] = "PPH21 / 23";
	$edit["field"][$i]["input"] = "toggle_pph";
	$edit["field"][$i]["input_element"] = "select1";
	// $edit["field"][$i]["input_option"] = array("0|-","0.5|0.5","2|2","2.5|2.5","3|3","4|4","5|5","6|6");
	$edit["field"][$i]["input_option"]                  = array();

	$pph = explode(";", $_SESSION["setting"]["pph"]);
	foreach ($pph as $opsi)
		array_push($edit["field"][$i]["input_option"], $opsi);

	$edit["field"][$i]["input_attr"]["onchange"] = "toggle_pph21_23()";
	$edit["field"][$i]["input_col"] = "col-sm-2";
	// $edit["field"][$i]["input_save"]             = "skip";
	$i++;

	// $edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["form_group_class"]       = "hiding";
	$edit["field"][$i]["label"]                  = "";
	$edit["field"][$i]["input"]                  = "pph21_23_accounting";
	$edit["field"][$i]["input_col"] = "col-sm-2";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	// $edit["field"][$i]["input_save"]             = "skip";
	$i++;

	$edit["field"][$i]["form_group_class"]       = "hiding";
	$edit["field"][$i]["label"] = "PPN / Non-PPN";
	$edit["field"][$i]["input"] = "ppn";
	$edit["field"][$i]["input_element"] = "select1";
	$edit["field"][$i]["input_option"] = array("0|Non-PPN", "1|PPN");
	$edit["field"][$i]["input_attr"]["onchange"] = "toggle_ppn()";
	$i++;

	// $edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["form_group_class"]       = "hiding";
	$edit["field"][$i]["label"]                  = "Total Hutang Usaha";
	$edit["field"][$i]["input"]                  = "total_hutang_usaha";
	$edit["field"][$i]["input_col"] = "col-sm-4";
	$edit["field"][$i]["input_class"] = "iptmoney";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	$i++;

	// $edit["field"][$i]["form_group"] = 0;
	$edit["field"][$i]["form_group_class"]       = "hiding";
	$edit["field"][$i]["label"]                  = "Nominal PPH 21/23";
	$edit["field"][$i]["input"]                  = "pph21_23";
	$edit["field"][$i]["input_col"] = "col-sm-4";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	$edit["field"][$i]["input_class"] = "iptmoney";
	// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	$i++;
	
	// $edit["field"][$i]["form_group"] = 0;
	// NOTE: DISKON SUM dari DETAIL
	$edit["field"][$i]["form_group_class"]       = "hiding";
	$edit["field"][$i]["label"]                  = "Discount";
	$edit["field"][$i]["input"]                  = "total_diskon";
	$edit["field"][$i]["input_col"] = "col-sm-4";
	$edit["field"][$i]["input_class"] = "iptmoney";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	$i++;
	// END SETTING FORM HEADER



	// QUERY FOR VIEW AND EDIT
	if ($edit["mode"] != "add") {
		$edit["field"][$grid[0]]["grid_set"]["query"] = "
		SELECT DISTINCT 
		a.*,
		DATE_FORMAT(a.tanggal_permintaan_kirim,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_permintaan_kirim,
		a.keterangan as keterangan_barang,
		t.kode as kode_permintaan,
		d.nama as nama_barang,
		b.jumlah as qty_permintaan,
		b.keterangan as keterangan_permintaan,
		f.nama as satuan_permintaan,
		e.nama as satuan_purchasing
		FROM " . $edit["detail"][0]["table_name"] . " a
		join tdbelipermintaan b on b.nomor = a.nomortdbelipermintaan
		join thbelipermintaan t on t.nomor = b.nomorthbelipermintaan 
		left join mhbarang d on d.nomor = a.nomormhbarang 
		left join mhsatuan e on e.nomor = a.nomormhsatuan
		left join mhsatuan f on f.nomor = b.nomormhsatuan
		WHERE a.status_aktif > 0 AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];


		var_dump($edit["field"][$grid[0]]["grid_set"]["query"]);

		$edit = fill_value($edit, $r);
	}
	// END QUERY FOR VIEW AND EDIT

	$_SESSION["setting"]["field_status_disetujui"] = "status_disetujui";
	$_SESSION["setting"]["field_disetujui_pada"] = "disetujui_pada";
	$_SESSION["setting"]["field_disetujui_oleh"] = "disetujui_oleh";
	if ($r["status_disetujui"] == 1) {
		$features = "add|back|reload|disappr|print|close";
		if ($_SESSION['login']['nomor'] == 1) {
			// $features = "edit|save|add|back|reload|disappr|print|close";
		}
	} else if ($r["status_disetujui"] == 2) {
		$features = "add|back|print|reload";
	} else {
		$features = "add|save|back|delete|reload|approve|print|edit";
	}

	$edit_navbutton = generate_navbutton($edit_navbutton, $features);
	$grid_str = generate_grid_string($edit["field"], $grid);
	$grid_elm = generate_grid_string($edit["field"], $grid, "element");
	?>

	<script type="text/javascript">
		$(document).ready(function() {
			hide_and_show_based_on_ppn_status();
			$(<?= $grid_elm[0] ?>).jqGrid('clearGridData');
		});

		// HEADER VALIDATION
		function checkHeader() {
			var fields = ["kode|Kode"];
			var check_failed = check_value_elements(fields);
			if (check_failed != '')
				return check_failed;
			else
				return true; 
		}
		// END HEADER VALIDATION
		function pad(str, max) {
			str = str.toString();
			return str.length < max ? pad("0" + str, max) : str;
		}

		$(document).ready(function() {
			hide_and_show_based_on_ppn_status();

			// remove on click listener on .approve
			$('.approve').off('click');

			$('#uang_muka').on('keyup', function() {
				sum_subtotal_transaksi_order_pembelian_detail()
			});


			$('#diskon_prosentase').on('keyup', function() {
				var subtotal = $('#subtotal').val();
				var diskon_prosentase = $('#diskon_prosentase').val();

				var diskon_nominal = subtotal * (diskon_prosentase / 100);
				var diskon_nominal1 = diskon_nominal.toFixed(2);

				console.log(diskon_nominal1);
				$("input[name=diskon_nominal]").val(diskon_nominal1);

				// document.getElementById('diskon_nominal').value = diskon_nominal1
				sum_subtotal_transaksi_order_pembelian_detail()
			});

			$('#diskon_nominal').on('keyup', function() {
				var subtotal = $('#subtotal').val();
				var diskon_nominal = $('#diskon_nominal').val();

				var diskon_prosentase = (diskon_nominal / subtotal * 100);
				var diskon_prosentase1 = diskon_prosentase.toFixed(2);

				$("input[name=diskon_prosentase]").val(diskon_prosentase1);
				// document.getElementById('diskon_prosentase').value = diskon_prosentase
				sum_subtotal_transaksi_order_pembelian_detail()
			});

			//PRINT
			<?php if ((($r["status_disetujui"] == 1 && $r["status_disetujui_2"] == 1) || $r["status_disetujui_3"] == 1) && $edit["mode"] == "view") { ?>
				buttonPrint = "<a class='btn btn-primary print'><i class='fa fa-print' aria-hidden='true' title='print'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;";
				$(".bs-example").prepend(buttonPrint);
			<?php } ?>

			// sum_subtotal_<?= $grid_id ?>();
			// <?php if ($edit["mode"] != "view") { ?>
			// 	setTimeout(function() {
			// 		// toggle_ppn();
			// 	}, 200);
			// <?php } ?>

			$('.summary_<?= $grid_str[0] ?>').blur(function() {
				// calculate_summary('<?= $grid_str[0] ?>');
				// toggle_pph21_23();
			});

			var status_disetujui = parseInt(<?= $r['status_disetujui'] ?>);
			var mode = '<?= $edit["mode"] ?>';

			if (status_disetujui === 1 || mode == 'add') {
				$('#check_detail_button').hide();
			}

		});

		function check_detail_order_beli() {
			$.ajax({
				type: "post",
				url: "pages/check_detail_order_beli.php",
				data: {
					nomorthorderpembelian: parseInt(<?= $_GET['no'] ?>)
				},
				success: function(response) {
					var data = JSON.parse(response);
					console.log({
						data
					})

					var message = [];
					// looping trough data
					for (var i = 0; i < data.length; i++) {
						if (parseFloat(data[i].jumlah_bayar) + parseFloat(data[i].ter_po) > parseFloat(data[i].jumlah_minta)) {
							message.push(`${data[i].kode_permintaan} | ${data[i].material} | ${data[i].tipe} | ${data[i].ukuran} | qty minta =  ${data[i].jumlah_minta}, sudah ter_po = ${data[i].ter_po}, jumlah_order = ${data[i].jumlah_bayar}, melebihi permintaan sejumlah ${parseFloat(data[i].jumlah_bayar) + parseFloat(data[i].ter_po) - parseFloat(data[i].jumlah_minta)}`)
						}
					}

					if (message.length) {
						$.alert({
							icon: 'fa fa-exclamation-triangle',
							theme: 'modern',
							closeIcon: true,
							animation: 'scale',
							type: 'red',
							title: 'NOTIFICATION',
							content: `
								Approval transaksi ini dapat menyebabkan order beli melebihi permintaan
								<ol>
									${message.map((item) => `<li>${item}</li>`).join('')}
								</ol>
							`,
						});
					} else {
						// return false;
						$.alert({
							icon: 'fa fa-exclamation-triangle',
							theme: 'modern',
							closeIcon: true,
							animation: 'scale',
							type: 'green',
							title: 'NOTIFICATION',
							content: `
								Approval untuk saat ini tidak menyebabkan order beli melebihi permintaan
							`,
						});
					}
				},
				error: function() {
					alert("Pengecekan gagal, (Network error)");
				}
			});
		}

		// on mouse enter

		$(document).on('mouseenter', '.approve', function(event) {
			$.ajax({
				type: "post",
				url: "pages/check_detail_order_beli.php",
				data: {
					nomorthorderpembelian: parseInt(<?= $_GET['no'] ?>)
				},
				success: function(response) {
					var data = JSON.parse(response);
					console.log({
						data
					})

					var message = [];
					// looping trough data
					for (var i = 0; i < data.length; i++) {
						if (parseFloat(data[i].jumlah_bayar) + parseFloat(data[i].ter_po) > parseFloat(data[i].jumlah_minta)) {
							message.push(`${data[i].kode_permintaan} | ${data[i].material} | ${data[i].tipe} | ${data[i].ukuran} | qty minta =  ${data[i].jumlah_minta}, sudah ter PO = ${data[i].ter_po}, jumlah_order = ${data[i].jumlah_bayar}, melebihi permintaan sejumlah ${parseFloat(data[i].jumlah_bayar) + parseFloat(data[i].ter_po) - parseFloat(data[i].jumlah_minta)}`)
						}
					}

					if (message.length) {
						// show confirmation alert with buttons
						var object = $.confirm({
							icon: 'fa fa-exclamation-triangle',
							theme: 'modern',
							closeIcon: true,
							animation: 'scale',
							type: 'red',
							title: 'NOTIFICATION',
							content: `
								Approval transaksi ini dapat menyebabkan order beli melebihi permintaan
								<ol>
									${message.map((item) => `<li>${item}</li>`).join('')}
								</ol>
							`,
							buttons: {
								confirm: {
									text: 'Approve',
									action: function() {
										// return false;
										return link_confirmation('Apakah Anda yakin?', '?m=transaksi_order_beli&f=header_grid&&sm=approve&no=<?= $_GET['no'] ?>', '', 'Approve')
									}
								},
								cancel: function() {
									// do nothing
								}
							}
						});

					} else {
						// do nothing
					}
				},
				error: function() {
					alert("Pengecekan gagal (Network error)");
				}
			});
		})

		function hide_and_show_based_on_ppn_status() {
			console.log('hide_and_show_based_on_ppn_status')
			var status_ppn = $('#status_ppn').val();

			if (status_ppn == 'Exclude') {
				$('.field_group_22').hide();
				$('.field_group_23').show();
				$('.field_group_24').show();
				$('.field_group_25').show();
				$('.field_group_26').show();
			} else if (status_ppn == 'Include') {
				$('.field_group_22').show();
				$('.field_group_23').show();
				$('.field_group_24').show();
				$('.field_group_25').show();
				$('.field_group_26').hide();
			} else {
				$('.field_group_22').show();
				$('.field_group_23').hide();
				$('.field_group_24').hide();
				$('.field_group_25').hide();
				$('.field_group_26').hide();
			}
		}

		function currency(x) {
			var parts = x.toString().split(".");
			if (typeof parts[1] != 'undefined') {
				parts[1] = parts[1].substr(0, 2);
			}

			parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			return parts.join(",");
		}

		function toggle_ppn() {
			var ppn = $('#ppn').val();
			var status_ppn = $('#status_ppn').val();

			if (status_ppn == 'Non PPN') {
				$('#ppn').val(0);
				$('#ppn_prosentase').val(0);
				$('#ppn_nominal').val(0);
			} else {
				$('#ppn').val(1);
				$('#ppn_prosentase').val(<?= $_SESSION["setting"]["ppn"] ?>);
				$('#ppn_nominal').val(0);
			}

			hide_and_show_based_on_ppn_status();

			sum_subtotal_transaksi_order_pembelian_detail();
			reload_summary();
			toggle_pph21_23();
		}

		function reload_summary() {
			// calculate_summary('<?= $grid_str[0] ?>');

			// var dpp = parseFloat($("#dpp").val());
			// var ppn_prosentase = parseFloat($("#ppn_prosentase").val());
			// $('#ppn_nominal').val(dpp * ppn_prosentase / 100);

			// var ppn_nominal = parseFloat($('#ppn_nominal').val());

			// $('#total').val(dpp + ppn_nominal);
		}

		function toggle_pph21_23() {
			// var subtotal = $('#sum_total_transaksi_order_pembelian_detail').val();
			// var diskon = $('#total_diskon').val();
			// var pph = 0;
			// var nominal_pph = 0;

			// pph = $('#toggle_pph').val();

			// nominal_pph = pph * subtotal / 100;
			// var total = $("#sum_total_transaksi_order_pembelian_detail").val();
			// // alert(nominal_pph);
			// $("#pph21_23_accounting").val("(" + currency(nominal_pph) + ")");
			// $("#pph21_23").val(nominal_pph);
			// $("#total_hutang_usaha").val(total - nominal_pph);


		}


		$(document).on('click', '.save', function(event) {
			event.preventDefault();
			var obj = $.dialog({
				icon: 'fa fa-spinner fa-spin',
				title: 'Working!',
				draggable: false,
				// theme: 'modern',
				animation: 'scale',
				// type: 'orange',
				content: '<font style="font-size:14px">Pengecekan Data..</font>',
				buttons: {
					ok: {
						isHidden: true,
					}
				},
				onOpen: function() {
					var uang_muka = parseFloat($("#uang_muka").val());
					var dpp = parseFloat($("#subtotal").val()) - parseFloat($("#diskon_nominal").val());

					if (uang_muka > dpp) {
						uang_muka = uang_muka.toLocaleString('id-ID', {
							style: 'currency',
							currency: 'IDR',
						});

						dpp = dpp.toLocaleString('id-ID', {
							style: 'currency',
							currency: 'IDR',
						});
						$.alert({
							icon: 'fa fa-exclamation-triangle',
							theme: 'modern',
							closeIcon: true,
							animation: 'scale',
							type: 'red',
							title: 'NOTIFICATION',
							content: `Uang Muka (${uang_muka}) tidak boleh lebih besar dari DPP (Subtotal - Diskon) = ${dpp}`,
							onClose: function() {
								obj.close();
							}
						});
					} else {
						obj.close();
						$('form#form_edit').submit();
					}
				}
			});
		});


		<?= generate_function_checkgrid($grid_str) ?> <?= generate_function_checkunique($grid_str) ?> <?= generate_function_realgrid($grid_str) ?>
	</script>