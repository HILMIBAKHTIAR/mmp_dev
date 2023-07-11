<?php
// SETTING DEFAULT
$edit["debug"]       = 1;
$edit["uppercase"]   = 1;
$edit["unique"]      = array("kode|Kode");
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
$edit["string_summary"] 	= $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

if ($edit["mode"] != "add") {
	$edit["query"] = " SELECT
		a.*,
		DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
		CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi',
		CONCAT(dpt.nama, '|', dpt.nomor) AS 'browse|nomormhdepartemen'
		FROM thbeliorder a	
		join mhrelasi b on b.nomor = a.nomormhrelasi
		JOIN mhdepartemen dpt ON dpt.nomor = a.nomormhdepartemen
		WHERE a.status_aktif > 0 and a.nomor = " . $_GET["no"];

	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

	$edit = fill_value($edit, $r);

	if ($edit["debug"] > 0)
		echo $edit["query"];
}

$edit["sp_approve"] = "sp_disetujui_thbeliorder";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thbeliorder";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";



$i = 0;
$edit["detail"][$i]["table_name"] = "tdbeliorder";
$edit["detail"][$i]["field_name"] = array(
	"nomorthbelipermintaan",
	"nomortdbelipermintaan",
	"nomormhlokasi",
	"nomormhbarang",
	"barang",
	"nomormhdepartemen",
	"nomormhsatuanqty",
	"jumlah_permintaan",
	"jumlah_konversi",
	"jumlah_order",
	"harga_satuan",
	"diskon_1",
	"diskon_nominal_1",
	"subtotal",
	"keterangan",
	"tanggal_permintaan|coltemplate_date_1",
	"tanggal_kirim|coltemplate_date_1",
	"nomormhsatuanberat",
	"nomor"

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
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
} else {
	if (isset($_GET["no"])) {
		$edit["field"][$i]["box_tabs"] = array("data|Data");
	} else {
		$edit["field"][$i]["box_tabs"] = array("data|Data");
	}
}


// SETTING FIELD
$edit["field"][$i]["box_tab"]                 = "data";


$edit["field"][$i]["label"] 						= "Kode";
$edit["field"][$i]["input"] 						= "kode";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
$i++;


$edit["field"][$i]["label"] = "NO. FORM";
$edit["field"][$i]["input"] = "kode_custom";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;



$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_attr"]["onchange"] = "load_grid_detail()";
$i++;

$edit["field"][$i]["label"]                     = "Supplier";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_supplier";
$edit["field"][$i]["browse_set"]["param_output"]     = array(
	"ppn|ppn", "top|top"
);
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "PPN / Non-PPN";
$edit["field"][$i]["input"] = "ppn";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("0|Non-PPN", "1|PPN");
$edit["field"][$i]["input_attr"]["onchange"] = "calculate_all()";
// $edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
$i++;

$edit["field"][$i]["label"]                   = "TOP (Term Of Payment)";
$edit["field"][$i]["input"]                   = "top";
$edit["field"][$i]["input_class"]             = "required type_number_nominus";
$edit["field"][$i]["label_class"]      = "req";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
$i++;

$edit["field"][$i]["label"]                     = "Departemen";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhdepartemen";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_departemen";
$edit["field"][$i]["browse_set"]["call_function"] = array("calculate_all");
$edit["field"][$i]["browse_set"]["param_output"]     = array(
	"nomor|test"
);
$i++;

$edit["field"][$i]["label"]                   = "Test";
$edit["field"][$i]["input"]                   = "test";
$edit["field"][$i]["input_class"]             = "required type_number_nominus";
$edit["field"][$i]["label_class"]      = "req";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_element"]      = "
	<a id='load_grid_detail_button' class='btn btn-info btn-app-sm' onclick=load_grid_detail()><i class='fa fa-refresh'></i></a>
";
$edit["field"][$i]["input_col"] = "col-sm-1";
$edit["field"][$i]["input_save"] = "skip";
$i++;



$edit = generate_info($edit, $r, "insert|update|approve|disappr");
$i = count($edit["field"]);

// ================================================================================== UPLOAD ======================================================

// $index = 0;
// if ($edit["mode"] != "add") {
// 	$edit["field"][$i]["box_tab"]             = "upload";
// 	$edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
// 	$edit["field"][$i]["input_element"]     = 'No Uploaded File';

// 	$file_nomor = $_GET["no"];
// 	$file_tabel = $edit["table"];
// 	$file_query = mysqli_query($con, " 
// 	SELECT nomor, `directory`, nama, category  
// 	FROM mharchievedfiles 
// 	WHERE 
// 		status_aktif > 0 AND 
// 		category = 'ORDERBELI' AND 
// 		tablename = '$file_tabel' AND 
// 		filenumber = $file_nomor");
// 	$file_count = mysqli_num_rows($file_query);

// 	if ($file_count > 0) {
// 		$edit["field"][$i]["input_element"] = '';
// 		while ($row = mysqli_fetch_assoc($file_query)) {
// 			$json[] = $row;
// 			$edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
// 			$edit["field"][$i]["input_element"] .= '<a class="btn btn-block btn-outline btn-midnight" style= "white-space: break-spaces; margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["directory"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["category"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
// 			if ($edit["mode"] != "view")
// 				$edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="color:white;position:relative;top:-26px;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>';
// 			$edit["field"][$i]["input_element"] .= '</div>';
// 			$index++;
// 		}
// 	}
// 	$edit["field"][$i]["input_save"] = "skip";
// 	$i++;
// }


// ==================================================================================END UPLOAD ======================================================

$edit["fields"][$i]["box_tabs_close"] = 1;

// $edit["field"][$i]["box_tabs"]                                = array(
// 	"order_beli|Pra Order Beli",
// );

$edit["field"][$i]["box_tab"]                                 = "order_beli";
$grid[0]                                                      = $i;

$edit["field"][$i]["input_element"]                           = "grid";
$edit["field"][$i]["grid_set"]                                = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                          = "order_pembelian_detail";
$edit["field"][$i]["grid_set"]["option"]["caption"]           = "'Detail Order Beli'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]          = "	
	'Kode Permintaan',	
	'Tanggal',
	'Departemen',
	'Barang',
	'Lokasi',
	'Jumlah Minta', 
	'Satuan',
	'Keterangan',
	'jumlah Konversi',
	'Jumlah Order',
	'Satuan',	
	'Harga',
	'Disc Amount (Rp)',
	'Diskon (%)',
	'Subtotal',
	'Keterangan',
	'Tanggal Kirim',
	'nomorthbelipermintaan',
	'nomortdbelipermintaan',
	'nomormhbarang',
	'nomormhdepartemen',
	'nomormhsatuanqty',
	'nomormhlokasi',
	'nomor'
	";
$edit["field"][$i]["grid_set"]["column"]                      = array(
	"kode_permintaan",
	"tanggal_permintaan",
	"departemen",
	"barang",
	"lokasi",
	"jumlah_permintaan",
	"satuan_permintaan",
	"keterangan_permintaan",
	"jumlah_konversi",
	"jumlah_order",
	"satuan_order",
	"harga_satuan",
	"diskon_nominal_1",
	"diskon_1",
	"subtotal",
	"keterangan",
	"tanggal_kirim",
	"nomorthbelipermintaan",
	"nomortdbelipermintaan",
	"nomormhbarang",
	"nomormhdepartemen",
	"nomormhsatuanqty",
	"nomormhlokasi",
	"nomor"

);
$edit["field"][$i]["grid_set"]["var"]["default_data"]         = "{}";

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
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'tanggal_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'tanggal_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_date_1";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'departemen'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'departemen'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'lokasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'lokasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jumlah_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jumlah_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'satuan_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'satuan_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'keterangan_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'keterangan_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jumlah_konversi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jumlah_konversi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jumlah_order'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jumlah_order'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'satuan_order'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'satuan_order'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_purchasing }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'harga_satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'harga_satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'diskon_nominal_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'diskon_nominal_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'diskon_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'diskon_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'tanggal_kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'tanggal_kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_date_1";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
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

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhdepartemen'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhdepartemen'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhlokasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhlokasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;



$row 																						= 0;
$k 														   									= 0;


$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]           				= "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]	= "'kode_permintaan'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "9";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]     		= "'Permintaan'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]           				= "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]	= "'jumlah_konversi'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "9";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]     		= "'Purchasing'";
$k++;
$row++;

$i++;



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



$edit = generate_summary($edit, "subtotal|diskon1|dpp|ppn|totalakhir", $edit["detail"][0]["grid_id"]);
$i++;
$i++;
$i++;
$i++;
$i++;
$i++;
$i++;



if ($edit["mode"] != "add") {

	// $edit["field"][$grid[0]]["grid_set"]["query"] = "
	// 	SELECT 
	// 		a.*,
	// 		c.kode as kode_permintaan,
	// 		l.nama as lokasi,
	// 		d.nama as barang,
	// 		DATE_FORMAT(a.tanggal_kirim,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_kirim,
	// 		DATE_FORMAT(a.tanggal_permintaan,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_permintaan,
	// 		g.nama as departemen,
	// 		e.nama as satuan_permintaan,
	// 		e.nomor as nomormhsatuanqty,
	// 		e.nama as satuan_order
	// 	FROM thbeliorder b
	// 	join tdbeliorder a on a.nomorthbeliorder = b.nomor 
	// 	join thbelipermintaan c on c.nomor = a.nomorthbelipermintaan
	// 	join tdbelipermintaan cc on cc.nomor = a.nomortdbelipermintaan
	// 	JOIN mhdepartemen g ON g.nomor = a.nomormhdepartemen 
	// 	join mhbarang d on d.nomor = a.nomormhbarang 
	// 	LEFT join mhlokasi l on l.nomor = a.nomormhlokasi
	// 	LEFT join mhsatuan e on e.nomor = a.nomormhsatuanqty
	// 	-- LEFT JOIN thbarang h ON h.nomor = d.nomormhcilinder
	// 	WHERE a.status_aktif > 0 AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

	$edit["field"][$grid[0]]["grid_set"]["query"] = "
		SELECT 
			a.*,
			c.kode as kode_permintaan,
			l.nama as lokasi,
			COALESCE(CONCAT(t3.kode_custom,' - ',i.nama), CONCAT(d.kode,' - ',h.nama), CONCAT(d.kode,' - ',d.nama)) AS barang,
			DATE_FORMAT(a.tanggal_kirim,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_kirim,
			DATE_FORMAT(a.tanggal_permintaan,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_permintaan,
			g.nama as departemen,
			e.nama as satuan_permintaan,
			e.nomor as nomormhsatuanqty,
			e.nama as satuan_order
		FROM thbeliorder b
		join tdbeliorder a on a.nomorthbeliorder = b.nomor 
		join thbelipermintaan c on c.nomor = a.nomorthbelipermintaan
		join tdbelipermintaan cc on cc.nomor = a.nomortdbelipermintaan
		JOIN mhdepartemen g ON g.nomor = a.nomormhdepartemen 
		join mhbarang d on d.nomor = a.nomormhbarang 
		LEFT join mhlokasi l on l.nomor = a.nomormhlokasi
		LEFT join mhsatuan e on e.nomor = a.nomormhsatuanqty
		left join mhwarna h on h.nomor = d.nomormhwarna
		LEFT JOIN thbarang i ON i.nomor = d.nomormhcilinder
		left JOIN thpemesanancylinder t3 ON t3.nomor = cc.nomorthpemesanancylinder 
		WHERE a.status_aktif > 0 AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];


	$edit = fill_value($edit, $r);
	if ($edit["debug"] > 0)
		echo $edit["field"][$grid[0]]["grid_set"]["query"];
}


$_SESSION["setting"]["field_status_disetujui"] = "status_disetujui";
$_SESSION["setting"]["field_disetujui_pada"] = "disetujui_pada";
$_SESSION["setting"]["field_disetujui_oleh"] = "disetujui_oleh";
if ($r["status_disetujui"] == 1) {
	$features = "add|back|reload|disappr|print|close";
} else if ($r["status_disetujui"] == 2) {
	$features = "add|back|print|reload";
} else {
	$features = "add|save|back|delete|reload|approve|print|edit";
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
// $edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload" . check_approval($r, "edit|approve|delete|disappr|print");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);

if ($edit["mode"] != "add") {
	$edit_navbutton["field"][$i]["input_element"]             = "a";
	$edit_navbutton["field"][$i]["input_float"]               = "right";
	$edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
	$edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
	$edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
	$edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
	$edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
		"link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=ORDERBELI&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
	$i++;
}


?>


<script type="text/javascript">

function test() {
        var kode = $("#kode").val();
        var test = $("#test").val();
        var jenis = $('#jenis').val();
        var edit_mode = '<?= $edit['mode'] ?>'
        if (edit_mode == 'edit') {
            kode = kode.substr(0, 5)
        }

        console.log({kode})


        var kepemilikan = ''
        var alias_customer = $('#alias_customer').val()
        var mmp = parseFloat($('#mmp').val())
        var customer = parseFloat($('#customer').val())

            console.log({
                alias_customer,
                mmp,
                customer
            })

            if (mmp) {
                kepemilikan = 'MMP'
            } else if (customer) {
                kepemilikan = alias_customer ?? 'CUSTOMER'
            } else {
                kepemilikan = 'NONE'
            }

            kepemilikan = 'MMP'

            console.log({
                kepemilikan
            })


            const currentDate = new Date();
            const year = currentDate.getFullYear().toString().substr(-2);
            const month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
            const code = `${kode}/${test}/VI/20${year}`;

            $('#kode_custom').val(code);

            return code;
        }


		
	$(document).ready(function() {
		<?php if ($edit["mode"] != "view") { ?>
			calculate_all();

		<?php } ?>

	});

	function load_grid_detail() {
		// console.log(<?= $edit["detail"][0]["grid_id"] ?>);
		$(<?= $grid_elm[0] ?>).jqGrid('clearGridData');

		var tanggal = $("#tanggal").val();
		var nomormhdepartemen = $("#browse_master_departemen_hidden").val();

		if (!nomormhdepartemen) return alert('Departemen harus diisi');

		// format tanggal from dd-mm-yyyy to yyyy-mm-dd
		var tanggal = tanggal.split('/');
		var tanggal = tanggal[2] + '-' + tanggal[1] + '-' + tanggal[0];

		var pages = 'pages/grid_load.php?id=<?= $edit["detail"][0]["grid_id"] ?>-load&tanggal=' + tanggal + '&nomormhdepartemen=' + nomormhdepartemen;
		console.log(pages);
		jQuery(<?= $grid_elm[0] ?>).jqGrid('setGridParam', {
			url: pages,
			datatype: 'json',
			loadComplete: function(data) {
				<?= $grid_str[0] ?>_load = 0;
				actGridComplete_<?= $grid_str[0] ?>();
				console.log("complete");
			}
		});
		jQuery(<?= $grid_elm[0] ?>).trigger('reloadGrid');

	}



	//PRINT
	// function print(nomor) {
	// 	$.confirm({
	// 		icon: 'fa fa-print',
	// 		theme: 'modern',
	// 		closeIcon: true,
	// 		animation: 'scale',
	// 		type: 'blue',
	// 		title: 'NOTIFICATION',
	// 		content: 'Apakah Anda Yakin?',
	// 		buttons: {
	// 			Ya: function() {
	// 				// event.preventDefault();
	// 				window.open(
	// 					'pages/print_invoice.php?m=transaksi_order_pembelian_lokal_stok&mk=transaksi_order_pembelian_lokal_stok&f=header_grid&&sm=edit&a=view&no=' + nomor
	// 				);

	// 			},
	// 			Tidak: function() {
	// 				event.preventDefault();
	// 				$.alert({
	// 					title: 'Decision',
	// 					content: '<font style="font-size: 14px;">Transaksi Dibatalkan</font>',
	// 					icon: 'fa fa-warning',


	// 				});
	// 			},

	// 		}


	// 	});
	// }

	//PRINT
	$(document).on('click', '.print', function(event) {
		var nomor = '<?= $_GET['no'] ?>';
		print(nomor);

	});




	// HEADER VALIDATION
	function checkHeader() {
		var fields = [
			'tanggal|Tanggal',
			'kode|Kode',
			'browse_master_supplier_hidden|Supplier',
			'browse_master_departemen_hidden|Departemen',
		];
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

	function checkKurs() {
		if ($('#browse_master_currency_search').val() == 'IDR') {
			$('#kurs').val(1);
			$('#kurs').prop('readonly', true);
		} else {
			$('#kurs').val(0);
			$('#kurs').prop('readonly', false);
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


	$(document).ready(function() {
		calculate_all()
	})

	function calculate_all() {

		var ppn = $('#ppn').val();
		console.log(ppn);
		if (ppn == 1) {
			$('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').val(<?php echo ($_SESSION["setting"]["ppn"]); ?>);
			$('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').attr('readonly', true);
			$('.ppn_section').removeClass('hide');
		} else {
			$('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').val(0);
			$('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').attr('readonly', true);
			$('.ppn_section').addClass('hide');
		}

		<?php if ($edit["mode"] != "view") { ?>
			// SUBTOTAL
			var subtotal_0 = jQuery(<?= $grid_elm[0] ?>).jqGrid('getCol', 'subtotal', false, 'sum');
			$('#sum_subtotal_<?= $grid_str[0] ?>').val(subtotal_0);

			calculate_summary('<?= $grid_str[0] ?>');

		<?php } ?>
	}


	<?= generate_function_checkgrid($grid_str) ?>
	<?= generate_function_checkunique($grid_str) ?>
	<?= generate_function_realgrid($grid_str) ?>
</script>