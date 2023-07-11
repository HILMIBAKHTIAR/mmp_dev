<?php
$edit["debug"]       = 1;
$edit["string_code"]    = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];



$edit["sp_approve"] = "sp_disetujui_dokumen";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_dokumen";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdbelinota";
$edit["detail"][$i]["field_name"] = array(
    "keterangan",
	"nomortdbeliorder",
	"nomormhbarang",
	"nomormhsatuan",
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------



$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"]                   = "Kode";
$edit["field"][$i]["input"]                   = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add") {
	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
}
$i++;


$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = date("d/m/Y");
}
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
$i++;


$edit["field"][$i]["label"]                  = "Supplier";
$edit["field"][$i]["input"]                  = "supplier";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["browse_setting"] 				= "master_relasi_penerimaan";
$edit["field"][$i]["input_save"]             = "skip";
$i++;


$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"] 						= "Order Beli";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomorthbeliorder";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "order_pembelian";
$edit["field"][$i]["input_save"]             = "skip";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

$edit["field"][$i]["label"] 						= "Kode Gudang";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhgudang";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_relasi";
$edit["field"][$i]["input_save"]             = "skip";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";

$i++;


$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"] 					= "SJ supplier";
$edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"]						= "supplier_sj_nomor";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_save"]             = "skip";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;


$edit["field"][$i]["label"]       = "Tanggal Jatuh Tempo";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal_jatuh_tempo";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = date("Y/m/d");
}
$i++;

$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"] 					= "No Faktur Pajak";
$edit["field"][$i]["input"]						= "faktur_pajak_nomor";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;



$edit["field"][$i]["label"]       = "Tanggal Faktur Pajak";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "faktur_pajak_tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = date("d/m/Y");
}
$i++;

$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"]       = "Tanggal Terima Tagihan";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal_terima_tagihan";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = date("d/m/Y");
}
$i++;


$edit["field"][$i]["label"] 					= "No Nota Supllier";
$edit["field"][$i]["input"]						= "supplier_invoice_nomor";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;



$edit["field"][$i]["label"] 						= "PPN / Non-PPN";
$edit["field"][$i]["input"] 						= "ppn";
$edit["field"][$i]["input_element"] 				= "select1";
$edit["field"][$i]["input_option"] 					= array("1|PPN","0|Non-PPN");
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// $edit["field"][$i]["input_attr"]["onchange"] 		= "calculate_all()";
$edit["field"][$i]["input_value"] 			= 1;
$i++;


// $edit["field"][$i]["label"] 						= "Inc/Exc PPN";
// $edit["field"][$i]["input"] 						= "status_ppn";
// $edit["field"][$i]["input_element"] 				= "select1";
// $edit["field"][$i]["input_option"] 					= array("Include|Include PPN","Exclude|Exclude PPN");
// $edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// // $edit["field"][$i]["input_attr"]["onchange"] 		= "calculate_all()";
// $i++;



$edit["field"][$i]["label"]                   = "Faktur Pajak";
$edit["field"][$i]["input_element"] = "checkbox";
$edit["field"][$i]["input_col"] = "col-sm-9 ";
$edit["field"][$i]["input"]            = "faktur_pajak";
$i++;


$edit["field"][$i]["label"]                   = "Surat Jalan";
$edit["field"][$i]["input_element"] = "checkbox";
$edit["field"][$i]["input_col"] = "col-sm-9 ";
$edit["field"][$i]["input"]            = "surat_jalan";
$i++;

$edit["field"][$i]["label"]                   = "Order Beli";
$edit["field"][$i]["input_element"] = "checkbox";
$edit["field"][$i]["input_col"] = "col-sm-9 ";
$edit["field"][$i]["input"]            = "order_pembelian";
$i++;

$edit["field"][$i]["label"]                   = "Nota Beli";
$edit["field"][$i]["input_element"] = "checkbox";
$edit["field"][$i]["input_col"] = "col-sm-9 ";
$edit["field"][$i]["input"]            = "nota_beli";
$i++;


//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Detail Order Beli'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Nama',
'Qty Sisa Order',
'Qty Terima',
'Satuan',
'Harga',
'Diskon',
'Sub Total',
'Keterangan',
'nomortdbeliorder',
'nomormhbarang',
'nomormhsatuan'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "nama_barang",
    "jumlah_unit",
    "jumlah_unit",
    "satuan",
    "harga_satuan",
    "diskon_nominal_1",
    "subtotal",
    "keterangan",
    "nomortdbeliorder",
    "nomormhbarang",
    "nomormhsatuan"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    nama_barang:'',
    jumlah_unit:'',
    jumlah_unit:'',
    satuan:'',
    harga_satuan:'',
    diskon_nominal_1:'',
    subtotal:'',
    keterangan:'',
    nomortdbeliorder:'',
    nomormhbarang:'',
    nomormhsatuan:''
}";

$edit["field"][$i]["grid_set"]["option"]["cellEdit"] = "false";
$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'harga_satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'harga_satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'diskon_nominal_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'diskon_nominal_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomortdbeliorder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomortdbeliorder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

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

// $edit = generate_summary($edit,"subtotal|diskon1|dpp|ppn|totalakhir",$edit["field"][$grid[0]]["grid_set"]["id"],"",$summary_fields);
// $i = count($edit["field"]);

$edit = generate_summary($edit,"subtotal|diskon1|dpp|ppn|totalakhir",$edit["detail"][0]["grid_id"]);

$i++;

// ---------------------------------------END FRONT GRID 1-------------------------------------------------



if ($edit["mode"] != "add") {

	$edit["query"] = " SELECT
    a.*,
	DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
    DATE_FORMAT(a.tanggal_jatuh_tempo,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_jatuh_tempo,
    DATE_FORMAT(a.faktur_pajak_tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as faktur_pajak_tanggal,
    DATE_FORMAT(a.tanggal_terima_tagihan,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_terima_tagihan,
    CONCAT(t.kode, '|', t.nomor) AS 'browse|nomorthbeliorder',
    CONCAT(m2.nama, '|', m2.nomor) AS 'browse|nomormhrelasi',
    CONCAT(m5.nama, '|', m5.nomor) AS 'browse|nomormhgudang',
    t.tanggal as tanggal_order,
	t.kode as kode_order,
	m.nama as nama_barang,
	m2.nama as supplier,
	m3.nama as pembuat,
	m4.nama as approve,
	t.status_aktif 
	FROM " . $edit["table"] . " a
	join thbeliorder t on t.nomor = a.nomorthbeliorder 
	join tdbeliorder t2 on t2.nomorthbeliorder = t.nomor 
	left join mhbarang m on m.nomor = T2.nomormhbarang 
	left join mhrelasi m2 on m2.nomor = t.nomormhrelasi and m2.nomormhrelasikelompok = 2
	left join mhadmin m3 on m3.nomor = t.dibuat_oleh 
	left join mhadmin m4 on m4.nomor = t.disetujui_oleh
	left join mhgudang m5 on m5.nomor = a.nomormhgudang 
    WHERE a.status_disetujui > 0 and a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

    $check_edit_fields["status_disetujui"] = "status_disetujui_dokumen";


    
    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*,
	COALESCE(CONCAT(h.kode, ' - ', h.nama_barang_customer), CONCAT(m.kode, ' - ', m.nama)) AS nama_barang,
	t.jumlah_unit ,
	t.jumlah_selesai_terima,
	t.harga_satuan,
	m2.nama as satuan,
	t.diskon_nominal_1,
	t.subtotal,
	t.keterangan
	FROM " . $edit["detail"][0]["table_name"] . " a
	join tdbeliorder t on t.nomor = a.nomortdbeliorder 
	left join mhbarang m on m.nomor = t.nomormhbarang 
	left join mhsatuan m2 on m2.nomor = t.nomormhsatuanqty 
    LEFT JOIN thbarang h ON h.nomor = m.nomormhcilinder
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



    $edit = fill_value($edit, $r);
}


$_SESSION["setting"]["field_status_disetujui"] = "status_disetujui_dokumen";
	$_SESSION["setting"]["field_disetujui_pada"] = "disetujui_dokumen_pada";
	$_SESSION["setting"]["field_disetujui_oleh"] = "disetujui_dokumen_oleh";
	if ($r["status_disetujui_dokumen"] == 1) {
		$features = "add|back|reload|disappr|print|close";
	} else if ($r["status_disetujui_dokumen"] == 2) {
		$features = "add|back|print|reload";
	} else {
		$features = "add|save|back|delete|reload|approve|print|edit";
	}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");



// $i = count($edit["field"]);
// $edit["field"][$i]["pro_mode"] = "view";
// $edit["field"][$i]["label"] = "Disetujui Oleh";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// if($r["disetujui_dokumen_oleh"]             != 0)
// 	$edit["field"][$i]["input_value"] = get_admin($r["disetujui_dokumen_oleh"]);
// $i++;
// $edit["field"][$i]["pro_mode"] = "view";
// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"] = "Disetujui Pada";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// if($r["disetujui_dokumen_pada"]             != $_SESSION["setting"]["default_datetime"])
// 	$edit["field"][$i]["input_value"] = $r["disetujui_dokumen_pada"];
// $i++;
// $edit["field"][$i]["pro_mode"] = "view";
// $edit["field"][$i]["label"] = "Dibatalkan Oleh";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// if($r["dibatalkan_dokumen_oleh"]            != 0)
// 	$edit["field"][$i]["input_value"] = get_admin($r["dibatalkan_dokumen_oleh"]);
// $i++;
// $edit["field"][$i]["pro_mode"] = "view";
// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"] = "Dibatalkan Pada";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// if($r["dibatalkan_dokumen_pada"]            != $_SESSION["setting"]["default_datetime"])
// 	$edit["field"][$i]["input_value"] = $r["dibatalkan_dokumen_pada"];
// $i++;

// $check_approval_fields["status_disetujui"] = "status_disetujui_dokumen";


$features = "save|back|reload".check_approval($r,"edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton,$features);
?>

<script type="text/javascript">
    $(document).ready(function() {
        setElementReadOnly('sum_diskon1_kelengkapan_dokumen_detail');
        setElementReadOnly('sum_diskon1nominal_kelengkapan_dokumen_detail');
        calculate_all();
    });


	$(document).ready(function() { 
		calculate_all()
	})


    function setElementReadOnly(elementId) {
    var element = document.getElementById(elementId);
    if (element) {
        element.readOnly = true;
    }
    }


	function calculate_all()
{
	
	var ppn = $('#ppn').val();
	console.log(ppn);
    if(ppn == 1)
    {
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').val(<?php  echo($_SESSION["setting"]["ppn"]); ?>);
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').attr('readonly',true);
		$('.ppn_section').removeClass('hide');
    }
    else
    {
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').val(0);
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').attr('readonly',true);
		$('.ppn_section').addClass('hide');
    }
}	
    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>