<?php // watched
$browse["id"]               = "master_tipe";
$browse["caption"]          = "Browse Tipe";
$browse["query"]            = "SELECT
                                    a.*
                                FROM
                                mdbarangtipe a
                                join mhbarangjenis b on b.nomor = a.nomormhbarangjenis 
                                where a.status_aktif > 0 and a.is_film = 1 ?
                                ";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "tipe"
);
$browse["items_visible"]    = array(
    "tipe"
);
$browse["items_selected"]   = array(
    "tipe"
);
$browse["selected_url"]     = "?m=master_tipe&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_tipe&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
?>
