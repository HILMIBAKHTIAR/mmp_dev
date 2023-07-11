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
$edit["detail"][$i]["table_name"] = "tdbelipenerimaanteknik";
$edit["detail"][$i]["field_name"] = array(
    "nomormhbarang",
    "nomormhsatuanqty",
    "nomormhlokasi",
    "nomortdbelipermintaanteknik",
    "jumlah_unit",
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
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    }
}
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"] = "Kode";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
$edit["field"][$i]["form_group_class"] = "hiding";
$i++;

$edit["field"][$i]["label"] = "No. Terima";
$edit["field"][$i]["input"] = "kode_nota";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

$edit["field"][$i]["label"]                     = "No. PBT";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthbelipermintaanteknik";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "permintaan_barang_teknik";
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"nomor|nomorPenerimaan"
);
$edit["field"][$i]["browse_set"]["call_function"] = array(
	"load_grid_detail"
);
$i++;


$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "No. BSTB";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhgudang";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_gudang_teknik";
$i++;


$edit["field"][$i]["label"] 					= "nomorPenerimaan";
$edit["field"][$i]["input"]						= "nomorPenerimaan";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_save"] = "skip";
$edit["field"][$i]["form_group_class"] = "hiding";
$i++;


$edit["field"][$i]["label"]       = "Tanggal Terima";
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
'Keterangan',
'nomortdbelipermintaanteknik',
'nomormhbarang',
'nomormhlokasi',
'nomormhsatuanqty'

";
$edit["field"][$i]["grid_set"]["column"] = array(
    "barang",
    "jumlah_unit",
    "satuan_qty",
    "area",
    "keterangan",
    "nomortdbelipermintaanteknik",
    "nomormhbarang",
    "nomormhlokasi",
    "nomormhsatuanqty"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    barang:'',
    jumlah_unit:'',
    satuan_qty:'',
    area:'',
    keterangan:'',
    nomortdbelipermintaanteknik:'',
    nomormhbarang:'',
    nomormhlokasi:'',
    nomormhsatuanqty:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barang }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_unit'"; 
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_qty }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'area'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'area'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_area }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomortdbelipermintaanteknik'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomortdbelipermintaanteknik'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
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

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$i++;



if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    , CONCAT(b.kode, '|', b.nomor) AS 'browse|nomormhgudang'
    , CONCAT(c.kode, '|', c.nomor) AS 'browse|nomorthbelipermintaanteknik'
    FROM thbelipenerimaanteknik a
    left join mhgudang b on b.nomor = a.nomormhgudang
    left join thbelipermintaanteknik c on c.nomor = a.nomorthbelipermintaanteknik
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
    SELECT DISTINCT
        a.*,
        COALESCE(CONCAT(e.kode, ' - ', e.nama_barang_customer), CONCAT(b.kode, ' - ', b.nama)) AS barang,
        a.jumlah_konversi,
        a.jumlah_unit,
        a.jumlah,
        a.keterangan,
        c.nama AS satuan_qty,
        b.nomor AS nomormhbarang,
        c.nomor AS nomormhsatuanqty,
        b.berat_jenis,
        areas.area AS area,
        a.keterangan_permintaan AS keterangan
    FROM thbelipenerimaanteknik x
    JOIN " . $edit["detail"][0]["table_name"] . " a ON a.nomorthbelipenerimaanteknik = x.nomor AND a.status_aktif > 0
    JOIN mhbarang b ON b.nomor = a.nomormhbarang AND b.status_aktif > 0
    LEFT JOIN mhsatuan c ON c.nomor = a.nomormhsatuanqty AND c.status_aktif > 0
    LEFT JOIN thbarang e ON e.nomor = b.nomormhcilinder
    LEFT JOIN (
        SELECT t5.nama AS area, t1.nomor
        FROM thbelinota t1
        JOIN thbeliorder t2 ON t2.nomor = t1.nomorthbeliorder
        JOIN thbelipermintaanmaster t3 ON t3.nomor = t2.nomorthbelipermintaanmaster AND t3.kelompok = 'teknik'
        JOIN tdbelipermintaanmaster t4 ON t4.nomorthbelipermintaanmaster = t3.nomor
        LEFT JOIN mhlokasi t5 ON t5.nomor = t4.nomormhlokasi
        GROUP BY t1.nomor
    ) AS areas ON areas.nomor = x.nomorthbelinota
    WHERE a.status_aktif > 0
        AND a.nomorthbelipenerimaanteknik = " . $_GET["no"] . "
    GROUP BY a.nomormhbarang"; // Add GROUP BY clause



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

    function load_grid_detail() {
		var no = $('#nomorPenerimaan').val();

		var pages = 'pages/grid_load.php?id=penerimaan_barang_teknik_detail-load&no=' + no + '';
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


    function test() {
        var kode = $("#kode").val();
        const currentDate = new Date();
        const year = currentDate.getFullYear().toString().substr(-2);
        const month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
        const code = `BTB-${kode}/TNK/${month}/20${year}`;

        $('#kode_custom').val(code);

        return code;
    }


    $(document).ready(function() {
        test();
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