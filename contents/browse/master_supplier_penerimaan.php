<?php // watched
$browse["id"]               = "master_supplier_penerimaan";
$browse["caption"]          = "Browse Relasi";
$browse["query"]            = "SELECT
                                    a.*
                                FROM
                                mhrelasi a
                                WHERE
                                a.status_aktif = 1 and a.nomormhrelasikelompok = 2";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor",
    "a.nama"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "nama",
    "kode",
    "nomor_sj||true"
);
$browse["items_visible"]    = array(
    "kode",
    "nama"
);
$browse["items_selected"]   = array(
    "kode",
    "nama"
);
$browse["selected_url"]     = "?m=master_relasi_data&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_relasi_data&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
?>
