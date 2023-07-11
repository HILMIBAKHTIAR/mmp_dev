<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];




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



// $edit["field"][$i]["label"] 						= "Kode";
// $edit["field"][$i]["input"] 						= "kode";
// $edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// if ($edit["mode"] == "add")
// 	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
// $i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["form_group_class"] 				= "hiding";
$edit["field"][$i]["label"] 						= "is_baru";
$edit["field"][$i]["input"] 						= "is_baru";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= 1;
$i++;


$edit["field"][$i]["label"]                         = "Process";
$edit["field"][$i]["input"]                            = "process";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"]                         = "Ukuran SLitting";
$edit["field"][$i]["input"]                            = "ukuranslitting";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;


$edit["field"][$i]["label"]                         = "Paper Core";
$edit["field"][$i]["input"]                            = "papercore";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;


$edit["field"][$i]["label"]                         = "Baris";
$edit["field"][$i]["input"]                            = "baris";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;



$edit["field"][$i]["label"]                         = "Catatan Packing Customer";
$edit["field"][$i]["input"]                            = "catatanpackingcustomer";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;



$edit["field"][$i]["label"]                         = "Arah Baca";
$edit["field"][$i]["input"]                            = "arahbaca";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;



$edit["field"][$i]["label"]                         = "Eye Mark";
$edit["field"][$i]["input"]                            = "eyemark";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;



$edit["field"][$i]["label"]                         = "Arah Gulungan Roll Jadi";
$edit["field"][$i]["input"]                            = "arahgulunganrolljadi";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;



$edit["field"][$i]["label"]                     = "<br><br><br><br><br><br>";
$edit["field"][$i]["input_class"]                 = "hidden";
$edit["field"][$i]["input_save"]                 = "skip";
$i++;



// // ============================== UPLOAD ============================================

// if ($edit["mode"] != "add") {
//     $edit["field"][$i]["box_tab"]             = "upload";
//     $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
//     $edit["field"][$i]["input_element"]     = 'No Uploaded File';

//     $file_nomor = $_GET["no"];
//     $file_tabel = $edit["table"];
//     $file_query = mysqli_query($con, " 
// 	SELECT nomor, `directory`, `nama`, category  
// 	FROM mharchievedfiles 
// 	WHERE 
// 		status_aktif > 0 AND 
// 		category = 'ITEM' AND 
// 		tablename = '$file_tabel' AND 
// 		filenumber = $file_nomor");
//     $file_count = mysqli_num_rows($file_query);

//     $arr_images = array();


//     if ($file_count > 0) {
//         $edit["field"][$i]["input_element"] = '';
//         $count_i = 0;
//         while ($row = mysqli_fetch_assoc($file_query)) {
//             $json[] = $row;
//             array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Thumbnail/ITEM" . "/" . $json[$count_i]["nama"]));
//             $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
//             $directory = str_replace("'", "\'", $json[$index]["nama"]);
//             $directory_details = explode(".", $directory);
//             // echo($directory_details[1]);
//             if ($edit["mode"] == "edit")
//                 if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
//                     if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                         $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//                     else
//                         $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
//                 else
// 					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//                 else
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
//             else	
// 				if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
//                 if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//                 else
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
//             else
// 					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                 $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//             else
//                 $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" .str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';


//             if ($edit["mode"] != "view")
//                 // $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="color:white;position:relative;top:-26px;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>';
//                 $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="margin-left:10px;color:white;position:relative;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;X&nbsp;&nbsp;</a>';
//             $edit["field"][$i]["input_element"] .= '</div>';
//             $index++;
//             $count_i++;
//         }
//     }
//     $edit["field"][$i]["input_save"] = "skip";
//     $i++;
//     $edit["field"][$i]["form_group_class"]       = "hiding";
//     $edit["field"][$i]["label"] = "directory";
//     $edit["field"][$i]["input"] = "directory";
//     $edit["field"][$i]["input_attr"]["readonly"] = "readonly"; 
//     $i++;
// }

// ========================================================= end test==============================


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
if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=ITEM&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}

?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabimages").prependTo("#tab_i1_data");
    });


    function setFile(directory) {
        $("#directory").val(directory);
        $("#itemspec").val(1);
    }

    function load_grid_detail()
	{	
	var no = $('#nomorthspk').val();
	
	var pages = 'pages/grid_load.php?id=spk_printing_baru_detail-load&no='+no+'';
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
        window.open("?m=spk_printing_baru_detail&f=header_grid&&sm=edit&a=edit&no=" + nomor);
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>
<?php include "x_tab_data_images.php"; ?>