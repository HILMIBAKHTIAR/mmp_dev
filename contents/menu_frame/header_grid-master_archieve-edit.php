<?php
$tableHeader = $_GET["table"];
$idHeader    = $_GET["id"];
$tipeHeader  = $_GET["tipe"];

$queryHeader    = "
SELECT a.* 
FROM ".$tableHeader." a
WHERE a.nomor = ".$idHeader;
$resultHeader   = mysqli_query($con, $queryHeader);
$rowHeader      = mysqli_fetch_array($resultHeader);

$url = $_GET["url"]."&f=header_grid&&sm=edit&a=view&no=".$idHeader;
if(isset($_GET["no"])){
    $url = $_GET["url"]."&f=header_grid&&sm=edit&a=view&no=".$_GET["no"];
}
$menu= $_GET["menu"];

$edit["unique"]             = array();
$edit["string_code"]        = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];
$edit["manual_save"]        = "contents/menu_frame/".$_SESSION["g.frame"]."-".$_SESSION["g.menu"]."-save.php";
$edit["debug"]              = 1;

$i = 0;
if(!empty($_GET["a"]) && $_GET["a"] == "view")
    $edit["field"][$i]["box_tabs"] = array("data|Data","info|Info");
$edit["field"][$i]["box_tab"]                   = "data";
$edit["field"][$i]["form_group_class"]          = "hiding";
$edit["field"][$i]["label"]                     = "Archieved ID";
$edit["field"][$i]["input"]                     = "kode";
$edit["field"][$i]["input_attr"]["maxlength"]   = "100";
$edit["field"][$i]["input_attr"]["readonly"]    = "readonly";
if($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]           = formatting_code($con, $edit["string_code"]);
$i++;
$edit["field"][$i]["label"]                     = "Category";
$edit["field"][$i]["input"]                     = "kategori";
$edit["field"][$i]["input_attr"]["maxlength"]   = "200";
$edit["field"][$i]["input_attr"]["readonly"]    = "readonly";
if(mysqli_num_rows($resultHeader) > 0)
    $edit["field"][$i]["input_attr"]["value"]   = $tipeHeader;
$i++;
$edit["field"][$i]["form_group"]          		= 0;
$edit["field"][$i]["label"]                     = "File ID";
$edit["field"][$i]["input"]                     = "file_kode";
$edit["field"][$i]["input_attr"]["maxlength"]   = "200";
$edit["field"][$i]["input_attr"]["readonly"]    = "readonly";
if(mysqli_num_rows($resultHeader) > 0)
    $edit["field"][$i]["input_attr"]["value"]   = $rowHeader["kode"];
$i++;
$edit["field"][$i]["form_group_class"]          = "hiding";
$edit["field"][$i]["label"]                     = "File Name";
$edit["field"][$i]["input"]                     = "nama";
$edit["field"][$i]["input_attr"]["maxlength"]   = "200";
$edit["field"][$i]["input_attr"]["readonly"]    = "readonly";
$i++;
$edit["field"][$i]["form_group_class"]          = "hiding";
$edit["field"][$i]["label"]                     = "File Nomor";
$edit["field"][$i]["input"]                     = "file_nomor";
$edit["field"][$i]["input_attr"]["maxlength"]   = "200";
$edit["field"][$i]["input_attr"]["readonly"]    = "readonly";
if(mysqli_num_rows($resultHeader) > 0)
    $edit["field"][$i]["input_attr"]["value"]   = $rowHeader["nomor"];
$i++;
$edit["field"][$i]["form_group_class"]          = "hiding";
$edit["field"][$i]["label"]                     = "Table Name";
$edit["field"][$i]["input"]                     = "file_tabel";
$edit["field"][$i]["input_attr"]["maxlength"]   = "200";
$edit["field"][$i]["input_attr"]["readonly"]    = "readonly";
if(mysqli_num_rows($resultHeader) > 0)
    $edit["field"][$i]["input_attr"]["value"]   = $tableHeader;
$i++;
$edit["field"][$i]["form_group_class"]          = "hiding";
$edit["field"][$i]["label"]                     = "Directory";
$edit["field"][$i]["input"]                     = "directory";
$edit["field"][$i]["input_attr"]["maxlength"]   = "200";
$edit["field"][$i]["input_attr"]["readonly"]    = "readonly";
$edit["field"][$i]["input_attr"]["value"]       = "quotation";
$i++;
$edit["field"][$i]["form_group_class"]          = "hiding";
$edit["field"][$i]["label"]                     = "file_count";
$edit["field"][$i]["input"]                     = "file_count";
$edit["field"][$i]["input_save"]                = "skip";
$edit["field"][$i]["input_attr"]["readonly"]    = "readonly";
$edit["field"][$i]["input_attr"]["value"]       = "1";
$i++;
$edit["field"][$i]["form_group_class"]          = "hiding";
$edit["field"][$i]["label"]                     = "url";
$edit["field"][$i]["input"]                     = "url";
$edit["field"][$i]["input_save"]                = "skip";
$edit["field"][$i]["input_attr"]["readonly"]    = "readonly";
$edit["field"][$i]["input_attr"]["value"]       = $url;
$i++;
$edit["field"][$i]["form_group_class"]          = "hiding";
$edit["field"][$i]["label"]                     = "menu";
$edit["field"][$i]["input"]                     = "menu";
$edit["field"][$i]["input_save"]                = "skip";
$edit["field"][$i]["input_attr"]["readonly"]    = "readonly";
$edit["field"][$i]["input_attr"]["value"]       = $menu;
$i++;
$edit["field"][$i]["label"]                     = " ";
$edit["field"][$i]["input_col"] 				= "col-sm-12";
$edit["field"][$i]["input_element"] = '<a class="btn btn-block btn-outline btn-midnight" onclick="addUploadFile()">&nbsp;&nbsp;Add Upload File&nbsp;&nbsp;</a>';

$edit["field"][$i]["input_save"]                = "skip";
$i++;
$edit["field"][$i]["anti_mode"]                 = "view";
$edit["field"][$i]["label"]                     = " ";
// $edit["field"][$i]["input"]                     = "file_upload_0[]";
// $edit["field"][$i]["input_attr"]["type"]        = "file";
// $edit["field"][$i]["input_attr"]["multiple"]    = "multiple";
$edit["field"][$i]["input_col"] 				= "col-sm-12";
$edit["field"][$i]["input_element"] = '<input type="file" class="form-control" id="file_upload_0[]" name="file_upload_0" multiple>';
$edit["field"][$i]["input_save"]                = "skip";
$i++;
$edit["field"][$i]["label"]              		= "Remark";
$edit["field"][$i]["label_col"] 				= "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] 		= "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]              		= "keterangan";
$edit["field"][$i]["input_element"]      		= "textarea";
$edit["field"][$i]["input_attr"]["rows"] 		= "5";
$edit["field"][$i]["input_col"] 				= "col-sm-12";
$i++;
$edit["field"][$i]["anti_mode"]                 = "add";
$edit["field"][$i]["label"]                     = "Status";
$edit["field"][$i]["input"]                     = "status_aktif";
$edit["field"][$i]["input_element"]             = "select";
$edit["field"][$i]["input_option"]              = generate_status_option($edit["mode"]);
$i++;

if($edit["mode"] != "add")
{
    $query  = "SELECT a.* FROM " . $edit["table"] . " a WHERE a.nomor = ".$_GET["no"];
    $r      = mysqli_fetch_array(mysqli_query($con, $query));    
    $edit   = fill_value($edit,$r);
}

$edit = generate_info($edit,$r,"insert|update");
$features = "save|back|edit";
$edit_navbutton = generate_navbutton($edit_navbutton,$features);
?>

<script type="text/javascript">
var file_count = 1;
function addUploadFile()
{
    var file_count= $("#file_count").val();
    var file_input  = '<input type="file" class="form-control" id="file_upload_'+ file_count +'[]" name="file_upload_'+ file_count +'[]" multiple>';
    $( "div[name='div_I_12']" ).append( file_input );
    file_count++;
    $("#file_count").val( file_count );
}
</script>
