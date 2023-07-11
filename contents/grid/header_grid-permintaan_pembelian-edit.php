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




session_start();
// foreach ($_SESSION as $key => $value) {
//     echo "Session variable '" . $key . "' has the value: " . $value . "<br>";
// }

if (isset($_SESSION['grid_browse_purchase_request'])) {
    // Retrieve the value of 'grid_browse_purchase_request'
    $gridValue = $_SESSION['grid_browse_purchase_request'];
    
    // Print the array structure
    echo "Session variable 'grid_browse_purchase_request' has the value: ";
    print_r($gridValue);
} else {
    echo "Session variable 'grid_browse_purchase_request' is not set.";
}



if ($edit["mode"] != "add") {

    $edit["query"] = " 
    SELECT
        a.*
    FROM
    thbelipermintaan a
    WHERE a.nomor a.nomorthbelipermintaan is not null and a.status_aktif = 1 and = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));
    
}



//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdbelipermintaan";
$edit["detail"][$i]["field_name"] = array(
    "nomormhbarang",
    "nomormhsatuanqty",
    "nomormhsatuanberat",
    "jumlah_unit",
    "jumlah_konversi",
    "jumlah",
    "jumlah_berat",
    "keterangan"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------



$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info", "upload|Upload");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    }
}
$edit["field"][$i]["box_tab"] = "data";
// $edit["field"][$i]["form_group_class"] 				= "hiding";
// $edit["field"][$i]["label"] 						= "Kategori";
// $edit["field"][$i]["input"] 						= "nomormhbarangkategori";
// $edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// if ($edit["mode"] == "add")
// 	$edit["field"][$i]["input_value"] 				= 1;
// $i++;

$edit["field"][$i]["label"]                   = "Kode";
$edit["field"][$i]["input"]                   = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
}
$i++;

$edit["field"][$i]["label"]                   = "Kode Parent";
$edit["field"][$i]["input"]                   = "kode_parent";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["form_group_class"] 				= "hiding";
$i++;



$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
// if ($edit["mode"] == "add") {
//     $edit["field"][$i]["input_value"] = date("d/m/Y");
// }
if ($query_detail["total"] > 0) {
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$i++;

$edit["field"][$i]["label"]                     = "Departemen";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhdepartemen";
// $edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_departemen";
$i++;


$edit["field"][$i]["label"]                     = "Purchase Request";
$edit["field"][$i]["input"]                     = "nomorthbelipermintaan";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "purchase_request";
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"generated_kode|kode",
	"generated_kode|kode_parent", 
);
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
}
$i++;



//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Detail Barang'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Barang',
'Satuan',
'Qty',
'Keterangan',
'jumlah konversi',
'jumlah',
'Jumlah Berat',
'Berat Jenis',
'nomormhbarang',
'nomormhsatuanqty',
'nomormhsatuanberat'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "barang",
    "satuan_qty",
    "jumlah_unit",
    "keterangan",
    "jumlah_konversi",
    "jumlah",
    "jumlah_berat",
    "berat_jenis",
    "nomormhbarang",
    "nomormhsatuanqty",
    "nomormhsatuanberat"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    nama_barang:'',
    satuan_qty:'',
    jumlah_unit:'',
    keterangan:'',
    jumlah_konversi:'1',
    jumlah:'',
    jumlah_berat:'',
    berat_jenis:'',
    nomormhbarang:'',
    nomormhsatuanqty:'',
    nomormhsatuanberat:''
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

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_konversi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_konversi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'berat_jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'berat_jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
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

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanberat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanberat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
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

// ---------------------------------------END FRONT GRID 1-------------------------------------------------

$index = 0;
if ($edit["mode"] != "add") {
    $edit["field"][$i]["box_tab"]             = "upload";
    $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
    $edit["field"][$i]["input_element"]     = 'No Uploaded File';

    $file_nomor = $_GET["no"];
    $file_tabel = $edit["table"];
    $file_query = mysqli_query($con, " 
  	SELECT nomor, `directory`, nama, kategori  
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		kategori = 'PURCHASE_REQUEST' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $index = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $edit["field"][$i]["input_element"] .= '<a class="btn btn-block btn-outline btn-midnight" style= "white-space: break-spaces; margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["directory"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            if ($edit["mode"] != "view")
                $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="color:white;position:relative;top:-26px;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>';
            $edit["field"][$i]["input_element"] .= '</div>';
            $index++;
        }
    }
    $edit["field"][$i]["input_save"] = "skip";
    $i++;
}


if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    IF(a.kode_parent IS NOT NULL, a.kode_parent, a.kode) AS kode,
    CONCAT(c.kode, '|', c.nomor) AS 'browse|nomorthbelipermintaan',
    DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
    CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhdepartemen'
    FROM thbelipermintaan a
    left join mhdepartemen b on b.nomor = a.nomormhdepartemen
    left join thbelipermintaan c on c.nomor = a.nomorthbelipermintaan
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
    e.nama as department,
    f.nama as supplier
	FROM " . $edit["detail"][0]["table_name"] . " a
    left join mhbarang b on b.nomor = a.nomormhbarang and b.status_aktif > 0
    left join mhsatuan c on c.nomor = a.nomormhsatuanqty and c.status_aktif > 0
    left join mhsatuan d on d.nomor = a.nomormhsatuanberat and d.status_aktif > 0
    left join mhdepartemen e on e.nomor = a.nomormhdepartemen and e.status_aktif > 0
    left join mhrelasi f on f.nomor = a.nomormhrelasi and f.status_aktif > 0
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