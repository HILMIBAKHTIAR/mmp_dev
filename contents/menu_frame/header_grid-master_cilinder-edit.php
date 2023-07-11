<?php
$edit["debug"]                 = 1;
$edit["uppercase"]             = 1;
// $edit["unique"]             = array("kode");
// $edit["unique"]             = array("nama");
$edit["string_code"]         = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "mdcilinder";
$edit["detail"][$i]["field_name"] = array(
    "nomormhbarang",
    "nomormhsatuanqty"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


//------------------------------------------------END GRID DATA 2-----------------------------------------------------
$edit["detail"][$i]["table_name"] = "mdcilinderwarna";
$edit["detail"][$i]["field_name"] = array(
    "nomor_silinder",
    "serial_number",
    "warna",
    "nomorstatus_warna_spare",
    "urutan_unit"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_warna";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------



$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"]                     = "Kode";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "kode";
$edit["field"][$i]["input_class"]                 = "required";
$i++;

$edit["field"][$i]["label"]                     = "Nama";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthbarang";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_barang_customer";
$i++;

$edit["field"][$i]["anti_mode"]     = "add";
$edit["field"][$i]["label"]         = "Status";
$edit["field"][$i]["input"]         = "status_aktif";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"]  = generate_status_option($edit["mode"]);
$i++;



//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Cilinder'";
// $edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Barang',
'Satuan',
'nomormhbarang',
'nomormhsatuanqty'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "barang",
    "satuan_qty",
    "nomormhbarang",
    "nomormhsatuanqty"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    barang:'',
    satuan_qty:'',
    nomormhbarang:'',
    nomormhsatuanqty:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barang }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_qty }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------



//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Warna'";
$edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
$edit["field"][$i]["grid_set"]["nav_option"]["del"] = "false";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Urutan Unit',
'Serial Number',
'Warna',
'Status',
'nomorstatus_warna_spare',
'Nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "urutan_unit",
    "serial_number",
    "warna",
    "status_silinder",
    "nomorstatus_warna_spare",
    "nomor",
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ }";


$j = 0;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'urutan_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'urutan_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'serial_number'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'serial_number'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status_silinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status_silinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_status_warna_1 }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorstatus_warna_spare'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorstatus_warna_spare'";
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


// ---------------------------------------END FRONT GRID 2-------------------------------------------------


if ($edit["mode"] != "add") {
    $edit["query"] = "
	SELECT a.*
    , CONCAT(b.nama_barang_customer, '|', b.nomor) AS 'browse|nomorthbarang'
	FROM " . $edit["table"] . " a
    left join thbarang b on b.nomor = a.nomorthbarang and b.status_aktif > 0
	WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*,
    b.nama barang,
    c.nama satuan_qty
	FROM " . $edit["detail"][0]["table_name"] . " a
    left join mhbarang b on b.nomor = a.nomormhbarang
    left join mhsatuan c on c.nomor = a.nomormhsatuanqty
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];


    $edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT
    a.*,
    -- (@counter := @counter + 1) - 1 AS urutan_unit,
    a.urutan_unit AS original_urutan_unit,
    b.nama AS status_silinder
    FROM " . $edit["detail"][1]["table_name"] . " a
    LEFT JOIN status_warna_spare b ON b.nomor = a.nomorstatus_warna_spare
    -- CROSS JOIN (SELECT @counter := 0) AS counter_init
    WHERE a.status_aktif > 0
    AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    $edit = fill_value($edit, $r);
}

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton, "save|edit|back|reload");
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