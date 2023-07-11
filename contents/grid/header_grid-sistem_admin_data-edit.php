<?php
$edit["debug"]       = 1;
$edit["manual_save"] = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";
$edit["unique"]      = array(
                            "kode|nama"
                        );
$edit["string_code"] = "";

if ($edit["mode"] != "add") {
    $r = mysqli_fetch_array(mysqli_query($con, "
    SELECT a.*
    FROM " . $edit["table"] . " a
    WHERE a.nomor = " . $_GET["no"]));
}

$i                                          = 0;
$edit["detail"][$i]["table_name"]           = "shaksesmaster";
$edit["detail"][$i]["field_name"]           = array(
    "nomor",
    "nomormhusaha",
    "relasi_nomor",
    "relasi_tipe",
    "relasi_table",
    "keterangan"
);
$edit["detail"][$i]["foreign_key"]          = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"]     = " relasi_tipe = 'master_cabang' ";
$edit["detail"][$i]["string_id"]            = "";
$edit["detail"][$i]["grid_id"]              = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_cabang";
$i++;
$edit["detail"][$i]["table_name"]           = "shaksesmaster";
$edit["detail"][$i]["field_name"]           = array(
    "nomor",
    "nomormhcabang",
    "nomormhusaha",
    "relasi_nomor",
    "relasi_tipe",
    "relasi_table",
    "keterangan"
);
$edit["detail"][$i]["foreign_key"]          = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"]     = " relasi_tipe = 'master_gudang' ";
$edit["detail"][$i]["string_id"]            = "";
$edit["detail"][$i]["grid_id"]              = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_gudang";
$i++;
$edit["detail"][$i]["table_name"]           = "shaksesmaster";
$edit["detail"][$i]["field_name"]           = array(
    "nomor",
    "nomormhusaha",
    "relasi_nomor",
    "relasi_tipe",
    "relasi_table",
    "keterangan"
);
$edit["detail"][$i]["foreign_key"]          = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"]     = " relasi_tipe = 'master_group' ";
$edit["detail"][$i]["string_id"]            = "";
$edit["detail"][$i]["grid_id"]              = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_group";
$i++;
$edit["detail"][$i]["table_name"]           = "shaksesmaster";
$edit["detail"][$i]["field_name"]           = array(
    "nomor",
    "nomormhusaha",
    "relasi_nomor",
    "relasi_tipe",
    "relasi_table",
    "keterangan"
);
$edit["detail"][$i]["foreign_key"]          = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"]     = " relasi_tipe = 'master_group' ";
$edit["detail"][$i]["string_id"]            = "";
$edit["detail"][$i]["grid_id"]              = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_role";
$i++;
$edit["detail"][$i]["table_name"]           = "shaksesmaster";
$edit["detail"][$i]["field_name"]           = array(
    "nomor",
    "relasi_nomor",
    "relasi_tipe",
    "relasi_table",
    "keterangan"
);
$edit["detail"][$i]["foreign_key"]          = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"]     = " relasi_tipe = 'master_account' ";
$edit["detail"][$i]["string_id"]            = "";
$edit["detail"][$i]["grid_id"]              = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_account";
$i++;
// $edit["detail"][$i]["table_name"]           = "shaksesmaster";
// $edit["detail"][$i]["field_name"]           = array(
//     "nomor",
//     "relasi_nomor",
//     "relasi_tipe",
//     "relasi_table",
//     "keterangan"
// );
// $edit["detail"][$i]["foreign_key"]          = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"]     = " relasi_tipe = 'master_divisi' ";
// $edit["detail"][$i]["string_id"]            = "";
// $edit["detail"][$i]["grid_id"]              = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_divisi";
// $i++;

$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view")
    $edit["field"][$i]["box_tabs"]                              = array(
                                                                        "data|Data",
                                                                        "info|Info"
                                                                    );
$edit["field"][$i]["box_tab"]                                   = "data";
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
                                                                        "grup_user|Grup User",
                                                                        "role|Role",
                                                                        "account|Account"
                                                                        // "divisi|Divisi"
                                                                    );
$edit["field"][$i]["box_tab"]                                   = "cabang";
$grid[0]                                                        = $i;
$edit["field"][$i]["input_element"]                             = "grid";
$edit["field"][$i]["grid_set"]                                  = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                            = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]             = "'Hak Akses Cabang'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]            = "
                                                                    'Perusahaan',
                                                                    'Cabang',
                                                                    'Keterangan',
                                                                    'nomor',
                                                                    'nomormhusaha',
                                                                    'relasi_nomor',
                                                                    'relasi_tipe',
                                                                    'relasi_table'
                                                                    ";
$edit["field"][$i]["grid_set"]["column"]                        = array(
                                                                    "usaha",
                                                                    "cabang",
                                                                    "keterangan",
                                                                    "nomor",
                                                                    "nomormhusaha",
                                                                    "relasi_nomor",
                                                                    "relasi_tipe",
                                                                    "relasi_table"
                                                                    );
$edit["field"][$i]["grid_set"]["var"]["default_data"]           = "{ 
                                                                    usaha:'',
                                                                    cabang:'',
                                                                    keterangan:'',
                                                                    nomor:'',
                                                                    nomormhusaha:'',
                                                                    relasi_nomor:'',
                                                                    relasi_tipe:'master_cabang',
                                                                    relasi_table:'mhcabang' 
                                                                    }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"]          = "[ 'cabang|relasi_nomor' ]";
$j                                                              = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'usaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'usaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_cabang_pt }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'cabang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'cabang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_cabang_1 }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomormhusaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomormhusaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_table'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_table'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$i++;
$grid[1]                                                        = $i;
$edit["field"][$i]["box_tab"]                                   = "gudang";
$edit["field"][$i]["input_element"]                             = "grid";
$edit["field"][$i]["grid_set"]                                  = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                            = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]             = "'Hak Akses Gudang'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]            = "
                                                                    'Perusahaan',
                                                                    'Cabang',
                                                                    'Gudang',
                                                                    'Keterangan',
                                                                    'nomor',
                                                                    'nomormhusaha',
                                                                    'nomormhcabang',
                                                                    'relasi_nomor',
                                                                    'relasi_tipe',
                                                                    'relasi_table'
                                                                    ";
$edit["field"][$i]["grid_set"]["column"]                        = array(
                                                                    "usaha",
                                                                    "cabang",
                                                                    "gudang",
                                                                    "keterangan",
                                                                    "nomor",
                                                                    "nomormhusaha",
                                                                    "nomormhcabang",
                                                                    "relasi_nomor",
                                                                    "relasi_tipe",
                                                                    "relasi_table"
                                                                    );
$edit["field"][$i]["grid_set"]["var"]["default_data"]           = "{ 
                                                                    usaha:'',
                                                                    cabang:'',
                                                                    gudang:'',
                                                                    keterangan:'',
                                                                    nomor:'',
                                                                    nomormhusaha:'',
                                                                    nomormhcabang:'',
                                                                    relasi_nomor:'',
                                                                    relasi_tipe:'master_gudang',
                                                                    relasi_table:'mhgudang' 
                                                                    }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"]          = "[ 'gudang|relasi_nomor' ]";
$j                                                              = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'usaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'usaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_cabang_pt_2 }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'cabang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'cabang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_cabang_2 }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'gudang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'gudang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_gudang }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomormhusaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomormhusaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomormhcabang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomormhcabang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_table'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_table'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$i++;
$grid[2]                                                        = $i;
$edit["field"][$i]["box_tab"]                                   = "grup_user";
$edit["field"][$i]["input_element"]                             = "grid";
$edit["field"][$i]["grid_set"]                                  = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                            = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]             = "'Hak Akses Grup User'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]            = "
                                                                    'Perusahaan',
                                                                    'Grup',
                                                                    'Keterangan',
                                                                    'nomor',
                                                                    'nomormhusaha',
                                                                    'relasi_nomor',
                                                                    'relasi_tipe',
                                                                    'relasi_table'
                                                                    ";
$edit["field"][$i]["grid_set"]["column"]                        = array(
                                                                    "usaha",
                                                                    "admin_group",
                                                                    "keterangan",
                                                                    "nomor",
                                                                    "nomormhusaha",
                                                                    "relasi_nomor",
                                                                    "relasi_tipe",
                                                                    "relasi_table"
                                                                    );
$edit["field"][$i]["grid_set"]["var"]["default_data"]           = "{ 
                                                                    usaha:'',
                                                                    admin_group:'',
                                                                    keterangan:'',
                                                                    nomor:'',
                                                                    nomormhusaha:'',
                                                                    relasi_nomor:'',
                                                                    relasi_tipe:'master_group',
                                                                    relasi_table:'mhadmingrup' 
                                                                    }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"]          = "[ 'admin_group|relasi_nomor' ]";
$j                                                              = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'usaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'usaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_cabang_pt_3 }";
$j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'cabang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'cabang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_cabang_3 }";
// $j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'admin_group'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'admin_group'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_group }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomormhusaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomormhusaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomormhcabang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomormhcabang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
// $j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_table'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_table'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$i++;
$grid[3]                                                        = $i;
$edit["field"][$i]["box_tab"]                                   = "role";
$edit["field"][$i]["input_element"]                             = "grid";
$edit["field"][$i]["grid_set"]                                  = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                            = $edit["detail"][3]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]             = "'Role User'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]            = "
                                                                    'Perusahaan',
                                                                    'Role',
                                                                    'Keterangan',
                                                                    'nomor',
                                                                    'nomormhusaha',
                                                                    'relasi_nomor',
                                                                    'relasi_tipe',
                                                                    'relasi_table'
                                                                    ";
$edit["field"][$i]["grid_set"]["column"]                        = array(
                                                                    "usaha",
                                                                    "peran",
                                                                    "keterangan",
                                                                    "nomor",
                                                                    "nomormhusaha",
                                                                    "relasi_nomor",
                                                                    "relasi_tipe",
                                                                    "relasi_table"
                                                                    );
$edit["field"][$i]["grid_set"]["var"]["default_data"]           = "{ 
                                                                    usaha:'',
                                                                    peran:'',
                                                                    keterangan:'',
                                                                    nomor:'',
                                                                    nomormhusaha:'',
                                                                    relasi_nomor:'',
                                                                    relasi_tipe:'master_peran',
                                                                    relasi_table:'mhperan' 
                                                                    }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"]          = "[ 'peran|relasi_nomor' ]";
$j                                                              = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'usaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'usaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_cabang_pt_4 }";
$j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'cabang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'cabang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_cabang_3 }";
// $j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'peran'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'peran'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_role }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomormhusaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomormhusaha'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomormhcabang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomormhcabang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
// $j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_table'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_table'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$i++;
$grid[4]                                                        = $i;
$edit["field"][$i]["box_tab"]                                   = "account";
$edit["field"][$i]["input_element"]                             = "grid";
$edit["field"][$i]["grid_set"]                                  = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                            = $edit["detail"][4]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]             = "'Hak Akses Account'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]            = "
                                                                    'Account',
                                                                    'Keterangan',
                                                                    'nomor',
                                                                    'relasi_nomor',
                                                                    'relasi_tipe',
                                                                    'relasi_table'
                                                                    ";
$edit["field"][$i]["grid_set"]["column"]                        = array(
                                                                    "account",
                                                                    "keterangan",
                                                                    "nomor",
                                                                    "relasi_nomor",
                                                                    "relasi_tipe",
                                                                    "relasi_table"
                                                                );
$edit["field"][$i]["grid_set"]["var"]["default_data"]           = "{ 
                                                                    account:'',
                                                                    keterangan:'',
                                                                    nomor:'',
                                                                    relasi_nomor:'',
                                                                    relasi_tipe:'master_account',
                                                                    relasi_table:'mhaccount' 
                                                                }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"]          = "[ 'account|relasi_nomor' ]";
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
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_table'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_table'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
$j++;
$i++;
// $grid[5]                                                        = $i;
// $edit["field"][$i]["box_tab"]                                   = "divisi";
// $edit["field"][$i]["input_element"]                             = "grid";
// $edit["field"][$i]["grid_set"]                                  = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"]                            = $edit["detail"][5]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"]             = "'Hak Akses Divisi'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"]            = "
//                                                                     'Divisi',
//                                                                     'Keterangan',
//                                                                     'nomor',
//                                                                     'relasi_nomor',
//                                                                     'relasi_tipe',
//                                                                     'relasi_table'
//                                                                 ";
// $edit["field"][$i]["grid_set"]["column"]                        = array(
//                                                                     "divisi",
//                                                                     "keterangan",
//                                                                     "nomor",
//                                                                     "relasi_nomor",
//                                                                     "relasi_tipe",
//                                                                     "relasi_table"
//                                                                 );
// $edit["field"][$i]["grid_set"]["var"]["default_data"]           = "{ 
//                                                                     divisi:'',
//                                                                     keterangan:'',
//                                                                     nomor:'',
//                                                                     relasi_nomor:'',
//                                                                     relasi_tipe:'master_divisi',
//                                                                     relasi_table:'mhdivisi' 
//                                                                 }";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"]          = "[ 'divisi|relasi_nomor' ]";
// $j                                                              = 0;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'divisi'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'divisi'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{ dataInit:autocomplete_divisi }";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'keterangan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'keterangan'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_tipe'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_tipe'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'relasi_table'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'relasi_table'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]      = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"]      = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]        = "true";
// $j++;
// $i++;

if ($edit["mode"] != "add") {
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
    SELECT a.*,
    CONCAT(b.kode,' - ',b.nama) AS cabang,
    CONCAT('[', c.kode, '] ', c.nama) AS usaha
    FROM " . $edit["detail"][0]["table_name"] . " a
    JOIN mhcabang b ON a.relasi_nomor = b.nomor AND b.status_aktif > 0
    LEFT JOIN mhusaha c ON c.nomor = a.nomormhusaha
    WHERE a.status_aktif > 0
    AND a.relasi_tipe = 'master_cabang'
    AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
    SELECT a.*,
    CONCAT('[', b.kode, '] ', b.nama) AS gudang,
    CONCAT('[', c.kode, '] ', c.nama) AS cabang,    
    CONCAT('[', d.kode, '] ', d.nama) AS usaha
    FROM " . $edit["detail"][1]["table_name"] . " a
    JOIN mhgudang b ON a.relasi_nomor = b.nomor AND b.status_aktif > 0
    LEFT JOIN mhcabang c ON b.nomormhcabang = c.nomor AND c.status_aktif > 0
    LEFT JOIN mhusaha d ON d.nomor = a.nomormhusaha
    WHERE a.status_aktif > 0
    AND a.relasi_tipe = 'master_gudang'
    AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];
    
    $edit["field"][$grid[2]]["grid_set"]["query"] = "
    SELECT a.*,
    b.nama admin_group,
    CONCAT('[', d.kode, '] ', d.nama) AS usaha
    FROM " . $edit["detail"][2]["table_name"] . " a
    JOIN mhadmingrup b ON a.relasi_nomor = b.nomor AND b.status_aktif > 0
    LEFT JOIN mhusaha d ON d.nomor = a.nomormhusaha
    WHERE a.status_aktif > 0
    AND a.relasi_tipe = 'master_group'
    AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[3]]["grid_set"]["query"] = "
    SELECT a.*,
    b.nama peran,
    CONCAT('[', d.kode, '] ', d.nama) AS usaha
    FROM " . $edit["detail"][3]["table_name"] . " a
    JOIN mhperan b ON a.relasi_nomor = b.nomor AND b.status_aktif > 0
    LEFT JOIN mhusaha d ON d.nomor = a.nomormhusaha
    WHERE a.status_aktif > 0
    AND a.relasi_tipe = 'master_peran'
    AND a." . $edit["detail"][3]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[4]]["grid_set"]["query"] = "
    SELECT a.*,
    CONCAT(b.kode,' - ',b.nama) AS account
    FROM " . $edit["detail"][4]["table_name"] . " a
    JOIN mhaccount b ON a.relasi_nomor = b.nomor AND b.status_aktif > 0
    WHERE a.status_aktif > 0
    AND a.relasi_tipe = 'master_account'
    AND a." . $edit["detail"][4]["foreign_key"] . " = " . $_GET["no"];
    
    // $edit["field"][$grid[5]]["grid_set"]["query"] = "
    // SELECT a.*,
    // b.nama AS divisi
    // FROM " . $edit["detail"][5]["table_name"] . " a
    // JOIN mhdivisi b ON a.relasi_nomor = b.nomor AND b.status_aktif > 0
    // WHERE a.status_aktif > 0
    // AND a.relasi_tipe = 'master_divisi'
    // AND a." . $edit["detail"][5]["foreign_key"] . " = " . $_GET["no"];
    
    $edit = fill_value($edit, $r);
}
$edit_navbutton = generate_navbutton($edit_navbutton);

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
?>
<script language="javascript" type="text/javascript">
function checkHeader()
{
    var fields = [
        "nama|Nama",
        "kode|Username",
        "browse_master_admin_grup_hidden|Admin Grup",
        "browse_master_cabang_hidden|Cabang"
    ];
    var check_failed = check_value_elements(fields);
    if(check_failed != '')
        return check_failed;
    else
        return true;
}
<?= generate_function_checkgrid($grid_str) ?>
<?= generate_function_checkunique($grid_str) ?>
<?= generate_function_realgrid($grid_str) ?>
</script>