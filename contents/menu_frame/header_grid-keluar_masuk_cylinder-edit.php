<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdkeluarmasukcylinder";
$edit["detail"][$i]["field_name"] = array(
    "unit_cylinder",
    "cylinder_sebelum",
    "cylinder_sesudah",
    "keterangan",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------



//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdkeluarmasukcylinder_pembersihan";
$edit["detail"][$i]["field_name"] = array(
    "jenis_checklist",
    "sudah",
    "belum",
    "keterangan"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_pembersihan";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------


$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload", "info|Info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    }
}



$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"]                         = "Peruntukan";
$edit["field"][$i]["input"]                         = "peruntukan";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("PRODUKSI|PRODUKSI", "REPARASI|REPARASI");
$edit["field"][$i]["input_attr"]["onchange"] = "hide_and_show()";
$i++;

$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
// if ($edit["mode"] == "add") {
//     $edit["field"][$i]["input_attr"]["onchange"] = "load_grid_detail(), load_grid_detail2()";
// }
$i++;

$edit["field"][$i]["form_group_class"] = "no_section";
$edit["field"][$i]["label"]                     = "Nomor SPK";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthspkmmp";
// $edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "spk";
$i++;

$edit["field"][$i]["label"]                     = "Nama Cylinder";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthbarang";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_barang_customerv2";
$edit["field"][$i]["browse_set"]["param_output"]             = array("kode_cilinder|kode_cylinder");
if ($edit["mode"] == "add")
    $edit["field"][$i]["browse_set"]["call_function"] = array(
        "load_grid_detail(), load_grid_detail2()"
    );
$i++;


$edit["field"][$i]["label"]                     = "Jumlah Cylinder";
$edit["field"][$i]["input"]                        = "jumlah_cylinder";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;


$edit["field"][$i]["label"]                     = "Kode Cylinder";
$edit["field"][$i]["input"]                        = "kode_cylinder";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Cylinder'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Unit Cylinder',
'Sebelum',
'Sesudah',
'Keterengan',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "unit_cylinder",
    "cylinder_sebelum",
    "cylinder_sesudah",
    "keterangan",
    "nomor"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    unit_cylinder:'',
    cylinder_sebelum:'',
    cylinder_sesudah:'',
    keterangan:'',
    nomor:''
}";

$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'unit_cylinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'unit_cylinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'cylinder_sebelum'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'cylinder_sebelum'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["edittype"] = "'select'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"] = "'select'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{value:{ 
	'CACAT':'CACAT', 
	'TIDAK':'TIDAK'
 }}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'cylinder_sesudah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'cylinder_sesudah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["edittype"] = "'select'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"] = "'select'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{value:{ 
	'CACAT':'CACAT', 
	'TIDAK':'TIDAK'
 }}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$row                                                                                         = 0;
$k                                                                                                = 0;


$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'cylinder_sebelum'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Kondisi Cylinder'";
$k++;

$row++;

$i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------




//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Pembersihan Cylinder'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'jenis checklist',
'sudah',
'belum',
'keterangan',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "jenis_checklist",
    "sudah",
    "belum",
    "keterangan",
    "nomor"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    jenis_checklist:'',
    sudah:'',
    belum:'',
    keterangan:'',
    nomor:''
}";
// $edit["field"][$i]["grid_set"]["navgrid"] = 0;
// $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis_checklist'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis_checklist'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sudah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sudah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'belum'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'belum'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------






if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    , CONCAT(b.nama_barang_customer, '|', b.nomor) AS 'browse|nomorthbarang'
    , CONCAT(c.kode, '|', c.nomor) AS 'browse|nomorthspkmmp'
    FROM thkeluarmasukcylinder a
    join thbarang b on a.nomorthbarang = b.nomor and b.status_aktif = 1
    left join thspkmmp c on a.nomorthspkmmp = c.nomor and c.status_aktif = 1
    WHERE a.status_aktif = 1 and a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
    FROM " . $edit["detail"][0]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT
    a.*
    FROM " . $edit["detail"][1]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
?>

<script type="text/javascript">
    // setTimeout(function() {
    //     load_grid_detail();
    // }, 100);


    $(document).ready(function() {

    });



    function load_grid_detail() {
        var no = $('#browse_master_barang_customerv2_hidden').val();
        var pages = 'pages/grid_load.php?id=keluar_masuk_cylinder_detail-load&no=' + no + '';
        jQuery(<?= $grid_elm[0] ?>).jqGrid('setGridParam', {
            url: pages,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[0] ?>_load = 0;
                actGridComplete_<?= $grid_str[0] ?>();
            }
        });
        jQuery(<?= $grid_elm[0] ?>).trigger('reloadGrid');
    }

    function load_grid_detail2() {

        var pages = 'pages/grid_load.php?id=keluar_masuk_cylinder_detail_pembersihan-load';
        jQuery(<?= $grid_elm[1] ?>).jqGrid('setGridParam', {
            url: pages,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[1] ?>_load = 1;
                actGridComplete_<?= $grid_str[1] ?>();
            }
        });
        jQuery(<?= $grid_elm[1] ?>).trigger('reloadGrid');
    }

    function hide_and_show() {
        console.log(hide_and_show)
        var peruntukan = $('#peruntukan').val();
        var mode = '<?= $edit['mode'] ?>'

        // if (mode == 'edit') {
        //     $('#peruntukan').attr('readonly', 1)
        // }

        if (peruntukan == 'REPARASI') {
            $('.no_section').hide();
            // if (mode != 'view') {
            //     $("#nama").removeAttr('readonly');
            //     $("#customer").removeAttr('readonly');
            //     $("#width").removeAttr('readonly');
            //     $("#pitch").removeAttr('readonly');
            //     $("#up").removeAttr('readonly');
            //     $("#length").removeAttr('readonly');
            //     $("#browse_master_jenis_packaging_search").removeAttr('readonly');
            // }
        } else {
            $('.no_section').show();
            // $("#nama").attr('readonly', 1)
            // $("#customer").attr('readonly', 1)
            // $("#width").attr('readonly', 1)
            // $("#pitch").attr('readonly', 1)
            // $("#length").attr('readonly', 1)
            // $("#browse_master_jenis_packaging_search").attr('readonly', 1)
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

    function viewDataAction(nomor) {
        window.open("?m=spk_printing_baru_detail&f=header_grid&&sm=edit&a=edit&no=" + nomor);
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>