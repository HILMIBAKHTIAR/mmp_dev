<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdspkextrusidry_detail_bahan";
$edit["detail"][$i]["field_name"] = array(
    "kode",
    "bahanprinting",
    "qty",
    "meter"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_bahan";
$i++;


$edit["detail"][$i]["table_name"] = "tdspkextrusidry_detail_extru";
$edit["detail"][$i]["field_name"] = array(
    "material",
    "adhesive",
    "resin",
    "materbatch",
    "chilldrm",
    "powder",
    "grmin",
    "grmax",
    "bonding",
    "aging",
    "seal"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_extru";
$i++;




// ======================================================================================================================

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




//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"]; 
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Extru'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Kode',
'Bahan Printing',
'Qty',
'Meter'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "kode",
    "bahanprinting",
    "qty",
    "meter"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    kode:'',
    bahanprinting:'',
    qty:'',
    meter:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

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






//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"]; 
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Bahan'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Material',
'Adhesive',
'Resin',
'Mater Batch',
'Chilldrm',
'Powder',
'GR Min',
'GR Max',
'Bonding',
'Aging',
'Seal'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "material",
    "adhesive",
    "resin",
    "materbatch",
    "chilldrm",
    "powder",
    "grmin",
    "grmax",
    "bonding",
    "aging",
    "seal"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    material:'',
    adhesive:'',
    resin:'',
    materbatch:'',
    chilldrm:'',
    powder:'',
    grmin:'',
    grmax:'',
    bonding:'',
    aging:'',
    seal:''
}";


$j = 0;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'material'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'material'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'adhesive'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'adhesive'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'resin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'resin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'materbatch'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'materbatch'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'chilldrm'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'chilldrm'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'powder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'powder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'grmin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'grmin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'grmax'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'grmax'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bonding'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bonding'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aging'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aging'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'seal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'seal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$j++;

$i++;





// // ============================== UPLOAD ============================================


$index = 0;
if ($edit["mode"] != "add") {
    $edit["field"][$i]["box_tab"]             = "upload";
    $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
    $edit["field"][$i]["input_element"]     = 'No Uploaded File';

    $file_nomor = $_GET["no"];

    $file_query2 = mysqli_query($con, " 
	select 
	t.nomor as nomor_thspkprinting 
	from thspkprinting t 
	join tdspkprinting t2 on t2.nomorthspkprinting = t.nomor 
	where t2.nomor = $file_nomor");

    if ($file_query2 && mysqli_num_rows($file_query2) > 0) {
        $row = mysqli_fetch_assoc($file_query2);
        $nomor_thspkprinting = $row['nomor_thspkprinting'];
    }

    $file_tabel = 'thspkprinting';
    $file_query = mysqli_query($con, " 
	SELECT * 
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		kategori = 'SPK_PRINTING' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $nomor_thspkprinting");
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "SPK_PRINTING" . "/" . $json[$count_i]["nama"]));
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

	$edit["query"] = " 
    SELECT a.*
    FROM " . $edit["table"] . " a
	WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    
    //query grid detail 1
    $button_link_action = "CONCAT('<center><a class=\"btn btn-info btn-app-sm\"><i class=\"fa fa-plus-square\" onclick=\"viewDataAction(',a.nomor,')\" title=\"View Data\"></i></a></center>')";

    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*,
    " . $button_link_action . " AS detail
	FROM " . $edit["detail"][0]["table_name"] . " a
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



        
    //query grid detail 2
    $button_link_action = "CONCAT('<center><a class=\"btn btn-info btn-app-sm\"><i class=\"fa fa-plus-square\" onclick=\"viewDataAction(',a.nomor,')\" title=\"View Data\"></i></a></center>')";

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT
    a.*,
    " . $button_link_action . " AS detail
	FROM " . $edit["detail"][1]["table_name"] . " a
    where a.status_aktif > 0
	AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];



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
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=SPK_PRINTING&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
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
<?php include "x_tab_data_images_detail_printing.php"; ?>