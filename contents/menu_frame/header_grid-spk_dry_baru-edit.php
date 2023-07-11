<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


$edit["sp_approve"] = "sp_disetujui_spk_dry";
$edit["sp_approve_param"] = array("param_nomormhadmin|0","param_status_disetujui|0","param_nomor|0","param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_spk_dry";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0","param_status_dibatalkan|0","param_nomor|0","param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdspkextrusidry";
$edit["detail"][$i]["field_name"] = array(
    "process",
    "nama",
    "is_baru",
    "nomormhproses"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------




// $i = 0;
// if (!empty($_GET["a"]) && $_GET["a"] == "view") {
// 	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
// }


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

// $edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["form_group_class"] 				= "hiding";
$edit["field"][$i]["label"] 						= "is_baru";
$edit["field"][$i]["input"] 						= "is_baru";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= 1;
$i++;


$edit["field"][$i]["label"]                     = "SPK";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthspk";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "spk_dry";
$edit["field"][$i]["browse_set"]["param_output"]     = array(
    "nomor|nomorthspk"
);
$edit["field"][$i]["browse_set"]["call_function"] = array(
	"load_grid_detail"
);
$i++;


$edit["field"][$i]["label"] 					= "nomorthspk";
$edit["field"][$i]["input"]						= "nomorthspk";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_save"] = "skip";
$edit["field"][$i]["form_group_class"] = "hiding";
$i++;


// $edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"] 					= "Qty Pcs";
$edit["field"][$i]["input"]						= "qty";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"]       = "Terbit";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "terbit";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
// if ($edit["mode"] == "add") {
//     $edit["field"][$i]["input_value"] = date("d/m/Y");
// }
// if ($query_detail["total"] > 0) {
//     $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// }
$i++;

// $edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "No PO";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthjualorder";
// $edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "sales_order";
// $edit["field"][$i]["browse_set"]["param_output"]     = array(
//     "nomor|nomormdtop"
// );
$i++;


$edit["field"][$i]["label"] 					= "Produksi";
$edit["field"][$i]["input"]						= "produksi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"] 					= "Selesai";
$edit["field"][$i]["input"]						= "selesai";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "Order";
$edit["field"][$i]["input"]						= "orders";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"] 					= "Nama";
$edit["field"][$i]["input"]						= "nama";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Komposisi";
$edit["field"][$i]["input"]						= "komposisi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"] 					= "Ukuran Barang Jadi";
$edit["field"][$i]["input"]						= "ukuranbarangjadi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Tmicron";
$edit["field"][$i]["input"]						= "tmicron";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

// $edit["field"][$i]["form_group"]                 = 0;
// $edit["field"][$i]["label"] 					= "Customer";
// $edit["field"][$i]["input"]						= "customer";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $edit["field"][$i]["form_group_class"]       = "hiding";
// $i++;


$edit["field"][$i]["label"] 					= "nomorhmrelasi";
$edit["field"][$i]["input"]						= "nomorhmrelasi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["form_group_class"]       = "hiding";
$i++;


//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Printing'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Process',
'Nama Item',
'Action',
'is_baru',
'nomormhproses'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "process",
    "nama",
    "detail",
    "is_baru",
    "nomormhproses"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    process:'',
    nama:'',
    detail:'',
    is_baru:'1',
    nomormhproses:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'process'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'process'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'detail'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'detail'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'is_baru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'is_baru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;


$i++;


// ============================== UPLOAD ============================================


$index = 0;
if ($edit["mode"] != "add") {
    $edit["field"][$i]["box_tab"]             = "upload";
    $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
    $edit["field"][$i]["input_element"]     = 'No Uploaded File';

    $file_nomor = $_GET["no"];
    $file_tabel = $edit["table"];
    $file_query = mysqli_query($con, " 
	SELECT * 
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		kategori = 'SPK_DRY' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "SPK_DRY" . "/" . $json[$count_i]["nama"]));
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $directory = str_replace("'", "\'", $json[$index]["nama"]);
            $directory_details = explode(".", $directory);
            // echo($directory_details[1]);
            if ($edit["mode"] == "edit")
                if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                    if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                    else
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
                else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else	
				if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
            else
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" .str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';


            if ($edit["mode"] != "view")
                // $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="color:white;position:relative;top:-26px;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>';
                $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="margin-left:10px;color:white;position:relative;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;X&nbsp;&nbsp;</a>';
            $edit["field"][$i]["input_element"] .= '</div>';
            $index++;
            $count_i++;
        }
    }
    $edit["field"][$i]["input_save"] = "skip";
    $i++;
    $edit["field"][$i]["form_group_class"]       = "hiding";
    $edit["field"][$i]["label"] = "directory";
    $edit["field"][$i]["input"] = "directory";
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
    $edit["field"][$i]["input_save"] = "skip";
    $i++;
}

// ========================================================= end test==============================


if ($edit["mode"] != "add") {

	$edit["query"] = " SELECT
    a.*,
    DATE_FORMAT(a.terbit,'" . $_SESSION["setting"]["date_sql"] . "') as terbit,
    CONCAT(b.jenis, '|', b.nomor) AS 'browse|nomorthspk',
    CONCAT(d.nama, '|', c.nomor) AS 'browse|nomorthjualorder'
    FROM thspkextrusidry a
    left join thspk b on b.nomor = a.nomorthspk
    left join thjualorder c on c.nomor = a.nomorthjualorder
    left join mhbarang d on d.nomor = c.nomormhbarang
    WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    
    //query grid detail 1
    $button_link_action = "CONCAT('<center><a class=\"btn btn-info btn-app-sm\"><i class=\"fa fa-plus-square\" onclick=\"viewDataAction(',a.nomor,')\" title=\"View Data\"></i></a></center>')";

    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*,
    b.nama process,
    " . $button_link_action . " AS detail
	FROM " . $edit["detail"][0]["table_name"] . " a
    left join mhproses b on b.nomor = a.nomormhproses
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



    $edit = fill_value($edit, $r);
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
$features = "save|back|reload".check_approval($r,"edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton,$features); 
if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=SPK_DRY&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}


?>

<script type="text/javascript">
    $(document).ready(function() {
        // get_nomormhusaha();
        // myFunction();
        $("#tabimages").prependTo("#tab_i1_data");
    });

    function setFile(directory) {
        $("#directory").val(directory);
        $("#itemspec").val(1);
    }

    
    function load_grid_detail()
	{	
	var no = $('#nomorthspk').val();
	
	var pages = 'pages/grid_load.php?id=spk_dry_baru_detail-load&no='+no+'';
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


    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    function viewDataAction(nomor) {
        window.open("?m=spk_dry_baru_detail&f=header_grid&&sm=edit&a=edit&no=" + nomor);
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>

<?php include "x_tab_data_images_dry.php"; ?>
