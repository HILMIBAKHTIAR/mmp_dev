<?php
// SETTING DEFAULT
$edit["debug"]       = 1;
$edit["uppercase"]   = 1;
// $edit["unique"]      = array("kode|Kode");
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
$edit["string_summary"] 	= $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
// $edit["manual_save"]="contents/menu_frame/header_grid-transaksi_order_pembelian_lokal_stok-save.php";

if ($edit["mode"] != "add") {
	$edit["query"] = " SELECT
		a.*,
		DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
		CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi'
		FROM thbeliorder a	
		left join mhrelasi b on b.nomor = a.nomormhrelasi
		WHERE a.nomor = " . $_GET["no"];

	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

	$edit = fill_value($edit, $r);

	if ($edit["debug"] > 0)
		echo $edit["query"];
}




// $edit["sp_approve"] = "sp_disetujui_order_beli_fix";
$edit["sp_approve"] = "sp_disetujui_orderpembelian";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_orderpembelian";
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
	"nomormhbarang",
	"nomormhsatuanqty",
	"jumlah",
	"jumlah_konversi",
	"jumlah_unit",
	"harga_satuan",
	"diskon_1",
	"diskon_nominal_1",
	"subtotal", 
	"keterangan",
	"tanggal_permintaan_kirim|coltemplate_date_1",
	"nomormhsatuanberat",
	"jumlah_berat"
	
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;



// END SETTING DATA GRID

// SETTING FORM HEADER

$i = 0;

if(!empty($_GET["a"]) && $_GET["a"] == "view"){
	$edit["field"][$i]["box_tabs"] = array("data|Data","upload|Upload","info|Info");
}
 else {
	if(isset($_GET["no"])){
		$edit["field"][$i]["box_tabs"] = array("data|Data","upload|Upload");
	}else{
		$edit["field"][$i]["box_tabs"] = array("data|Data");
	}
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


// $edit["field"][$i]["label"]                   = "Bisa Konversi?";
// $edit["field"][$i]["input_element"] = "checkbox";
// $edit["field"][$i]["input_col"] = "col-sm-9 ";
// $edit["field"][$i]["input"]            = "bisa_konversi";
// $i++;


// $edit["field"][$i]["label"] 						= "PPN / Non-PPN";
// $edit["field"][$i]["input"] 						= "ppn";
// $edit["field"][$i]["input_element"] 				= "select1";
// $edit["field"][$i]["input_option"] 					= array("1|PPN","0|Non-PPN");
// // $edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// // $edit["field"][$i]["input_attr"]["onchange"] 		= "calculate_all()";
// $edit["field"][$i]["input_value"] 			= 1;
// $i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "PPN / Non-PPN";
$edit["field"][$i]["input"] = "ppn";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("0|Non-PPN","1|PPN");
$edit["field"][$i]["input_attr"]["onchange"] = "calculate_all()";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "PPN Default";
$edit["field"][$i]["input"] = "ppn_default";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_save"] = "skip";
if($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 0;
$i++;


// $edit["field"][$i]["label"] 						= "Inc/Exc PPN";
// $edit["field"][$i]["input"] 						= "status_ppn";
// $edit["field"][$i]["input_element"] 				= "select1";
// $edit["field"][$i]["input_option"] 					= array("Include|Include PPN","Exclude|Exclude PPN");
// $edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// $edit["field"][$i]["input_attr"]["onchange"] 		= "calculate_all()";
// $i++;

$edit["field"][$i]["label"]                   = "TOP (Term Of Payment)";
$edit["field"][$i]["input"]                   = "top";
$edit["field"][$i]["input_class"]             = "required type_number_nominus";
$edit["field"][$i]["label_class"]      = "req";
$i++;

// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["form_group"]              = 0;
// $edit["field"][$i]["label"]                   = "";
// $edit["field"][$i]["input_element"]      = "
// 	<a id='load_grid_detail_button' class='btn btn-info btn-app-sm' onclick=load_grid_detail()><i class='fa fa-refresh'></i></a>
// ";
// $edit["field"][$i]["input_col"] = "col-sm-1";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;



$edit = generate_info($edit, $r, "insert|update");
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
	'Qty Berat',
	'Satuan Berat',		
	'Harga',
	'Diskon 1(%)',
	'diskon_nominal_1',
	'Sub Total',
	'Keterangan',
	'nomorthbelipermintaan',
	'nomortdbelipermintaan',
	'jumlah_konversi',
	'jumlah',
	'nomormhbarang',
	'nomormhsatuanqty',
	'Tanggal Kirim',
	'nomormhsatuanberat'
	";
$edit["field"][$i]["grid_set"]["column"]                      = array(
	"kode_permintaan",
	"nama_barang",
	"qty_permintaan",
	"satuan_permintaan",
	"keterangan_permintaan",
	"jumlah_unit",
	"satuan_purchasing",
	"jumlah_berat",
	"satuan_berat",
	"harga_satuan",
	"diskon_1",
	"diskon_nominal_1",
	"subtotal",
	"keterangan",
	"nomorthbelipermintaan",
	"nomortdbelipermintaan",
	"jumlah_konversi",
	"jumlah",
	"nomormhbarang",
	"nomormhsatuanqty",
	"tanggal_permintaan_kirim",
	"nomormhsatuanberat"

);
$edit["field"][$i]["grid_set"]["var"]["default_data"]         = "{
	kode_permintaan:'',
	nama_barang:'',
	qty_permintaan:'0',
	satuan_permintaan:'',
	keterangan_permintaan:'',
	jumlah_unit:'0',
	satuan_purchasing:'',
	jumlah_berat:'',
	satuan_berat:'',
	harga_satuan:'0',
	diskon_1:'0',
	diskon_nominal_1:'',
	subtotal:'0',
	keterangan:'',
	nomorthbelipermintaan:'',
	nomortdbelipermintaan:'',
	jumlah_konversi:'1',
	jumlah:'0',
	nomormhbarang:'',
	nomormhsatuanqty:'',
	tanggal_permintaan_kirim:'',
	nomormhsatuanberat:''
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


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jumlah_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jumlah_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'satuan_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'satuan_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_berat_purchasing }";
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

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'diskon_nominal_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'diskon_nominal_1'";
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
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
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

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'tanggal_permintaan_kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'tanggal_permintaan_kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_date_1";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhsatuanberat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhsatuanberat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
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

// $edit = generate_summary($edit,"subtotal|diskon1|subtotalakhir|totalakhir|dpp|ppn|totalbayar", $edit["string_summary"]);
// $edit = generate_summary($edit,"diskon1|ppn|dpp|subtotalakhir", $edit["string_summary"]);

// $edit = generate_summary($edit,"subtotal|diskon1|dpp|ppn|totalakhir",$edit["detail"][0]["grid_id"]);

$edit = generate_summary($edit,"subtotal|diskon1|dpp|ppn|totalakhir",$edit["detail"][0]["grid_id"]);
$i++;
$i++;
$i++;
$i++;
$i++;
$i++;
$i++;


  
if ($edit["mode"] != "add") {

	$edit["field"][$grid[0]]["grid_set"]["query"] = "SELECT DISTINCT 
			a.*,
			DATE_FORMAT(a.tanggal_permintaan_kirim,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_permintaan_kirim,
			a.keterangan as keterangan_barang,
			t.kode as kode_permintaan,
			d.nama as nama_barang,
			b.jumlah as qty_permintaan,
			b.keterangan as keterangan_permintaan,
			e.nama as satuan_permintaan,
			e.nama as satuan_purchasing,
			f.nama as satuan_berat
			FROM " . $edit["detail"][0]["table_name"] . " a
			join tdbelipermintaan b on b.nomor = a.nomortdbelipermintaan
			join thbelipermintaan t on t.nomor = b.nomorthbelipermintaan 
			left join mhbarang d on d.nomor = a.nomormhbarang 
			left join mhsatuan e on e.nomor = a.nomormhsatuanqty
			left join mhsatuan f on f.nomor = b.nomormhsatuanberat
			WHERE a.status_aktif > 0 AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];


	$edit = fill_value($edit, $r);
	if ($edit["debug"] > 0)
		echo $edit["field"][$grid[0]]["grid_set"]["query"] ;
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
$features = "save|back|reload".check_approval($r,"edit|approve|delete|disappr|print");
$edit_navbutton = generate_navbutton($edit_navbutton,$features);

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
	$(document).ready(function() {
		<?php if($edit["mode"] != "view") { ?>
		calculate_all();

		<?php } ?>
		
	});

	function load_grid_detail() {
		// console.log(<?= $edit["detail"][0]["grid_id"] ?>);
		$(<?= $grid_elm[0] ?>).jqGrid('clearGridData');
		var pages = 'pages/grid_load.php?id=<?= $edit["detail"][0]["grid_id"] ?>-load';
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
	function print(nomor) {
		$.confirm({
			icon: 'fa fa-print',
			theme: 'modern',
			closeIcon: true,
			animation: 'scale',
			type: 'blue',
			title: 'NOTIFICATION',
			content: 'Apakah Anda Yakin?',
			buttons: {
				Ya: function() {
					// event.preventDefault();
					window.open(
						'pages/print_invoice.php?m=transaksi_order_pembelian_lokal_stok&mk=transaksi_order_pembelian_lokal_stok&f=header_grid&&sm=edit&a=view&no=' + nomor
					);

				},
				Tidak: function() {
					event.preventDefault();
					$.alert({
						title: 'Decision',
						content: '<font style="font-size: 14px;">Transaksi Dibatalkan</font>',
						icon: 'fa fa-warning',


					});
				},

			}


		});
	}

	//PRINT
	$(document).on('click', '.print', function(event) {
		var nomor = '<?= $_GET['no'] ?>';
		print(nomor);

	});

	
	

		// HEADER VALIDATION
	function checkHeader() {
        var fields = [
          
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

	function checkKurs(){
		if($('#browse_master_currency_search').val()=='IDR'){
			$('#kurs').val(1);
			$('#kurs').prop('readonly', true);
		}
		else{
			$('#kurs').val(0);
			$('#kurs').prop('readonly', false);
		}
	}


	// $(document).ready(function(){
	// 	sum_subtotal_<?=$grid_str[0]?>()
	// 	<?php if($edit["mode"] != "view"){ ?>
	// 		setTimeout(function(){
	// 		calculate_all();
	// 		},200);
	// 	<?php } ?>
	// 	$('#ppn_prosentase').attr("readonly",true);
	// 	$('#toggle_pph').attr("readonly",true);

	// 	$('.summary_<?=$grid_str[0]?>').blur(function(){
	// 		calculate_all();
	// 	});
		
	// 	var today = new Date();
	// 	var dd = pad(today.getDate(),2);
	// 	var mm = pad(today.getMonth()+1,2); //January is 0!
	// 	var yyyy = today.getFullYear();
	// 	var customtodaydate=dd+'-'+mm+'-'+yyyy;
	// 	var todaydate=yyyy+'-'+mm+'-'+dd;
	// 	<?php if($edit["mode"] == "add"){ ?>
	// 		$(".custom_tanggal").val(customtodaydate);
	// 		$(".custom_tanggal_jatuh_tempo").val(customtodaydate);
			
	// 	<?php } ?>
	// 	$('#bulan').val(pad(mm,2));
	// 	$("#tahun").val(yyyy.toString().substr(-2));

		
	// 	var date = $('.custom_tanggal').datepicker({ 
	// 		dateFormat: 'dd-mm-yy',
	// 		altFormat: "yy-mm-dd",
	// 		altField: "#tanggal",
	// 		changeMonth: true,
    // 		changeYear: true,
    // 		minDate: new Date('<?=$_SESSION["setting"]["start_date"]?>'),
   	// 		maxDate: '+30D',
	// 		onSelect: function(dateText, inst) { 
	// 			var date = $(this).datepicker('getDate'),
	// 			day  = date.getDate(),  
	// 			month = date.getMonth() + 1,              
	// 			year =  date.getFullYear();
	// 			$("#tahun").val(year.toString().substr(-2));
	// 			$("#bulan").val(pad(month,2));

	// 		}
	// 	}).val();

	// 	<?php if($edit["mode"] == "view"){ ?>
	// 		$(".custom_tanggal").datepicker('disable');
	// 	<?php } ?>
	// });
	
	function currency(x) {
    	var parts = x.toString().split(".");
    	if(typeof  parts[1] != 'undefined'){
    		parts[1]=parts[1].substr(0,2);
    	}
    	
	    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	    return parts.join(",");
	}
	 
	// function calculate_all(){

	// 	<?php if($edit["mode"] != "view") { ?>
	
	// 		var ppn = $('#ppn').val();
	// 		var subtotal= parseFloat($("#sum_subtotal_<?=$grid_str[0]?>").val());
	// 		var diskon_1_nominal= parseFloat($("#sum_diskon1nominal_<?=$grid_str[0]?>").val());
	// 		// var dpp = $("#sum_dpp_<?=$grid_str[0]?>").val();

			
	// 		// var dpp =  subtotal - diskon_1_nominal
	// 		var dpp =  subtotal - diskon_1_nominal
		
			

	// 		// console.log({
	// 		// 	ppn, 
	// 		// 	subtotal,
	// 		// 	diskon_1_nominal
	// 		// })

	// 	    if(ppn == 1)
	// 	    {
	// 	        $('#sum_ppn_<?=$grid_str[0]?>').val(<?php echo($_SESSION["setting"]["ppn"]); ?>);
	// 	        // $('#sum_ppn_<?=$grid_str[0]?>').attr('readonly',true);
	// 	        var ppn_prosentase = $('#sum_ppn_<?=$grid_str[0]?>').val();
	// 			console.log({ppn_prosentase, dpp})
	// 	        $('#sum_ppnnominal_<?=$grid_str[0]?>').val(ppn_prosentase / 100 * dpp);
	// 			var ppn_nominal= parseFloat($("#sum_diskon1nominal_<?=$grid_str[0]?>").val());
	// 	    }
	// 	    else
	// 	    {
	// 	        $('#sum_ppn_<?=$grid_str[0]?>').val(0);
	// 	        // $('#sum_ppn_<?=$grid_str[0]?>').attr('readonly',true);
	// 			$('#ppn_include').val(0);
	// 			$('#sum_ppnnominal_<?=$grid_str[0]?>').val(0);
	// 			$('#sum_total_<?=$grid_str[0]?>').val(0);
	// 	    } 
			
	// 		var subtotal_0 = jQuery(<?=$grid_elm[0]?>).jqGrid('getCol','subtotal',false,'sum');
	// 		var subtotal_1 = 0; //jQuery(<?=$grid_elm[1]?>).jqGrid('getCol','subtotal',false,'sum');
	// 		var subtotal_2 = 0; //jQuery(<?=$grid_elm[2]?>).jqGrid('getCol','subtotal',false,'sum');
	// 		var subtotal = (subtotal_0*1) + (subtotal_1*1) + (subtotal_2*1);
	// 		$('#sum_subtotal_<?=$grid_str[0]?>').val(subtotal);

			 
			 
	// 		calculate_summary('<?=$grid_str[0]?>');

	// 		var diskon_prosentase= parseFloat($("#sum_diskon1_<?=$grid_str[0]?>").val());
	// 		$('#sum_diskon1nominal_<?=$grid_str[0]?>').val(diskon_prosentase / 100 * subtotal);
			
	// 		var total = $('#sum_total_<?=$grid_str[0]?>').val(subtotal - (diskon_prosentase / 100 * subtotal) + (ppn_prosentase / 100 * dpp));


	// 	    var kurs = $('#kurs').val();

		 
	// 	    var total_idr = total * kurs;
	// 	    $('#total_idr').val(total_idr);


	
 

 

	// 		console.log(`==================${ppn_nominal} ppn_nominal`);
	// 		<?php } ?>
	   
	// }

	$(document).ready(function() { 
		calculate_all()
		$('#sum_diskon1_<?=$grid_str[0]?>').on('keyup', function() {
				// var subtotal = parseFloat($('#sum_subtotal_<?=$grid_str[0]?>').val())
				// var diskon_prosentase = $('#sum_diskon1_<?=$grid_str[0]?>').val();

				// var diskon_nominal = subtotal * (diskon_prosentase / 100);
				// var diskon_nominal1 = diskon_nominal.toFixed(2);

				// console.log(diskon_nominal1);
				// $("input[name=diskon_nominal]").val(diskon_nominal1);

				calculate_all()
				document.getElementById('#sum_diskon1_<?=$grid_str[0]?>').onkeyup = null; 
			});

			calculate_all()
			$('#sum_diskon1nominal_<?=$grid_str[0]?>').on('keyup', function() {
				// var subtotal = parseFloat($('#sum_subtotal_<?=$grid_str[0]?>').val())
				// var diskon_nominal = $('#sum_diskon1nominal_<?=$grid_str[0]?>').val();

				// var diskon_prosentase = (diskon_nominal / subtotal * 100);
				// var diskon_prosentase1 = diskon_prosentase.toFixed(2);

				// $("input[name=diskon_prosentase]").val(diskon_prosentase1);
				calculate_all()
				document.getElementById('#sum_diskon1nominal_<?=$grid_str[0]?>').onkeyup = null; 
			});
	})

	function calculate_all()
{
	// KURS
	// var valuta = "";
	// if(typeof $('#browse_master_valuta_search').val() !== 'undefined')
	// 	valuta = $('#browse_master_valuta_search').val().toString();
	// if (valuta.toLowerCase().includes('IDR'.toLowerCase())) {
	// 	$('#kurs').val(1);
	// 	$('#kurs').prop('readonly', true);
	// }
	// else {
	// 	$('#kurs').val(0);
	// 	$('#kurs').prop('readonly', false);
	// }

	const subtotal = parseFloat($('#sum_subtotal_<?=$grid_str[0]?>').val())
	const diskon_nominal = parseFloat($('#sum_diskon1nominal_<?=$grid_str[0]?>').val())

	const dpp = subtotal - diskon_nominal;
	$('#sum_dpp_<?=$grid_str[0]?>').val(dpp)

	// // PPN
	var ppn = $('#ppn').val();
		// const ppn_prosentase = parseFloat(<?php echo($_SESSION["setting"]["ppn"]); ?>);
		const ppn_prosentase = 11;
    if(ppn == 1)
    {
        $('#sum_ppn_<?=$grid_str[0]?>').val(ppn_prosentase);
        $('#sum_ppnnominal_<?=$grid_str[0]?>').val(
			ppn_prosentase / 100 * dpp
		);
        $('#sum_ppn_<?=$grid_str[0]?>').attr('readonly',true);
		$('.ppn_section').removeClass('hide');
    }
    else
    {
        $('#sum_ppn_<?=$grid_str[0]?>').val(0);
		$('#sum_ppnnominal_<?=$grid_str[0]?>').val(0);
        $('#sum_ppn_<?=$grid_str[0]?>').attr('readonly',true);
		$('.ppn_section').addClass('hide');
    }

	const ppn_nominal = parseFloat($('#sum_ppnnominal_<?=$grid_str[0]?>').val())
	const total = dpp +  ppn_nominal
	$('#sum_total_<?=$grid_str[0]?>').val(total)

	console.log({
		subtotal, diskon_nominal, dpp, ppn, ppn_nominal, total 
	})




	// 	// SUBTOTAL
	// 	var subtotal_0 = jQuery(<?=$grid_elm[0]?>).jqGrid('getCol','subtotal',false,'sum');
	// 	$('#sum_subtotal_<?=$grid_str[0]?>').val(subtotal_0);

		// calculate_summary('<?=$grid_str[0]?>');
		
	// 	// TOTAL (KURS)
	// 	var total 			= $('#sum_total_<?=$grid_str[0]?>').val();
	//     var kurs 			= $('#kurs').val();
	//     var total_valuta 	= total * kurs;
	//     $('#total_valuta').val(total_valuta); 

}	


	<?= generate_function_checkgrid($grid_str) ?>
	<?= generate_function_checkunique($grid_str) ?>
	<?= generate_function_realgrid($grid_str) ?>
</script>