<?php // watched
$browse["id"]               = "master_barang";
$browse["caption"]          = "Browse Barang";
$browse["query"]            = "SELECT
                                    a.*,
                                    m2.nama as proses,
                                    'kode silinder' as kode_silinder,
                                    10 as nomor_md,
                                    'manufacturer' as manufacturer
                                FROM
                                mhbarang a
                                left join mhproses m2 on m2.nomor = a.nomormhproses 
                                WHERE
                                a.status_aktif = 1 ?";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor",
    "a.nama"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array(    
    "proses",
    "kode_silinder",
    "nomor_md",
    "manufacturer"
);
$browse["items"]            = array(
    "nomor||true",
    "kode|Kode",
    "nama|Nama",
    "proses||true",
    "kode_silinder||true",
    "nomor_md||true",
    "manufacturer||true"

);
$browse["items_visible"]    = array(
    "nomor",
    "nama"
);
$browse["items_selected"]   = array(
    "nama"
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
?>
