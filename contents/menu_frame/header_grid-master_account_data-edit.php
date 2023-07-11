<?php
$edit["debug"]                 = 1;
$edit["uppercase"]             = 1;
$edit["unique"]             = array("nama");
// $edit["next_save_delay"]     = 3;
// $edit["unique"]             = array("kode");
// $edit["manual_save"]         = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";
// $edit["string_code"] 		= "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];


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
$edit["field"][$i]["label"]                         = "Kode";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "kode";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;
$edit["field"][$i]["label"]                         = "Nama";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "nama";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;


$edit["field"][$i]["label"] = "Kategori";
$edit["field"][$i]["input"] = "kategori";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"] = array("Aktiva|Aktiva", "Hutang|Hutang", "Modal|Modal", "Penjualan|Penjualan", "Harga Pokok Penjualan|Harga Pokok Penjualan", "Biaya|Biaya", "Biaya Lain-lain|Biaya Lain-lain", "Pendapatan Lain-lain|Pendapatan Lain-lain");
$i++;

$edit["field"][$i]["label"] = "Status Browse";
$edit["field"][$i]["input"] = "is_browse";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"] = array("1|Ya", "0|Tidak");
$i++;


$edit["field"][$i]["label"] = "Header / Detail";
$edit["field"][$i]["input"] = "detail";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"] = array("0|Header", "1|Detail");
$i++;
$edit["field"][$i]["label"] = "Kas / Bank/ Giro";
$edit["field"][$i]["input"] = "metode";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("-|-", "KAS|KAS", "BANK|BANK", "GIRO|GIRO");
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Kas";
$edit["field"][$i]["input"] = "kas";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Bank";
$edit["field"][$i]["input"] = "bank";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "giro";
$edit["field"][$i]["input"] = "giro";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["label"]                         = "FOH";
$edit["field"][$i]["input"]                         = "is_foh";
$edit["field"][$i]["input_element"]                 = "select";
$edit["field"][$i]["input_option"]                     = array(
    "0|tidak",
    "1|iya"
);
$i++;
$edit["field"][$i]["label"]                         = "Inisial";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "kode_inisial";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;
$edit["field"][$i]["anti_mode"]     = "add";
$edit["field"][$i]["label"]         = "Status";
$edit["field"][$i]["input"]         = "status_aktif";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"]  = generate_status_option($edit["mode"]);
$i++;
$edit["field"][$i]["label"]                          = "Keterangan";
$edit["field"][$i]["label_col"]                     = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"]             = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]                          = "keterangan";
$edit["field"][$i]["input_element"]                  = "textarea";
$edit["field"][$i]["input_attr"]["rows"]             = "5";
$edit["field"][$i]["input_col"]                     = "col-sm-12";
$i++;


if ($edit["mode"] != "add") {
    $edit["query"] = "
	SELECT a.*
	FROM " . $edit["table"] . " a
	WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    $edit = fill_value($edit, $r);
}

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
?>

<script language="javascript" type="text/javascript">
    $(document).ready(function() {
        $("#metode").on("change", function() {
            metode_value_changed();
        });
        metode_value_changed();
    });

    function metode_value_changed() {
        var obj = $("#metode").val();
        if (obj === "KAS") {
            console.log("s");
            $('#kas').val(1);
            $('#bank').val(0);
            $('#giro').val(0);
        } else if (obj === "BANK") {
            $('#kas').val(0);
            $('#bank').val(1);
            $('#giro').val(0);
        } else if (obj === "GIRO") {
            $('#kas').val(0);
            $('#bank').val(0);
            $('#giro').val(1);
        } else {
            $('#kas').val(0);
            $('#bank').val(0);
            $('#giro').val(0);
        }
    }
</script>