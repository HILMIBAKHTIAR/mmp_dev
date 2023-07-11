<?php
$edit["debug"]       = 1;
$edit["string_code"]    = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];



$edit["sp_approve"] 				= "sp_disetujui_thsuratkerja";
$edit["sp_approve_param"] 			= array("param_nomormhadmin|0","param_status_disetujui|0","param_nomor|0","param_mode|1");
$edit["sp_disapprove"] 				= "sp_disetujui_thsuratkerja";
$edit["sp_disapprove_param"] 		= array("param_nomormhadmin|0","param_status_dibatalkan|0","param_nomor|0","param_mode|1");
$_POST["param_nomormhadmin"] 		= $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"]	= 1;
$_POST["param_status_dibatalkan"]	= 0;
$_POST["param_nomor"] 				= $_GET["no"];
$_POST["param_mode"] 				= "";




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

$edit["field"][$i]["box_tab"]                           = "data";


$edit["field"][$i]["form_group_class"] 				= "hiding";
$edit["field"][$i]["label"] 						= "Kelompok";
$edit["field"][$i]["input"] 						= "nomormhbarangkelompok";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= 7;
$i++;



$edit["field"][$i]["label"]                   = "Kode";
$edit["field"][$i]["input"]                   = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["form_group_class"] 				= "hiding";
if ($edit["mode"] == "add") {
	$edit["field"][$i]["input_value"] = formatting_code($edit["string_code"]);
}
$i++;


// belum auto generate
$edit["field"][$i]["label"] 					= "Nama";
$edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"]						= "nama";
$edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 						= "Jenis";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhbarangjenis";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_jenis_film";
$i++;

$edit["field"][$i]["label"] 						= "Kategori";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhbarangkategori";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_barang_kategori";
$i++;

$edit["field"][$i]["label"] 						= "Silinder";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhcilinder";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_cilinder";
$i++;

$index = 0;
if($edit["mode"] != "add")
{
	$edit["field"][$i]["box_tab"] 			= "upload";
	$edit["field"][$i]["input_col"] 		= 'col-sm-8 col-sm-offset-2';
	$edit["field"][$i]["input_element"] 	= 'No Uploaded File';

	$file_nomor = $_GET["no"];
	$file_tabel = $edit["table"];
	$file_query = mysqli_query($con, " 
	SELECT nomor, `directory`, nama, category  
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		category = 'MASTER_BARANG' AND 
		tablename = '$file_tabel' AND 
		filenumber = $file_nomor");
	$file_count = mysqli_num_rows($file_query);

	if($file_count > 0)
	{
		$edit["field"][$i]["input_element"] = '';
		while($row = mysqli_fetch_assoc($file_query))
		{
			$json[] = $row;
			$edit["field"][$i]["input_element"] .= '<div id="uploaded_file_'.$json[$index]["nomor"].'">';
			$edit["field"][$i]["input_element"] .= '<a class="btn btn-block btn-outline btn-midnight" style= "white-space: break-spaces; margin-bottom:12px" onclick="window.open('."'".$_SESSION["setting"]["dir_upload"]."/".str_replace("'", "\'", $json[$index]["directory"])."'".')">&nbsp;&nbsp;'.$json[$index]["kategori"]. " : " . $json[$index]["nama"] .'&nbsp;&nbsp;</a>';
			if($edit["mode"] != "view")
				$edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="color:white;position:relative;top:-26px;" onclick="file_delete('."'".$json[$index]["nomor"]."'".')">&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>'; 
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
    e.nomor as nomormhbarangkelompok,
	CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhbarangjenis',
    CONCAT(c.nama, '|', c.nomor) AS 'browse|nomormhbarangkategori',
    CONCAT(d.nama, '|', d.nomor) AS 'browse|nomormhcilinder'
	FROM " . $edit["table"] . " a
	left join mhbarangjenis b on b.nomor = a.nomormhbarangjenis 
    LEFT JOIN mhbarangkategori c ON a.nomormhbarangkategori = c.nomor
    left join mhcilinder d on a.nomormhcilinder = d.nomor
    left join mhbarangkelompok e on a.nomormhbarangkelompok = e.nomor
	WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));
     

    $edit = fill_value($edit, $r);
}


if($edit["mode"] != "add"){
	$edit_navbutton["field"][$i]["input_element"]             = "a";
	$edit_navbutton["field"][$i]["input_float"]               = "right";
	$edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
	$edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
	$edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
	$edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
	$edit_navbutton["field"][$i]["input_attr"]["onclick"]     = 
	"link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=CUSTOMER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
	$i++;
}


$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload|add".check_approval($r,"periode|edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);


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
    <?=generate_function_checkunique($grid_str)?>
    <?= generate_function_realgrid($grid_str) ?>
</script>