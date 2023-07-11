<?php
$edit["debug"]       = 0;
$edit["string_code"]    = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];


if ($edit["mode"] != "add") {
    $edit["query"] = " SELECT
    a.*,
    CONCAT(' ', m.nama, '|', m.nomor) AS 'browse|nomormhadmingrup',
    CONCAT(' ', c.nama, '|', c.nomor) AS 'browse|nomotmhdepartemen'
    FROM mhadmin a
    join mhadmingrup m on m.nomor = a.nomormhadmingrup
    join mhdepartemen c on c.nomor = a.nomotmhdepartemen
    WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

}

//------------------------------------------------GRID DATA 1------------------------------------------------------
$i                                          = 0;
$edit["detail"][$i]["table_name"]           = "shaksesmaster";
$edit["detail"][$i]["field_name"]           = array(
    "keterangan",
    "nomormhcabang"
);
$edit["detail"][$i]["foreign_key"]          = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"]     = " relasi_tipe = 'master_cabang' ";
$edit["detail"][$i]["string_id"]            = "";
$edit["detail"][$i]["grid_id"]              = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_cabang";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"]           = "shaksesmaster";
$edit["detail"][$i]["field_name"]           = array(
    "keterangan",
    "nomormhgudang"
);
$edit["detail"][$i]["foreign_key"]          = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"]     = " relasi_tipe = 'master_gudang' ";
$edit["detail"][$i]["string_id"]            = "";
$edit["detail"][$i]["grid_id"]              = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_gudang";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------


//------------------------------------------------GRID DATA 3------------------------------------------------------
$edit["detail"][$i]["table_name"]           = "shaksesmaster";
$edit["detail"][$i]["field_name"]           = array(
    "keterangan",
    "nomormhaccount"
);
$edit["detail"][$i]["foreign_key"]          = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"]     = " relasi_tipe = 'master_account' ";
$edit["detail"][$i]["string_id"]            = "";
$edit["detail"][$i]["grid_id"]              = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_account";
$i++;
//------------------------------------------------END GRID DATA 3------------------------------------------------------



$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"]                                     = "Nama";
$edit["field"][$i]["label_class"]                               = "req";
$edit["field"][$i]["input"]                                     = "nama";
$edit["field"][$i]["input_class"]                               = "required";
$edit["field"][$i]["input_attr"]["maxlength"]                   = "200";
if ($edit["mode"] != "add") {
    $edit["field"][$i]["input_attr"]["readonly"]                = "readonly";
}
$i++;
$edit["field"][$i]["form_group"]                                = 0;
$edit["field"][$i]["label"]                                     = "Username";
$edit["field"][$i]["label_class"]                               = "req";
$edit["field"][$i]["input"]                                     = "kode";
$edit["field"][$i]["input_class"]                               = "required";
$edit["field"][$i]["input_attr"]["maxlength"]                   = "100";
if ($edit["mode"] != "add") {
    $edit["field"][$i]["input_attr"]["readonly"]                = "readonly";
}
$i++;
$edit["field"][$i]["label"]                                     = "Password Baru";
$edit["field"][$i]["input"]                                     = "sandi_baru";
$edit["field"][$i]["input_attr"]["type"]                        = "password";
$edit["field"][$i]["input_attr"]["minlength"]                   = "4";
$edit["field"][$i]["input_attr"]["maxlength"]                   = "100";
$edit["field"][$i]["input_save"]                                = "skip";
if ($edit["mode"] != "add") {
    $edit["field"][$i]["input_attr"]["readonly"]                = "readonly";
}
//$edit["field"][$i]["pro_mode"]                                = "add";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["label_class"]                           = "req";
    $edit["field"][$i]["input_class"]                           = "required";
}
$i++;
$edit["field"][$i]["form_group"]                                = 0;
$edit["field"][$i]["label"]                                     = "Konfirmasi Password";
$edit["field"][$i]["input"]                                     = "sandi_md5";
$edit["field"][$i]["input_attr"]["type"]                        = "password";
$edit["field"][$i]["input_attr"]["minlength"]                   = "4";
$edit["field"][$i]["input_attr"]["maxlength"]                   = "100";
$edit["field"][$i]["input_validate"]                            = "equalTo:sandi_baru";
$edit["field"][$i]["input_save"]                                = "skip";
if ($edit["mode"] != "add") {
    $edit["field"][$i]["input_attr"]["readonly"]                = "readonly";
}
//$edit["field"][$i]["pro_mode"]                                = "add";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["label_class"]                           = "req";
    $edit["field"][$i]["input_class"]                           = "required";
}
$i++;
$edit["field"][$i]["form_group_class"]                          = "hiding";
$edit["field"][$i]["label"]                                     = "Sandi";
$edit["field"][$i]["input"]                                     = "sandi";
$edit["field"][$i]["input_attr"]["readonly"]                    = "readonly";
$i++;
// $edit["field"][$i]["label"]                                  = "Grup User";
// $edit["field"][$i]["label_class"]                            = "req";
// $edit["field"][$i]["input"]                                  = "nomormhadmingrup";
// $edit["field"][$i]["input_class"]                            = "required";
// $edit["field"][$i]["input_element"]                          = "browse";
// $edit["field"][$i]["browse_setting"]                         = "master_admin_grup";
// $i++;
// $edit["field"][$i]["form_group"]                             = 0;
// $edit["field"][$i]["label"]                                  = "Cabang";
// $edit["field"][$i]["label_class"]                            = "req";
// $edit["field"][$i]["input"]                                  = "nomormhcabang";
// $edit["field"][$i]["input_class"]                            = "required";
// $edit["field"][$i]["input_element"]                          = "browse";
// $edit["field"][$i]["browse_setting"]                         = "master_cabang";
// $i++;
$edit["field"][$i]["form_group_class"]                          = "hiding";
$edit["field"][$i]["label"]                                     = "grid_aktif_nomormhusaha";
$edit["field"][$i]["input"]                                     = "grid_aktif_nomormhusaha";
$edit["field"][$i]["input_attr"]["readonly"]                    = "readonly";
$edit["field"][$i]["input_save"]                                = "skip";
$i++;
$edit["field"][$i]["form_group_class"]                          = "hiding";
$edit["field"][$i]["label"]                                     = "grid_aktif_nomormhcabang";
$edit["field"][$i]["input"]                                     = "grid_aktif_nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"]                    = "readonly";
$edit["field"][$i]["input_save"]                                = "skip";
$i++;

$edit["field"][$i]["label"]                     = "Departemen";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomotmhdepartemen";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_departemen";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Group User";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhadmingrup";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_group_user";
$i++;

$edit["field"][$i]["label"]                                     = "Keterangan";
$edit["field"][$i]["input"]                                     = "keterangan";
$edit["field"][$i]["input_element"]                             = "textarea";
$edit["field"][$i]["input_attr"]["rows"]                        = "3";
$edit["field"][$i]["input_attr"]["cols"]                        = "44";
$i++;
$edit["field"][$i]["form_group"]                                = 0;
$edit["field"][$i]["anti_mode"]                                 = "add";
$edit["field"][$i]["label"]                                     = "Status";
$edit["field"][$i]["input"]                                     = "status_aktif";
$edit["field"][$i]["input_element"]                             = "select1";
$edit["field"][$i]["input_option"]                              = generate_status_option($edit["mode"]);
$i++;

$edit                                                           = generate_info($edit, $r, "insert|update");

$i                                                              = count($edit["field"]);
$edit["field"][$i]["box_tabs"]                                  = array(
                                                                        "cabang|Cabang",
                                                                        "gudang|Gudang",
                                                                        "account|Account"
                                                                    );
//-----------------------------------------FRONTEND GRID 1--------------------------------
$edit["field"][$i]["box_tab"]                                   = "cabang";
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Hak Akses Cabang'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Cabang',
'Keterangan',
'nomormhcabang'
";

$edit["field"][$i]["grid_set"]["column"]                        = array(
    "cabang",
    "keterangan",
    "nomormhcabang"
    );
$edit["field"][$i]["grid_set"]["var"]["default_data"]           = "{ 
    cabang:'',
    keterangan:'',
    nomormhcabang:''
    }";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'cabang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'cabang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_cabang }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomormhcabang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomormhcabang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------




//-----------------------------------------FRONTEND GRID 2--------------------------------
$edit["field"][$i]["box_tab"]                                   = "gudang";
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Hak Akses Gudang'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]            = "
                                                                    'Gudang',
                                                                    'Keterangan',
                                                                    'nomormhgudang'
                                                                    ";
$edit["field"][$i]["grid_set"]["column"]                        = array(
                                                                    "gudang",
                                                                    "keterangan",
                                                                    "nomormhgudang"
                                                                    );
$edit["field"][$i]["grid_set"]["var"]["default_data"]           = "{ 
                                                                    gudang:'',
                                                                    keterangan:'',
                                                                    nomormhgudang:'' 
                                                                    }";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"]          = "[ 'gudang|relasi_nomor' ]";
$j                                                              = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'gudang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'gudang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_gudang }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomormhgudang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomormhgudang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;


$i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------





//-----------------------------------------FRONTEND GRID 3--------------------------------
$edit["field"][$i]["box_tab"]                                   = "account";
$grid[2] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Hak Akses Account'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]            = "
'Account',
'Keterangan',
'nomormhaccount'
                                                                    ";
$edit["field"][$i]["grid_set"]["column"]                        = array(
    "account",
    "keterangan",
    "nomormhaccount"
                                                                    );
$edit["field"][$i]["grid_set"]["var"]["default_data"]           = "{ 
    account:'',
    keterangan:'',
    nomormhaccount:''
                                                                    }";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"]          = "[ 'gudang|relasi_nomor' ]";
$j                                                              = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_account }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomormhaccount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomormhaccount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;


$i++;
// ---------------------------------------END FRONT GRID 3-------------------------------------------------





if ($edit["mode"] != "add") {

    
    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*,
    m.nama as cabang
	FROM " . $edit["detail"][0]["table_name"] . " a
    join mhcabang m on m.nomor = a.nomormhcabang 
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];


    //query grid detail 2
    $edit["field"][$grid[1]]["grid_set"]["query"] = "
    SELECT
    a.*,
    m.nama as gudang
    FROM " . $edit["detail"][1]["table_name"] . " a
    join mhgudang m on m.nomor = a.nomormhgudang 
    where a.status_aktif > 0
    AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    //query grid detail 3
    $edit["field"][$grid[2]]["grid_set"]["query"] = "
    SELECT
    a.*,
    m.nama as account
    FROM " . $edit["detail"][2]["table_name"] . " a
    join mhaccount m on m.nomor = a.nomormhaccount 
    where a.status_aktif > 0
    AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];



    $edit = fill_value($edit, $r);
}


$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");

$edit_navbutton = generate_navbutton($edit_navbutton);
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
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>