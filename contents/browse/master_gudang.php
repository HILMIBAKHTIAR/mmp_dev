<?php // watched
$browse["id"]               = "master_gudang";
$browse["caption"]          = "Browse Satuan Berat Gudang";
$browse["query"]            = "SELECT
                                    a.*
                                FROM
                                mhgudang a
                                WHERE
                                a.status_aktif = 1 ?";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor",
    "a.nama"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "nama|Nama"
);
$browse["items_visible"]    = array(
    "nama"
);
$browse["items_selected"]   = array(
    "nama"
);
$browse["selected_url"]     = "?m=master_gudang_data&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_gudang_data&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
?>
