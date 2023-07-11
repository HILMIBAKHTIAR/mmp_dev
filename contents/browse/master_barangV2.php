<?php // watched
$browse["id"]               = "master_barangV2";
$browse["caption"]          = "Browse Barang V2";
$browse["query"]            = " SELECT
                                a.*,
                                m.nama as customer
                                FROM
                                thbarang a
                                join mhrelasi m on m.nomor = a.nomormhrelasi 
                                WHERE
                                a.status_aktif = 1 and m.nomormhrelasikelompok = 1 ?";

$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor",
    "a.barang"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array(    

);
$browse["items"]            = array(
    "nomor||true",
    "kode",
    "nama_barang_customer",
    "nomormhrelasi||true",
    "customer||true",
    "lebar||true",
    "panjang||true",
    "up||true",

);
$browse["items_visible"]    = array(
    "nomor",
    "barang"
);
$browse["items_selected"]   = array(
    "nama_barang_customer",
    "kode"
);
$browse["selected_url"]     = "?m=master_barang&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_barang&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
