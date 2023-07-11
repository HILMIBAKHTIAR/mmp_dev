<?php // watched
$browse["id"]               = "permintaan_barang_teknik";
$browse["caption"]          = "Browse Permintaan Barang Teknik";
$browse["query"]            = "SELECT
                                    a.*
                                FROM
                                thbelipermintaanteknik a
                                WHERE
                                a.status_aktif = 1 ?";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor",
    "a.kode"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "kode"
);
$browse["items_visible"]    = array(
    "nomor",
    "kode"
);
$browse["items_selected"]   = array(
    "kode"
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
