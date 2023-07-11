<?php // watched
$browse["id"]               = "master_barangV3";
$browse["caption"]          = "Browse Barang V3";
$browse["query"]            = " SELECT
                                a.*,
                                e.nama as satuan,
                                e.nomor as nomormhsatuan,
                                COALESCE(CONCAT(d.nama_barang_customer), CONCAT(a.nama)) AS barang
                                FROM
                                mhbarang a
                                LEFT JOIN thbarang d ON d.nomor = a.nomormhcilinder 
                                left join mhsatuan e on e.nomor = a.nomormhsatuan
                                WHERE
                                a.status_aktif = 1 ?";

$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array(    

);
$browse["items"]            = array(
    "nomor||true",
    "satuan||true",
    "nomormhsatuan||true",
    "kode",
    "barang"

);
$browse["items_visible"]    = array(
    "nomor",
    "barang"
);
$browse["items_selected"]   = array(
    "barang",
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
