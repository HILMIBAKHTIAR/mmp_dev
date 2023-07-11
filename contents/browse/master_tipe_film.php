<?php // watched
$browse["id"]               = "master_tipe_film";
$browse["caption"]          = "Browse Tipe Film";
$browse["query"]            = "SELECT
                                    a.*
                                FROM
                                mhbarangjenis a
                                WHERE
                                a.status_aktif = 1 ?";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor",
    "a.tipe"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "tipe|Tipe"
);
$browse["items_visible"]    = array(
    "nomor",
    "tipe"
);
$browse["items_selected"]   = array(
    "tipe"
);
$browse["selected_url"]     = "?m=master_tipe_film_data&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_tipe_film_data&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
?>
