<?php
$edit["debug"]                 = 1;
$edit["uppercase"]             = 1;
$edit["unique"]             = array("nama");
// $edit["next_save_delay"]     = 3;
// $edit["unique"]             = array("kode");
// $edit["manual_save"]         = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";
// $edit["string_code"] 		= "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];

// $edit["sp_add"] 							= "sp_disimpan_mhcabang";
// $edit["sp_add_param"] 						= array("param_mode_add|1", "param_nomormhadmin|0");
// $edit["sp_edit"] 							= "sp_disimpan_mhcabang";
// $edit["sp_edit_param"] 						= array("param_mode_edit|1", "param_nomormhadmin|0");
// $_POST["param_nomormhadmin"]				= $_SESSION["login"]["nomor"];
// $_POST["param_mode_add"] 					= "ADD";
// $_POST["param_mode_edit"] 					= "EDIT";

// //PEMBUATAN GRID DATA detail outlet
// $i = 0;
// $edit["detail"][$i]["table_name"] = "mdoutlet";
// $edit["detail"][$i]["field_name"] = array(
//     "nomormhsatuan",
//     "nomormhbarang",
//     "nama_barang",
//     "jumlah",
//     "keterangan",
//     "terkecil"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
// $i++;
// //END GRID DATA

// //PEMBUATAN GRID DATA customer outlet
// $i = 1;
// $edit["detail"][$i]["table_name"] = "mdoutletcustomer";
// $edit["detail"][$i]["field_name"] = array(
//     "nomormhrelasi",
//     "nama_customer",
//     "alamat_customer"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_customeroutlet";
// $i++;
// //END GRID DATA

$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";

// $edit["field"][$i]["label"] 					= "Kode";
// $edit["field"][$i]["label_class"] 				= "req";
// $edit["field"][$i]["input"] 					= "kode";
// $edit["field"][$i]["input_class"] 				= "required";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "4";
// $i++;
// $edit["field"][$i]["input_attr"]["readonly"] 	= "readonly";
// if($edit["mode"] == "add")
// 	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
// $edit["field"][$i]["form_group"] 					= 0;
// $edit["field"][$i]["anti_mode"] 					= "add";
// $edit["field"][$i]["label"] 						= "Status";
// $edit["field"][$i]["input"] 						= "status_aktif";
// $edit["field"][$i]["input_element"] 				= "select";
// $edit["field"][$i]["input_option"] 					= generate_status_option($edit["mode"]);
// $i++;
// $edit["field"][$i]["form_group_class"] = "hiding";
// $edit["field"][$i]["label"]            = "nomormhrelasikelompok";
// $edit["field"][$i]["input"]            = "nomormhrelasikelompok";
// if ($edit["mode"] == "add") {
//     $edit["field"][$i]["input_value"] = 1;
// }
// $i++;
//browse sppd
// $edit["field"][$i]["form_group"]                 = 0;
// $edit["field"][$i]["label"]                     = "Provinsi";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomormhprovinsi";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_provinsi";
// $i++;


// $edit["field"][$i]["label"]                         = "Kecamatan";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input"]                            = "nama";
// $edit["field"][$i]["input_class"]                     = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_kecamatan2";
// $edit["field"][$i]["browse_set"]["param_output"] = array(
// );
// $i++;

$edit["field"][$i]["label"] 					= "Kecamatan";
$edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"]						= "nama";
$edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;



$edit["field"][$i]["label"]                     = "Kabupaten";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhkabupaten";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_kabupaten2";
// $edit["field"][$i]["browse_set"]["param_input"] = array(
//     "a.nomor|browse_master_kecamatan2_hidden"
// );
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"nomormhprovinsi|nomormhprovinsi",
	"provinsi|provinsi"
);
$i++;



$edit["field"][$i]["form_group_class"] 				= "hiding";
$edit["field"][$i]["label"]                     = "nomormhprovinsi";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhprovinsi";
$edit["field"][$i]["input_class"]                 = "required";
$i++;

$edit["field"][$i]["label"]                     = "Provinsi";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "provinsi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_save"] = "skip";
$i++;

$edit["field"][$i]["anti_mode"]     = "add";
$edit["field"][$i]["label"]         = "Status";
$edit["field"][$i]["input"]         = "status_aktif";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"]  = generate_status_option($edit["mode"]);
$i++;
// $edit["field"][$i]["label"]                          = "Keterangan";
// $edit["field"][$i]["label_col"]                     = "col-sm-12";
// $edit["field"][$i]["label_attr"]["style"]             = "text-align:left;margin-bottom:10px";
// $edit["field"][$i]["input"]                          = "keterangan";
// $edit["field"][$i]["input_element"]                  = "textarea";
// $edit["field"][$i]["input_attr"]["rows"]             = "5";
// $edit["field"][$i]["input_col"]                     = "col-sm-12";
// $i++;
// //BROWSE CABANG
// $edit["field"][$i]["form_group"]                 = 0;
// $edit["field"][$i]["label"]                     = "cabang kode";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomormhcabang";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_cabang_all";
// $edit["field"][$i]["browse_set"]["param_output"]     = array("inisial|inisial");
// // $edit["field"][$i]["browse_set"]["param_input"]  	= array(
// //     "a.nomormhrelasi|browse_master_customer_hidden"
// // );
// // $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
// $i++;
// //browse sppd
// $edit["field"][$i]["form_group"]                 = 0;
// $edit["field"][$i]["label"]                     = "sppd";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomormhsppd";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_sppd_all";
// $edit["field"][$i]["browse_set"]["param_output"]     = array("tipe|tipe");
// // $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
// $i++;
// //BROWSE GUDANG
// $edit["field"][$i]["form_group"]                 = 0;
// $edit["field"][$i]["label"]                     = "Gudang";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomormhgudang";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_gudang_all";
// $edit["field"][$i]["browse_set"]["param_output"]     = array("kode|kode");

// // $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
// $i++;
// $edit["field"][$i]["form_group"] 					= 0;
// //param output
// $edit["field"][$i]["label"]                         = "Inisial";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input"]                            = "inisial";
// $edit["field"][$i]["input_class"]                     = "required";
// $i++;
// $edit["field"][$i]["label"]                         = "Tipe sppd";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input"]                            = "tipe";
// $edit["field"][$i]["input_class"]                     = "required";
// $i++;
// $edit["field"][$i]["label"]                         = "kode gudang";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input"]                            = "kode";
// $edit["field"][$i]["input_class"]                     = "required";
// $i++;


// //FRONTEND UNTUK GRID DATA detail
// $grid[0] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar Detail'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Nama Barang',
// 'Satuan',
// 'Konversi',
// 'Terkecil',
// 'nomormhbarang',
// 'nomormhsatuan',
// 'Keterangan',
// 'nomor'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "nama_barang",
//     "satuan",
//     "jumlah",
//     "terkecil",
//     "nomormhbarang",
//     "nomormhsatuan",
//     "keterangan",
//     "nomor"
// );
// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
// nama_barang:'',
// satuan:'',
// jumlah:'0',
// terkecil:'1',
// nomormhbarang:'',
// nomormhsatuan:'',
// keterangan:'',
// nomor:'' }";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhsatuan']";
// $j = 0;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nama_barang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nama_barang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barang }";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan }";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'terkecil'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'terkecil'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["edittype"] = "'select'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"] = "'select'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{value:{'1':'Yes','0':'No'}}";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $i++;
// //END FRONT END GRID DATA

// //FRONTEND UNTUK GRID DATA cutomer
// $grid[1] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar customer'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Nama Cutomer',
// 'Alamat Customer',
// 'nomormhrelasi'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "nama_customer",
//     "alamat_customer",
//     "nomormhrelasi"
// );
// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     nama_customer:'',
//     alamat_customer:'',
//     nomormhrelasi:'' }";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhrelasi']";
// $j = 0;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nama_customer'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nama_customer'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_customer }";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'alamat_customer'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'alamat_customer'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhrelasi'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhrelasi'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $i++;
// //END FRONT END GRID DATA

// $edit["field"][$i]["form_group"] 					= 0;
// $edit["field"][$i]["label"] 						= "Inisial";
// $edit["field"][$i]["label_class"] 					= "req";
// $edit["field"][$i]["input"]							= "inisial";
// $edit["field"][$i]["input_class"] 					= "required";
// $edit["field"][$i]["input_attr"]["maxlength"] 		= "3";
// $i++;
// $edit["field"][$i]["form_group"] 					= 0;
// $edit["field"][$i]["anti_mode"] 					= "Pusat";
// $edit["field"][$i]["label"] 						= "Status";
// $edit["field"][$i]["input"] 						= "pusat";
// $edit["field"][$i]["input_element"] 				= "select";
// $edit["field"][$i]["input_option"] 					= array("0|Non-Pusat", "1|Pusat");
// $i++;
// $edit["field"][$i]["label"]              			= "Keterangan";
// $edit["field"][$i]["label_col"] 					= "col-sm-12";
// $edit["field"][$i]["label_attr"]["style"] 			= "text-align:left;margin-bottom:10px";
// $edit["field"][$i]["input"]              			= "keterangan";
// $edit["field"][$i]["input_element"]      			= "textarea";
// $edit["field"][$i]["input_attr"]["rows"] 			= "5";
// $edit["field"][$i]["input_col"] 					= "col-sm-12";
// $i++;
// $edit["field"][$i]["label"]              			= "Alamat";
// $edit["field"][$i]["label_col"] 					= "col-sm-12";
// $edit["field"][$i]["label_attr"]["style"] 			= "text-align:left;margin-bottom:10px";
// $edit["field"][$i]["input"]              			= "catatan";
// $edit["field"][$i]["input_element"]      			= "textarea";
// $edit["field"][$i]["input_attr"]["rows"] 			= "5";
// $edit["field"][$i]["input_col"] 					= "col-sm-12";
// $i++;
// $edit["field"][$i]["form_group_class"] 				= "hiding";
// $edit["field"][$i]["label"] 						= "Kode TEMP";
// $edit["field"][$i]["input"] 						= "kode_temp";
// $edit["field"][$i]["input_save"] 					= "skip";
// $i++;

if ($edit["mode"] != "add") {
    $edit["query"] = "
	SELECT a.*,
    m2.nama as provinsi,
    m3.nama as provinsi,
    CONCAT(d.nama, '|', d.nomor) AS 'browse|nomormhkabupaten'
	FROM " . $edit["table"] . " a
    LEFT JOIN mhkabupaten d on a.nomormhkabupaten = d.nomor
    left join mhprovinsi m2 on m2.nomor = a.nomormhprovinsi 
    left join mhprovinsi m3 on m3.nomor = d.nomormhprovinsi 
	WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

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
    // // echo $edit["field"][$grid[0]]["grid_set"]["query"];
    // // $edit = fill_value($edit, $r);
    // //query grid unutk outlet customer 
    // $edit["field"][$grid[1]]["grid_set"]["query"] = "
    // SELECT a.*,
    // d.nama AS nama_customer,
    // d.alamat AS alamat_customer
    // FROM " . $edit["detail"][1]["table_name"] . " a
    // LEFT JOIN mhrelasi d ON a.nomormhrelasi = d.nomor 
    // WHERE a.status_aktif > 0
    // AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];
    $edit = fill_value($edit, $r);
}

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
?>

<script type="text/javascript">
    $(document).ready(function() {
        // get_nomormhusaha();
        // myFunction();
    });

    function checkHeader() {
        var fields = [
            'browse_master_kecamatan2_hidden|Kecamatan'
        ];
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