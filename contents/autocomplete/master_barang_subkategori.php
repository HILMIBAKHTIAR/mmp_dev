<?php // watched
$browse["id"]               = "master_barang_subkategori";
$browse["caption"]          = "Browse Barang Kategori";
$browse["query"]            = "SELECT
                                    a.*
                                FROM
                                mhbarangsubkategori a
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
    "nomor|Nomor",
    "nama|Nama"
);
$browse["items_visible"]    = array(
    "nomor",
    "nama"
);
$browse["items_selected"]   = array(
    "nomor",
    "nama"
);
$browse["selected_url"]     = "?m=master_barang_subkategori&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_barang_subkategori&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$acomplete["param_input"] = array();
$browse["debug"]            = 1;
?>
