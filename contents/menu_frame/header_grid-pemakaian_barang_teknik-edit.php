<?php
$edit["debug"]       = 1;
$edit["string_code"]    = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


$edit["sp_approve"] = "sp_disetujui_thbelipermintaan";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thbelipermintaan";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";



//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdbelipemakaianteknik";
$edit["detail"][$i]["field_name"] = array(
    "nomormhbarang",
    "nomormhsatuanqty",
    "nomormhlokasi",
    "jumlah_unit",
    "keterangan",
    "nomormhkaryawan",
    "nomorperbaikan",
    "nomorbtb"
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
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    }
}
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"]                   = "No. Permintaan";
$edit["field"][$i]["input"]                   = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
}
$i++;


$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"]       = "Keterangan";
$edit["field"][$i]["input"]       = "keterangan";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_col"] = "col-sm-4";
$i++;


//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Detail Barang'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Barang',
'Qty',
'Unit',
'Area',
'Pemakai',
'No. Perbaikan',
'No. BTB',
'Keterangan',
'nomormhbarang',
'nomormhsatuanqty',
'nomormhlokasi',
'nomormhkaryawan',
'nomorperbaikan',
'nomorbtb',
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "barang",
    "jumlah_unit",
    "satuan_qty",
    "area",
    "pemakai",
    "no_perbaikan",
    "no_btb",
    "keterangan",
    "nomormhbarang",
    "nomormhsatuanqty",
    "nomormhlokasi",
    "nomormhkaryawan",
    "nomorperbaikan",
    "nomorbtb",
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    barang:'',
    jumlah_unit:'',
    satuan_qty:'',
    area:'',
    pemakai:'',
    no_perbaikan:'',
    no_btb:'',
    keterangan:'',
    nomormhbarang:'',
    nomormhsatuanqty:'',
    nomormhlokasi:'',
    nomormhkaryawan:'',
    nomorperbaikan:'',
    nomorbtb:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barang }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_unit'"; 
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_qty }";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'area'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'area'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_area }";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pemakai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pemakai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_perbaikan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'no_perbaikan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_btb'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'no_btb'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhlokasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhlokasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhkaryawan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhkaryawan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorperbaikan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorperbaikan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorbtb'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorbtb'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$i++;



if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    FROM thbelipemakaianteknik a
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*,
    CONCAT(b.kode, ' - ', b.nama) AS barang,
    a.jumlah_konversi,
    a.jumlah_unit,
    a.jumlah,
    a.keterangan,
    c.nama as satuan_qty,
    b.nomor as nomormhbarang,
    c.nomor as nomormhsatuanqty,
    b.berat_jenis,
    d.nama as area 
	FROM " . $edit["detail"][0]["table_name"] . " a
    left join mhbarang b on b.nomor = a.nomormhbarang and b.status_aktif > 0
    left join mhsatuan c on c.nomor = a.nomormhsatuanqty and c.status_aktif > 0
    left join mhlokasi d on d.nomor = a.nomormhlokasi and d.status_aktif > 0
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



    $edit = fill_value($edit, $r);
}

if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=PURCHASE_REQUEST&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
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
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload" . check_approval($r, "edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);
// $edit_navbutton = generate_navbutton($edit_navbutton);
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

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>