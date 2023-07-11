<?php
$edit["debug"]                 = 1;
// $edit["uppercase"]             = 1;
$edit["unique"]             = array("kode");
$edit["string_code"]         = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
// $edit["next_save_delay"]     = 3;
// $edit["unique"]             = array("nama");
// $edit["manual_save"]         = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";

// $edit["sp_add"] 							= "sp_disimpan_mhcabang";
// $edit["sp_add_param"] 						= array("param_mode_add|1", "param_nomormhadmin|0");
// $edit["sp_edit"] 							= "sp_disimpan_mhcabang";
// $edit["sp_edit_param"] 						= array("param_mode_edit|1", "param_nomormhadmin|0");
// $_POST["param_nomormhadmin"]				= $_SESSION["login"]["nomor"];
// $_POST["param_mode_add"] 					= "ADD";
// $_POST["param_mode_edit"] 					= "EDIT";

if ($edit["mode"] != "add") {
    $edit["query"] = "
	SELECT a.*,
    a.kode,
    a.nama,
    a.alamat,
    a.ppn,
    a.top,
    a.note,
    CONCAT(' ', e.nama, '|', e.nomor) AS 'browse|nomormhrelasikategori',
    CONCAT(' ', d.nama, '|', d.nomor) AS 'browse|nomormhbank'
	FROM " . $edit["table"] . " a
    JOIN mhrelasikategori e on a.nomormhrelasikategori = e.nomor
    JOIN mhbank d on a.nomormhbank = d.nomor
	WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));
}

//PEMBUATAN GRID DATA 
$i = 0;
$edit["detail"][$i]["table_name"] = "mdrelasipic";
$edit["detail"][$i]["field_name"] = array(
    "pic",
    "kontak",
    "tipe",
    "bagian",
    "nomormhrelasikelompok"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "jenis = 0";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_contact";
$i++;
//END GRID DATA
//PEMBUATAN GRID DATA 
$edit["detail"][$i]["table_name"] = "mdsuppliersupply";
$edit["detail"][$i]["field_name"] = array(
    "tipe",
    "nomormdbarangtipe",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_supply";
$i++;
//END GRID DATA


$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info", "upload|Upload");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    }
}

$edit["field"][$i]["box_tab"]                           = "data";

$edit["field"][$i]["label"]                     = "Kode";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "kode";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_attr"]["readonly"]     = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
// $edit["field"][$i]["input_attr"]["maxlength"]     = "6";
$i++;

$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"]            = "nomormhrelasikelompok";
$edit["field"][$i]["input"]            = "nomormhrelasikelompok";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = 2;
}
$i++;

$edit["field"][$i]["label"]                         = "Nama";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "nama";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"]                         = "Alamat";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "alamat";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

// $edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Kategori Supplier";
$edit["field"][$i]["label_class"]                 = "";
$edit["field"][$i]["input"]                     = "nomormhrelasikategori";
$edit["field"][$i]["input_class"]                 = "";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_kategorisupplier";
// $edit["field"][$i]["browse_set"]["param_output"]     = array("kode|kode");
// $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
$i++;



$edit["field"][$i]["label"] = "PKP";
$edit["field"][$i]["input"] = "pkp";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("yes|YES", "no|NO");
if ($edit["mode"] != "add") {
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
    $edit["field"][$i]["input_save"] = "skip";
}
$i++;


$edit["field"][$i]["form_group_class"] = "no_section";
$edit["field"][$i]["label"]                         = "KTP";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                            = "ktp";
$edit["field"][$i]["input_class"]                     = "";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;
$edit["field"][$i]["form_group_class"] = "yes_section";
$edit["field"][$i]["label"] = "NPWP";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"] = "nomor_npwp";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;
$edit["field"][$i]["form_group_class"] = "yes_section";
$edit["field"][$i]["label"] = "SPPKP";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"] = "sppkp";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;
$edit["field"][$i]["form_group_class"] = "yes_section";
$edit["field"][$i]["label"] = "NIB";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"] = "nib";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;

$edit["field"][$i]["label"]                         = "ppn";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "ppn";
$edit["field"][$i]["input_element"]          = "select";
$edit["field"][$i]["input_option"]           =
    [
        "1|YA",
        "0|TIDAK"
    ];
$i++;

$edit["field"][$i]["label"]                   = "TOP (Term Of Payment)";
$edit["field"][$i]["input"]                   = "top";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("0|0", "7|7", "14|14", "30|30", "45|45", "60|60", "75|75", "90|90", "CASH|CASH");
$edit["field"][$i]["label_class"]      = "req";
$i++;

$edit["field"][$i]["label"]                         = "Dp";
$edit["field"][$i]["input"]                            = "dp";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;


$edit["field"][$i]["label"]                         = "Nomor Account";
$edit["field"][$i]["input"]                            = "nomorAccount";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"]                         = "Nama Account";
$edit["field"][$i]["input"]                            = "namaAccount";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

// $edit["field"][$i]["label"]                   = "Bank";
// $edit["field"][$i]["input"]                   = "bank";
// $edit["field"][$i]["input_element"] 				= "select1";
// $edit["field"][$i]["input_option"] 					= array("BCA|BCA","BRI|BRI", "MANDIRI|MANDIRI", "PERMATA|PERMATA", "DANAMON|DANAMON", "BSI|BSI","UOB INDONESIA|UOB INDONESIA", "MUFG|MUFG","MEGA|MEGA", "MAYBBAN");
// $i++;

$edit["field"][$i]["label"]                     = "Bank";
$edit["field"][$i]["label_class"]                 = "";
$edit["field"][$i]["input"]                     = "nomormhbank";
$edit["field"][$i]["input_class"]                 = "";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_bank";
// $edit["field"][$i]["browse_set"]["param_output"]     = array("kode|kode");
// $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
$i++;

$edit["field"][$i]["label"]                   = "No rekening";
$edit["field"][$i]["input"]                   = "no_rek";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"]                   = "Atas Nama Rekening";
$edit["field"][$i]["input"]                   = "atas_nama_rek";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"]                   = "Email";
$edit["field"][$i]["input"]                   = "email";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"]                         = "PIC";
$edit["field"][$i]["label_class"]                     = "";
$edit["field"][$i]["input"]                            = "pic";
$edit["field"][$i]["input_class"]                     = "";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;
$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                         = "Telepon";
$edit["field"][$i]["label_class"]                     = "";
$edit["field"][$i]["input"]                            = "no_telp";
$edit["field"][$i]["input_class"]                     = "";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;


$edit["field"][$i]["anti_mode"]     = "add";
$edit["field"][$i]["label"]         = "Status";
$edit["field"][$i]["input"]         = "status_aktif";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"]  = generate_status_option($edit["mode"]);
$i++;
$edit["field"][$i]["label"]                          = "Note";
$edit["field"][$i]["label_col"]                     = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"]             = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]                          = "note";
$edit["field"][$i]["input_element"]                  = "textarea";
$edit["field"][$i]["input_attr"]["rows"]             = "5";
$edit["field"][$i]["input_col"]                     = "col-sm-12";
$i++;

$index = 0;
if ($edit["mode"] != "add") {
    $edit["field"][$i]["box_tab"]             = "upload";
    $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
    $edit["field"][$i]["input_element"]     = 'No Uploaded File';

    $file_nomor = $_GET["no"];
    $file_tabel = $edit["table"];
    $file_query = mysqli_query($con, " 
  	SELECT nomor, `directory`, nama, kategori  
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		kategori = 'SUPPLIER' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $index = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $edit["field"][$i]["input_element"] .= '<a class="btn btn-block btn-outline btn-midnight" style= "white-space: break-spaces; margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["directory"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            if ($edit["mode"] != "view")
                $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="color:white;position:relative;top:-26px;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>';
            $edit["field"][$i]["input_element"] .= '</div>';
            $index++;
        }
    }
    $edit["field"][$i]["input_save"] = "skip";
    $i++;
}

$edit = generate_info($edit, $r, "insert|update");

// //FRONTEND UNTUK GRID DATA detail

$i = count($edit["field"]);
$edit["fields"][$i]["box_tabs_close"] = 1;

$edit["field"][$i]["box_tabs"]                                = array(
    "pic|PIC", "supply|SUPPLY"
);
$edit["field"][$i]["box_tab"]                                 = "pic";
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar Contact Supplier'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Nama',
'Kontak',
'Type',
'Bagian',
'nomormhrelasikelompok'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "pic",
    "kontak",
    "tipe",
    "bagian",
    "nomormhrelasikelompok"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    pic:'',
    kontak:'',
    tipe:'',
    bagian:'', 
    nomormhrelasikelompok:'2' 
}";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pic'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pic'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kontak'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kontak'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bagian'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bagian'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhrelasikelompok'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhrelasikelompok'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;


$edit["field"][$i]["box_tab"]                                 = "supply";
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'List Supply'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Tipe',
'nomormdbarangtipe',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "tipe",
    "nomormdbarangtipe",
    "nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    tipe:'',
    nomormdbarangtipe:'' ,
    nomor:'' 
}";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['tipe']";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_tipefilm }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormdbarangtipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormdbarangtipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;


if ($edit["mode"] != "add") {


    $edit["field"][$grid[0]]["grid_set"]["query"] = "
    SELECT a.*
    FROM " . $edit["detail"][0]["table_name"] . " a
    WHERE a.status_aktif > 0
    AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
    SELECT a.*
    FROM " . $edit["detail"][1]["table_name"] . " a
    WHERE a.status_aktif > 0
    AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    $edit = fill_value($edit, $r);
}

$features = "save|back|reload|add" . check_approval($r, "edit");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);

if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=SUPPLIER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}


$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
?>

<script type="text/javascript">
    $(document).ready(function() {
        <?php if ($edit["mode"] != "view") { ?>
            $(document).on("change", "#pkp", function() {
                pkp_value_changed(this);
            });
            $('#pkp').change();
        <?php } ?>
    });

    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    function pkp_value_changed(obj) {
        <?php if ($edit["mode"] == "add") { ?>
            if ($(obj).val() == 'yes') {
                $('.yes_section').show();
                $('.no_section').hide();
            } else if ($(obj).val() == 'no') {
                $('.no_section').show();
                $('.yes_section').hide();
            } else {
                $('.no_section').hide();
                $('.yes_section').hide();
            }
        <?php } ?>
    }


    function checkSave() {
        var check_failed = '';
        var pkp = $('#pkp').val();
        var ktp = $('#ktp').val();
        var npwp = $('#nomor_npwp').val();
        var sppkp = $('#sppkp').val();
        var nib = $('#nib').val();

        if (pkp == 'no' && ktp == '')
            check_failed += '- Form KTP wajib diisi\n\n';

        if (pkp == 'yes' && npwp == '')
            check_failed += '- Form NPWP wajib diisi\n\n';

        if (pkp == 'yes' && sppkp == '')
            check_failed += '- Form SPPKP wajib diisi\n\n';

        if (pkp == 'yes' && nib == '')
            check_failed += '- Form NIB wajib diisi\n\n';

        if (check_failed != '')
            alert(check_failed);
        else
            return true;
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>