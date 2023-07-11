<?php // watched
$browse["id"]               = "master_customer_spesifikasi_produk";
$browse["caption"]          = "Browse Customer";
$browse["query"]            = " SELECT
                                a.*,
                                b.kode as kodegelar
                                FROM
                                thpermintaananalisasample b
                                join mhrelasi a on a.nomor = b.nomormhrelasi
                                WHERE b.status_aktif = 1 and 
                                a.status_aktif = 1 and a.nomormhrelasikelompok = 1 ? ";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor",
    "a.nama"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "nama"
);
$browse["items_visible"]    = array(
    "nama"
);
$browse["items_selected"]   = array(
    "nama"
);
$browse["selected_url"]     = "?m=master_customer_data&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_customer_data&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
