<?php
$edit["debug"]       = 1;
$edit["uppercase"]   = 1;
$edit["string_code"]    = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
$edit["string_summary"]     = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


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
$edit["detail"][$i]["table_name"] = "tdbelipermintaan";
$edit["detail"][$i]["field_name"] = array(
    "nomormhbarang",
    "nomormhsatuanqty",
    "nomormhlokasi",
    "jumlah_unit",
    "keterangan",
    "bb",
    "nomor"
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

$edit["field"][$i]["form_group_class"]                 = "hiding";
$edit["field"][$i]["label"]       = "nomormhdepartemen";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "nomormhdepartemen";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_value"] = 1;
$i++;

$edit["field"][$i]["form_group_class"]                 = "hiding";
$edit["field"][$i]["label"]       = "kelompok";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "kelompok";
$edit["field"][$i]["input_class"] = "required"; 
$edit["field"][$i]["input_value"] = 'Non Bahan Baku';
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
'Keterangan',
'BB',
'nomormhbarang',
'nomormhsatuanqty',
'nomormhlokasi',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "barang",
    "jumlah_unit",
    "satuan_qty",
    "area",
    "keterangan",
    "bb",
    "nomormhbarang",
    "nomormhsatuanqty",
    "nomormhlokasi",
    "nomor"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    barang:'',
    jumlah_unit:'',
    satuan_qty:'',
    area:'',
    keterangan:'',
    bb:'',
    nomormhbarang:'',
    nomormhsatuanqty:'',
    nomormhlokasi:''
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
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_qty }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'area'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'area'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_area }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'bb'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'bb'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
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

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$i++;



if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    FROM thbelipermintaan a
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*,
    CONCAT(b.kode, ' - ', b.nama) AS barang,
    c.nama as satuan_qty,
    b.nomor as nomormhbarang,
    c.nomor as nomormhsatuanqty,
    b.berat_jenis,
    d.nama as area 
	FROM " . $edit["detail"][0]["table_name"] . " a
    join mhbarang b on b.nomor = a.nomormhbarang and b.status_aktif > 0
    left join mhsatuan c on c.nomor = a.nomormhsatuanqty and c.status_aktif > 0
    left join mhlokasi d on d.nomor = a.nomormhlokasi and d.status_aktif > 0
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload|add" . check_approval($r, "edit|approve|disappr|delete|print");
// $features = "save|back|reload" . check_approval($r, "edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);
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