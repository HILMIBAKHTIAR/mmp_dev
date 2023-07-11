<?php
$edit["debug"]                 = 0;


$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"]                         = "Kode Akun";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "kodeakun";
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

$edit["field"][$i]["label"]                         = "Type Rekening";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "typerek";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"]                         = "Kode Master";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "kodemaster";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
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