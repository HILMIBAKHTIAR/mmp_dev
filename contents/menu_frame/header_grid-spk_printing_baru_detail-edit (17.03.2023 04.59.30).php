<?php

if (isset($_GET["no"]))
	$noIDHeader = $_GET["no"];
else {

	if ($edit["mode"] != "view" && $edit["mode"] != "edit") {
		$idHeader    = $_GET["id"];

		$tipeHeader  = $_GET["tipe"];

		$queryHeader    = "
    SELECT a.*
    FROM thspkprinting a
    WHERE a.nomor = " . $idHeader;


	$resultHeader   = mysqli_query($con, $queryHeader);
	$rowHeader      = mysqli_fetch_array($resultHeader);

		$url = $_GET["url"] . "&f=header_grid&&sm=edit&a=view&no=" . $idHeader;
		$menu = $_GET["menu"];
	}
}



$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];



if ($edit["mode"] != "add") {
	$edit["query"] = "
    SELECT a.*
    FROM " . $edit["table"] . " a
	WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

	$nomorThpi = $r['nomorthspkprinting'];
}



//Start Query Next Prev Button
$tableHeader = $_GET["table"];
$noHeader    = $_GET["no"];
$queryPresentpage = "SELECT nomor FROM thspkprinting WHERE nomor=$noHeader";


$queryNextpage   = " SELECT nomor FROM thspkprinting WHERE nomor > ". $noHeader  ." AND nomorthspkprinting = " . $nomorThpi . " AND status_aktif = 1  ORDER BY nomor ASC ";
$resultNextpage   = mysqli_query($con, $queryNextpage );
$rowNextpage       = mysqli_fetch_array($resultNextpage);

$queryPrevpage   = " SELECT nomor FROM thspkprinting WHERE nomor < ". $noHeader  ." AND nomorthspkprinting = " . $nomorThpi . " AND status_aktif = 1 ORDER BY nomor DESC ";
$resultPrevpage   = mysqli_query($con, $queryPrevpage );
$rowPrevpage       = mysqli_fetch_array($resultPrevpage);
//END Query Next Prev Button


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdspkprintingdetail";
$edit["detail"][$i]["field_name"] = array(
    "bahanprinting",
    "qty",
    "meter"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------





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
// $edit["field"][$i]["form_group_class"] = "hiding";
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


$edit["field"][$i]["label"]                     = "<br><br><br><br><br><br>";
$edit["field"][$i]["input_class"]                 = "hidden";
$edit["field"][$i]["input_save"]                 = "skip";
$i++;



//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Printing'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Bahan Printing',
'Qty',
'Meter'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "bahanprinting",
    "qty",
    "meter"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    bahanprinting:'',
    qty:'',
    meter:''
}";


$j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bahanprinting'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bahanprinting'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$j++;

$i++;

$edit["field"][$i]["label"]              = "Catatan";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "catatan";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-6";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "10";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;




// ================================================================================== UPLOAD ======================================================

$index = 0;
if ($edit["mode"] != "add") {
    $edit["field"][$i]["box_tab"]             = "upload";
    $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
    $edit["field"][$i]["input_element"]     = 'No Uploaded File';

    $file_nomor = $_GET["no"];
    $file_tabel = $edit["table"];
    $file_query = mysqli_query($con, " 
	SELECT nomor, `directory`, `nama`, category  
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		category = 'ITEM' AND 
		tablename = '$file_tabel' AND 
		filenumber = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Thumbnail/ITEM" . "/" . $json[$count_i]["nama"]));
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
    $i++;
}


// ==================================================================================END UPLOAD ======================================================


if ($edit["mode"] != "add") {

	// $edit["query"] = " SELECT
    // a.*
    // FROM thdetailspkprinting a
    // WHERE a.nomor = " . $_GET["no"];

	// if ($edit["debug"] > 0)
	// 	echo $edit["query"];
	// $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    
    //query grid detail 1
    $button_link_action = "CONCAT('<center><a class=\"btn btn-info btn-app-sm\"><i class=\"fa fa-plus-square\" onclick=\"viewDataAction(',a.nomor,')\" title=\"View Data\"></i></a></center>')";

    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*,
    " . $button_link_action . " AS detail
	FROM " . $edit["detail"][0]["table_name"] . " a
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



    $edit = fill_value($edit, $r);
}



$edit_navbutton = generate_navbutton($edit_navbutton, $features);
if ($edit["mode"] != "view" && $edit["mode"] != "edit") {
	$edit_navbutton["field"][$i]["input_element"]             = "a";
	$edit_navbutton["field"][$i]["input_float"]               = "right";
	$edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-default dim";
	$edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-reply' title='Back'></i>";
	$edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
	$edit_navbutton["field"][$i]["input_attr"]["title"]       = "Back";
	$edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
		"link_confirmation('" . get_message(700) . "','?m=spk_printing_baru&f=header_grid&a=view&sm=edit&no=" . $idHeader . "', '', 'Back', 'fa fa-reply|btn-dark')";
	$i++;
}
if ($edit["mode"] != "add") {
	if($rowPrevpage != NULL)
{
	$edit_navbutton["field"][$i]["input_element"]             = "a";
	$edit_navbutton["field"][$i]["input_float"]               = "right";
	$edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-success dim";
	$edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-angle-left' title='Prev'></i>";
	$edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
	$edit_navbutton["field"][$i]["input_attr"]["title"]       = "Prev";
	$edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
	"location.href=('?m=spk_printing_baru_detail&f=header_grid&&sm=edit&no=" . $rowPrevpage["nomor"]."')";
	$i++;
}
	$edit_navbutton["field"][$i]["input_element"]             = "a";
	$edit_navbutton["field"][$i]["input_float"]               = "right";
	$edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-warning dim";
	$edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-plus' title='Add'></i>";
	$edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
	$edit_navbutton["field"][$i]["input_attr"]["title"]       = "Add Item";
	$edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
		"link_confirmation('" . get_message(700) . "','?m=spk_printing_baru_detail&f=header_grid&&sm=edit&id=" . $r["nomorthspkprinting"] . "', '', 'Add Item', 'fa fa-plus|btn-dark')";
	$i++;
	$edit_navbutton["field"][$i]["input_element"]             = "a";
	$edit_navbutton["field"][$i]["input_float"]               = "right";
	$edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-default dim";
	$edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-reply' title='Back'></i>";
	$edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
	$edit_navbutton["field"][$i]["input_attr"]["title"]       = "Back";
	$edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
		"link_confirmation('" . get_message(700) . "','?m=spk_printing_baru&f=header_grid&a=view&sm=edit&no=" . $r["nomorthspkprinting"] . "', '', 'Back', 'fa fa-reply|btn-dark')";
	$i++;
	if($rowNextpage != NULL)
	{
	$edit_navbutton["field"][$i]["input_element"]             = "a";
	$edit_navbutton["field"][$i]["input_float"]               = "right";
	$edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-success dim";
	$edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-angle-right' title='Next'></i>";
	$edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
	$edit_navbutton["field"][$i]["input_attr"]["title"]       = "Next";
	$edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
		"location.href=('?m=spk_printing_baru_detail&f=header_grid&&sm=edit&no=" . $rowNextpage["nomor"]."')";
	$i++;
	}
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
<?php include "x_tab_data_images.php"; ?>