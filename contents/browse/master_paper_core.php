<?php // watched
$browse["id"]               = "master_paper_core";
$browse["caption"]          = "Browse Paper Core";
$browse["query"]            = "SELECT
                                    a.*
                                FROM
                                mhpapercore a
                                WHERE
                                    a.status_aktif = 1 ?";
$browse["query_order"]      = "a.diameter";
$browse["query_search"]     = array(
    "a.diameter"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "nama",
    "diameter"
);
$browse["items_visible"]    = array(
    "diameter"
);
$browse["items_selected"]   = array(
    "nama"
);
$browse["selected_url"]     = "?m=master_paper_core&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_paper_core&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
?>
