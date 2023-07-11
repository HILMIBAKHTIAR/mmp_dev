<?php // watched
$browse["id"]               = "master_jenis";
$browse["caption"]          = "Browse Jenis";
$browse["query"]            = "SELECT
                                    a.*
                                FROM
                                mdbarangjenis a
                                join mhbarangjenis b on b.nomor = a.nomormhbarangjenis 
                                where a.status_aktif > 0
                                ";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "jenis"
);
$browse["items_visible"]    = array(
    "jenis"
);
$browse["items_selected"]   = array(
    "jenis"
);
$browse["selected_url"]     = "?m=master_jenis&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_jenis&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
?>
