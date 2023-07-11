<?php
$edit["debug"]                 = 1;
$edit["uppercase"]             = 1;
$edit["unique"]             = array("kode");
$edit["string_code"]         = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
// $edit["next_save_delay"]     = 3;
// $edit["unique"]             = array("nama");
// $edit["manual_save"]         = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";

$edit["sp_approve"] = "sp_disetujui_mhbarangbom";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_mhbarangbom";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";

if ($edit["mode"] != "add") {
    $edit["query"] = "
	SELECT a.*,
    a.nomorthbarang as id_barangcustomer,
    caa.nama as jenis_packaging, caba.kode AS kode_sample
	FROM " . $edit["table"] . " a
    LEFT JOIN tdpermintaananalisasample g on a.nomortdpermintaananalisasample = g.nomor
    LEFT JOIN thpermintaananalisasample g1 on g.nomorthpermintaananalisasample = g1.nomor
    LEFT JOIN thbarang c on a.nomorthbarang = c.nomor
    LEFT JOIN thspesifikasiproduk ca on c.nomorthspesifikasiproduk = ca.nomor 
    LEFT JOIN mhjenispackaging caa on ca.nomormhjenispackaging = caa.nomor
    LEFT JOIN thhasilanalisasample cab on ca.nomorthhasilanalisasample = cab.nomor
    LEFT JOIN thpermintaananalisasample caba on cab.nomorthpermintaananalisasample = caba.nomor
    LEFT JOIN tdpermintaananalisasample cabb ON caba.nomor = cabb.nomorthpermintaananalisasample


	WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));
}
//PEMBUATAN GRID DATA pic kantor
$i = 0;
$edit["detail"][$i]["table_name"] = "mdbarangbom";
$edit["detail"][$i]["field_name"] = array(
    "nomormhproses",
    "nomormhbarang",
    "nomormhsatuanqtyrnd",
    "nomormhbarangkategori",
    "proses",
    "kode_barang",
    "qty",
    "bom",
    "status",
    "group_tinta",
    "nama_bahan_baku",
    "lebar",
    "meter",
    "margin_extrusi",
    "micron",
    "density",
    "grm2",
    "presentase",
    "formulasi1_rolljadi",
    "rolljadi_kg",
    "rolljumbo_kg",
    "usage",
    "satuanrnd",
    "categori",
    "rolljadi",
    "stok",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "bom = 1";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_bomutama";
$i++;
//END GRID DATA
// $edit["detail"][$i]["table_name"] = "mdbarangbom";
// $edit["detail"][$i]["field_name"] = array(
//     "nomormhproses",
//     "nomormhbarang",
//     "nomormhsatuan",
//     "proses",
//     "kode_barang",
//     "qty",
//     "satuan",
//     "bom",
//     "status",
//     "nomor"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "bom = 1";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_bomsubtitusi1";
// $i++;

// $edit["detail"][$i]["table_name"] = "mdbarangbom";
// $edit["detail"][$i]["field_name"] = array(
//     "nomormhproses",
//     "nomormhbarang",
//     "nomormhsatuan",
//     "proses",
//     "kode_barang",
//     "qty",
//     "satuan",
//     "bom",
//     "status",
//     "nomor"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "bom = 2";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_bomsubtitusi2";
// $i++;



$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    }
}
$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"]                     = "Kode";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "kode";
$edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "4";
$edit["field"][$i]["input_attr"]["readonly"]     = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
$i++;
// $edit["field"][$i]["form_group"] 					= 0;
// $edit["field"][$i]["anti_mode"] 					= "add";
// $edit["field"][$i]["label"] 						= "Status";
// $edit["field"][$i]["input"] 						= "status_aktif";
// $edit["field"][$i]["input_element"] 				= "select";
// $edit["field"][$i]["input_option"] 					= generate_status_option($edit["mode"]);
// $i++;
$edit["field"][$i]["label"]                     = "Nama";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nama";
$edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["browse_set"]["param_output"]     = array("kode|kode");
// $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
$i++;
// $edit["field"][$i]["label"]                     = "Nama";
// $edit["field"][$i]["label_class"]                 = "";
// $edit["field"][$i]["input"]                     = "nomormhbarang";
// $edit["field"][$i]["input_class"]                 = "";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_barangjadi";
// // $edit["field"][$i]["browse_set"]["param_output"]     = array("kode|kode");
// // $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
// $i++;
$edit["field"][$i]["label"]                     = "Permintaan Sample";
$edit["field"][$i]["input"]                     = "kode_sample";
$edit["field"][$i]["input_save"]             = "skip";
// $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
$i++;

$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"]                     = "id barang customer";
$edit["field"][$i]["input"]                     = "id_barangcustomer";
$edit["field"][$i]["input_attr"]["readonly"]     = "readonly";
$edit["field"][$i]["input_save"]             = "skip";
// $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
$i++;
$edit["field"][$i]["label"]                     = "Jenis Packaging";
$edit["field"][$i]["label_class"]                 = "";
$edit["field"][$i]["input"]                     = "jenis_packaging";
$edit["field"][$i]["input_attr"]["readonly"]     = "readonly";
$edit["field"][$i]["input_save"]             = "skip";

// $edit["field"][$i]["browse_set"]["param_output"]     = array("kode|kode");
// $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
$i++;
$edit["field"][$i]["label"]         = "proses";
$edit["field"][$i]["input"]         = "proses";
$edit["field"][$i]["input_attr"]["readonly"]     = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"]                         = "brg kategori";
// $edit["field"][$i]["label_class"]                     = "";
$edit["field"][$i]["input"]                            = "nomormhbarangkategoridetail";
$edit["field"][$i]["input_save"] = "skip";
// $edit["field"][$i]["input_class"]                     = "";
// $edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"]         = "Status";
$edit["field"][$i]["input"]         = "status_aktif";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"]  = generate_status_option($edit["mode"]);
$i++;
$edit["field"][$i]["label"]                          = "Note";
$edit["field"][$i]["label_col"]                     = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"]             = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]                          = "keterangan";
$edit["field"][$i]["input_element"]                  = "textarea";
$edit["field"][$i]["input_attr"]["rows"]             = "5";
$edit["field"][$i]["input_col"]                     = "col-sm-12";
$i++;




$edit = generate_info($edit, $r, "insert|update");

// //FRONTEND UNTUK GRID DATA detail
$i = count($edit["field"]);
$edit["fields"][$i]["box_tabs_close"] = 1;

$edit["field"][$i]["box_tabs"]                                = array(
    "utama|UTAMA", "subtitusi1|SUBTITUSI 1", "subtitusi2|SUBTITUSI 2"
);
//bom 1
$edit["field"][$i]["box_tab"]                                 = "utama";
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar BOM UTAMA'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Proses',
'Group Bahan Baku',
'Kode Bahan Baku',
'Nama Bahan Baku',
'Lebar',
'Meter',
'Margin Extrusi',
'Micron',
'Density',
'gr/m2',
'%',
'Isi Satuan',
'Formulasi 1 Roll Jadi',
'Roll Jadi Kg',
'Roll Jumbo Kg',
'Usage',
'Satuan',
'Category',
'Roll Jadi',
'Stok',
'status',
'nomormhproses',
'nomormhsatuanqtyrnd',
'nomormhbarang',
'nomormhbarangkategori',
'bom',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "proses",
    "group_tinta",
    "kode_barang",
    "nama_bahan_baku",
    "lebar",
    "meter",
    "margin_extrusi",
    "micron",
    "density",
    "grm2",
    "presentase",
    "qty",
    "formulasi1_roljadi",
    "rolljadi_kg",
    "rolljumbo_kg",
    "usage",
    "satuanrnd",
    "categori",
    "rolljadi",
    "stok",
    "status",
    "nomormhproses",
    "nomormhsatuanqtyrnd",
    "nomormhbarang",
    "nomormhbarangkategori",
    "bom",
    "nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    proses:'',
    kode_barang:'',
    qty:'',
    satuan:'',
    status:'',
    nomormhproses:'',
    nomormhbarang:'',
    nomormhsatuan:'',
    nomormhwarna:'',
    nomormhbarangkategori:'',
    bom:'1' }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'proses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'proses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_prosesbom }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'group_tinta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'group_tinta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_groupbahanbaku }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nama_bahan_baku'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nama_bahan_baku'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barangbom }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'lebar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'lebar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'margin_extrusi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'margin_extrusi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'micron'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'micron'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'density'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'density'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'grm2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'grm2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'presentase'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'presentase'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'formulasi1_roljadi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'formulasi1_roljadi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'rolljadi_kg'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'rolljadi_kg'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'rolljumbo_kg'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'rolljumbo_kg'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'usage'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'usage'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuanrnd'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuanrnd'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'categori'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'categori'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'rolljadi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'rolljadi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'stok'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'stok'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanqtyrnd'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanqtyrnd'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarangkategori'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarangkategori'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
//

// bom2
// $edit["field"][$i]["box_tab"]                                 = "subtitusi1";
// $grid[1] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar BOM SUBTITUSI 1'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Proses',
// 'Kode Barang',
// 'Qty',
// 'Satuan',
// 'status',
// 'nomormhproses',
// 'nomormhbarang',
// 'nomormhsatuan',
// 'bom',
// 'nomor'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "proses",
//     "kode_barang",
//     "qty",
//     "satuan",
//     "status",
//     "nomormhproses",
//     "nomormhbarang",
//     "nomormhsatuan",
//     "bom",
//     "bom"
// );
// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     proses:'',
//     kode_barang:'',
//     qty:'',
//     satuan:'',
//     status:'',
//     nomormhproses:'',
//     nomormhbarang:'',
//     nomormhsatuan:'',
//     bom:'1' }";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
// $j = 0;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'proses'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'proses'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_prosesbom1 }";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode_barang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode_barang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barangbom1 }";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuanbom1 }";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhproses'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhproses'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bom'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bom'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $i++;
//

//bom 3
// $edit["field"][$i]["box_tab"]                                 = "subtitusi2";
// $grid[2] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar BOM SUBTITUSI 2'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Proses',
// 'Kode Barang',
// 'Qty',
// 'Satuan',
// 'status',
// 'nomormhproses',
// 'nomormhbarang',
// 'nomormhsatuan',
// 'bom'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "proses",
//     "kode_barang",
//     "qty",
//     "satuan",
//     "status",
//     "nomormhproses",
//     "nomormhbarang",
//     "nomormhsatuan",
//     "bom"
// );
// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     proses:'',
//     kode_barang:'',
//     qty:'',
//     satuan:'',
//     status:'',
//     nomormhproses:'',
//     nomormhbarang:'',
//     nomormhsatuan:'',
//     bom:'2' }";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
// $j = 0;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'proses'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'proses'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_prosesbom2 }";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode_barang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode_barang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barangbom2 }";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuanbom2 }";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhproses'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhproses'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bom'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bom'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $i++;




if ($edit["mode"] != "add") {
    // //query grid untuk detail
    // $edit["field"][$grid[0]]["grid_set"]["query"] = "
    // SELECT a.*,
    // b.nomor AS nomormhsatuan,
    // c.nomor AS nomormhbarang,
    // b.nama AS satuan,
    // c.nama AS nama_barang,
    // b.keterangan AS keterangan
    // FROM " . $edit["detail"][0]["table_name"] . " a
    // LEFT JOIN mhsatuan b ON a.nomormhsatuan = b.nomor 
    // LEFT JOIN mhbarang c ON a.nomormhbarang = c.nomor 
    // WHERE a.status_aktif > 0
    // AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];
    // //eror handling jika data tidak muncull
    // // $edit = fill_value($edit, $r);
    // //query grid unutk outlet customer 
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
    SELECT a.*,
    b.nomor as nomormhproses,
    c.nomor as nomormhbarang,
    b.nama as proses,
    c.kode as kode_barang
    FROM " . $edit["detail"][0]["table_name"] . " a
    JOIN mhproses b on a.nomormhproses = b.nomor
    JOIN mhbarang c on a.nomormhbarang = c.nomor
    WHERE a.status_aktif > 0
    AND a.bom = '1'
    AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    echo $edit["field"][$grid[0]]["grid_set"]["query"];

    // $edit["field"][$grid[1]]["grid_set"]["query"] = "
    // SELECT a.*,
    // b.nomor as nomormhproses,
    // c.nomor as nomormhbarang,
    // d.nomor as nomormhsatuan,
    // b.nama as proses,
    // c.kode as kode_barang,
    // d.nama as satuan
    // FROM " . $edit["detail"][1]["table_name"] . " a
    // LEFT JOIN mhproses b on a.nomormhproses = b.nomor
    // LEFT JOIN mhbarang c on a.nomormhbarang = c.nomor
    // LEFT JOIN mhsatuan d on a.nomormhsatuan = d.nomor
    // WHERE a.status_aktif > 0
    // AND a.bom = '2'
    // AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    // $edit["field"][$grid[2]]["grid_set"]["query"] = "
    // SELECT a.*,
    // b.nomor as nomormhproses,
    // c.nomor as nomormhbarang,
    // d.nomor as nomormhsatuan,
    // b.nama as proses,
    // c.kode as kode_barang,
    // d.nama as satuan
    // FROM " . $edit["detail"][2]["table_name"] . " a
    // LEFT JOIN mhproses b on a.nomormhproses = b.nomor
    // LEFT JOIN mhbarang c on a.nomormhbarang = c.nomor
    // LEFT JOIN mhsatuan d on a.nomormhsatuan = d.nomor
    // WHERE a.status_aktif > 0
    // AND a.bom = '3'
    // AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];
    // echo $edit["field"][$grid[0]]["grid_set"]["query"];
    $edit = fill_value($edit, $r);
}

$_SESSION["setting"]["field_status_disetujui"] = "status_disetujui";
$_SESSION["setting"]["field_disetujui_pada"] = "disetujui_pada";
$_SESSION["setting"]["field_disetujui_oleh"] = "disetujui_oleh";
if ($r["status_disetujui"] == 1) {
    $features = "back|reload|disappr";
} else {
    $features = "save|back|reload|approve|edit";
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
// $edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload" . check_approval($r, "edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);
// if ($edit["mode"] != "add") {
//     $edit_navbutton["field"][$i]["input_element"]             = "a";
//     $edit_navbutton["field"][$i]["input_float"]               = "right";
//     $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
//     $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
//     $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
//     $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
//     $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
//         "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=CUSTOMER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
//     $i++;
// }


$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
?>

<script type="text/javascript">
    $(document).ready(function() {
        // get_nomormhusaha();
        // myFunction();
    });

    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    // function checkSave() {
    //     var tipe = $('#tipe').val();
    //     var nomormhaccount = $('#browse_master_account_aset_hidden').val();
    //     var check_failed = '';

    //     if (tipe == 0 && nomormhaccount == '') {
    //         check_failed += '- Account Wajib Diisi\n\n';
    //     }

    //     if (check_failed != '')
    //         return check_failed;
    //     else
    //         return true;
    // }
    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>


<?php
$file_nomor = $r["nomortdpermintaananalisasample"];

$file_tabel = 'tdpermintaananalisasample';
$file_query = mysqli_query($con, " 
	SELECT * 
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		kategori = 'PERMINTAAN_ANALISA_SAMPEL' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor
");

$file_count = mysqli_num_rows($file_query);

$arr_images = array();

if ($file_count > 0) {
    $count_i = 0;
    while ($row = mysqli_fetch_assoc($file_query)) {
        $json[] = $row;
        array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$count_i]["kategori"] . "/" . rawurlencode($json[$count_i]["nama"])));
        $count_i++;
    }
}

include "x_tab_data_images.php";

?>