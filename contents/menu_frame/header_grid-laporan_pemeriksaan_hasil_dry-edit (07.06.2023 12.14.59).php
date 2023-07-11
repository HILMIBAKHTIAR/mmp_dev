<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];



//------------------------------------------------GRID DATA 1------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdqapdry_tention";
$edit["detail"][$i]["field_name"] = array( 
    "std",
    "act",
    "nomorheadergrid",
    
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_tention";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------



//------------------------------------------------GRID DATA 2------------------------------------------------------
// $edit["detail"][$i]["table_name"] = "tdqapprinting_other";
// $edit["detail"][$i]["field_name"] = array(
//     "defects",
//     "parameter",
//     "aktual_sample_1",
//     "aktual_sample_2",
//     "aktual_sample_3",
//     "aktual_sample_4",
//     "aktual_sample_5",
//     "aktual_sample_6",
//     "aktual_sample_7",
//     "aktual_sample_8",
//     "aktual_sample_9",
//     "aktual_sample_10"

// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_other";
// $i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------




$i = 0;

if(!empty($_GET["a"]) && $_GET["a"] == "view"){
	$edit["field"][$i]["box_tabs"] = array("data|Data","upload|Upload","info|Info");
}
 else {
	if(isset($_GET["no"])){
		$edit["field"][$i]["box_tabs"] = array("data|Data","upload|Upload");
	}else{
		$edit["field"][$i]["box_tabs"] = array("data|Data");
	}
}



$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"] 						= "Kode";
$edit["field"][$i]["input"] 						= "kode";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
$i++;

$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;


$edit["field"][$i]["label"] 					= "Shift";
$edit["field"][$i]["input"]						= "shift";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"]                     = "Supllier";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_supplier";
$edit["field"][$i]["browse_set"]["call_function"] = array(
    "load_grid_detail"
);
$i++;


$edit["field"][$i]["label"]                     = "No. SPK";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthspk";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_spk";
$edit["field"][$i]["browse_set"]["param_output"]     = array("nama|nama_produk", "komposisi|komposisi_bahan");
$edit["field"][$i]["browse_set"]["call_function"] = array(
    "load_grid_detail"
);
$i++;


$edit["field"][$i]["label"] 					= "Nama Produk";
$edit["field"][$i]["input"]						= "nama_produk";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Komposisi Bahan";
$edit["field"][$i]["input"]						= "komposisi_bahan";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "<strong>IMPRESS DOCTOR BLADE</strong> <br>Hitam";
$edit["field"][$i]["input"]						= "hitam";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "Merah";
$edit["field"][$i]["input"]						= "merah";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "TENTION LAMINATING NIP M";
$edit["field"][$i]["input"]						= "tln_m";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "TENTION LAMINATING NIP G";
$edit["field"][$i]["input"]						= "tln_g";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


// $edit["field"][$i]["form_group"]              = 0;
// $edit["field"][$i]["label"]                   = "";
// $edit["field"][$i]["input_element"]      = "
// 	<a   class='btn btn-info btn-app-sm' onclick=load_grid_detail()><i class='fa fa-refresh'></i></a>
// ";
// $edit["field"][$i]["input_col"] = "col-sm-1";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;


//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'PARAMETER TENTION'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Parameter Tention',
'STD',
'ACT',
'nomorheadergrid'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "tention",
    "std",
    "act",
    "nomorheadergrid"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    tention:'',
    std:'',
    act:'',
    nomorheadergrid:''
}";

$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tention'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tention'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'std'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'std'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'act'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'act'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorheadergrid'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorheadergrid'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------




$edit["field"][$i]["label"] 					= "<strong>IMPRESS RUBBER ROLL</strong> <br>Impress Sleeve";
$edit["field"][$i]["input"]						= "impress_sleve";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "Impress M";
$edit["field"][$i]["input"]						= "impress_m";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Impress G";
$edit["field"][$i]["input"]						= "impress_g";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Infeed Nip M";
$edit["field"][$i]["input"]						= "infeed_nip_m";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Infeed Nip G";
$edit["field"][$i]["input"]						= "infeed_nip_g";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Chamber Arm";
$edit["field"][$i]["input"]						= "chamber_arm";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;



$edit["field"][$i]["label"] 					= "<strong>TEMPERATURE CONTROL</strong> <br>Burner";
$edit["field"][$i]["input"]						= "burner";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "Dryer I";
$edit["field"][$i]["input"]						= "dryer_1";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Dryer II";
$edit["field"][$i]["input"]						= "dryer_2";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Dryer III";
$edit["field"][$i]["input"]						= "dryer_3";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;




//-----------------------------------------FRONTEND GRID 2--------------------------------
// $grid[1] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'OTHER CHECK'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'PARAMETERS/NAMA ALAT CEK',
// 'DEFECTS/DEVIATION',
// '1',
// '2',
// '3',
// '4',
// '5',
// '6',
// '7',
// '8',
// '9',
// '10'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "parameter",
//     "defects",
//     "aktual_sample_1",
//     "aktual_sample_2",
//     "aktual_sample_3",
//     "aktual_sample_4",
//     "aktual_sample_5",
//     "aktual_sample_6",
//     "aktual_sample_7",
//     "aktual_sample_8",
//     "aktual_sample_9",
//     "aktual_sample_10"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     parameter:'',
//     defects:'',
//     aktual_sample_1:'',
//     aktual_sample_2:'',
//     aktual_sample_3:'',
//     aktual_sample_4:'',
//     aktual_sample_5:'',
//     aktual_sample_6:'',
//     aktual_sample_7:'',
//     aktual_sample_8:'',
//     aktual_sample_9:'',
//     aktual_sample_10:'' 
// }";


// $j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'parameter'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'parameter'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'defects'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'defects'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_2'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_2'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_3'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_3'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_4'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_4'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_5'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_5'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_6'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_6'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_7'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_7'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_8'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_8'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_9'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_9'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_10'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_10'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;


// $row 																						= 0; 
// $k 														   									= 0;


// $edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]           				= "true";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]	= "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "10";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]     		= "'Aktual Sampel'";
// $k++;

// $row++;

// $i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------





if ($edit["mode"] != "add") {

	$edit["query"] = " SELECT
    a.*
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi'
    FROM thqapprinting a
    left join mhrelasi b on b.nomor = a.nomormhrelasi
    WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
    FROM " . $edit["detail"][0]["table_name"] . " a
    AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    // $edit["field"][$grid[1]]["grid_set"]["query"] = "
	// SELECT
    // a.*
    // FROM " . $edit["detail"][1]["table_name"] . " a
    // AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];


    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update"); 
$edit_navbutton = generate_navbutton($edit_navbutton);
if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=SALES_ORDER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}

?>

<script type="text/javascript">


    // setTimeout(function() {
    //     load_grid_detail();
    // }, 100);


    <?php if ($edit["mode"] == "view"): ?> 
        <script>
            $(document).ready(function() {
                $('#jqgh_pengecekan_incoming_bahan_baku_detail_visual_grid_aktual_sample_1').prop('disabled', true);
            });
        </script>
    <?php endif; ?>

    
    $(document).ready(function() {

    });


    function load_grid_detail()
	{	
	
	var pages = 'pages/grid_load.php?id=pengecekan_incoming_paper_core_detail_specification-load';
	jQuery(<?=$grid_elm[0]?>).jqGrid('setGridParam',
	{
		url:pages,
		datatype:'json',
		loadComplete:function(data)
		{
			<?=$grid_str[0]?>_load = 0;
			actGridComplete_<?=$grid_str[0]?>();
		}
	});
	jQuery(<?=$grid_elm[0]?>).trigger('reloadGrid');

	}


    function load_grid_detail2()
	{	
    var pages2 = 'pages/grid_load.php?id=pengecekan_incoming_paper_core_detail_visual-load';
	jQuery(<?=$grid_elm[1]?>).jqGrid('setGridParam',
	{
		url:pages2,
		datatype:'json',
		loadComplete:function(data)
		{
			<?=$grid_str[1]?>_load = 0;
			actGridComplete_<?=$grid_str[1]?>();
		}
	});
	jQuery(<?=$grid_elm[1]?>).trigger('reloadGrid');

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
