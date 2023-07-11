<?php // watched
$browse["id"]               = "master_barang_customerV2";
$browse["caption"]          = "Browse Barang Customer";
$browse["query"]            = " SELECT
                                            a.*, kode_custom as kode,
                                            a.width AS width,
                                            a.height AS height,
                                            a.up_cilinder as up,
                                            b.kode_alias,
                                            CONCAT(b.kode_alias, '-', a.nama, '-', CAST(a.ukuran_barang_jadi AS UNSIGNED)) AS test
                                            FROM
                                            thbarang a
                                            JOIN mhrelasi b on b.nomor = a.nomormhrelasi
                                            WHERE a.status_aktif = 1 and b.nomormhrelasikelompok = 1 ?
                                    
?";
$browse["query_order"]      = "a.kode";
$browse["query_search"]     = array(
    "a.kode",
    "a.nama"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "kode",
    "nama|Barang",
    "width||true",
    "height||true",
    "up||true",
    "proses_cilinder||true",
    "kode_cilinder||true",
    "kode_alias||true",
    "ukuran_barang_jadi||true",
    "test||true"

);
$browse["items_visible"]    = array(
    "test"
);
$browse["items_selected"]   = array(
    "test"
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
