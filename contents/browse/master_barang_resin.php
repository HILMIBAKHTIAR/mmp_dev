<?php // watched
$browse["id"]               = "master_barang_resin";
$browse["caption"]          = "Browse Barang";
$browse["query"]            = "SELECT
                                    a.*
                                FROM
                                mhbarang a
                                WHERE a.nomormhbarangkelompok = 1
                                and a.nomormhbarangkategori = 4
                                and a.status_aktif = 1 ?";
$browse["query_order"]      = "a.kode";
$browse["query_search"]     = array(
    "a.kode",
    "a.nama"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "kode|Kode",
    "nama|Nama"

);
$browse["items_visible"]    = array(
    "kode",
    "nama"
);
$browse["items_selected"]   = array(
    "nama"
);
$browse["selected_url"]     = "?m=master_bahan_baku_film&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_bahan_baku_film&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
