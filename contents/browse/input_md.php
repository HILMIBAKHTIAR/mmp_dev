<?php // watched
$browse["id"]               = "input_md";
$browse["caption"]          = "Browse No MD";
$browse["query"]            = " SELECT a.*
                                            FROM
                                            thinputmd a
                                            WHERE a.status_aktif = 1 ?";
$browse["query_order"]      = "a.nomor desc";
$browse["query_search"]     = array(
    "a.no_md"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "no_md"

);
$browse["items_visible"]    = array(
    "no_md"
);
$browse["items_selected"]   = array(
    "no_md"
);
$browse["selected_url"]     = "?m=master_barangV2&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_barangV2&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
