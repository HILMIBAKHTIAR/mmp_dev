<?php // watched
$browse["id"]               = "master_supplier_silinder";
$browse["caption"]          = "Browse Relasi Silinder";
$browse["query"]            = "SELECT
                                    a.*
                                FROM
                                mhrelasi a
                                WHERE
                                a.status_aktif = 1 and a.nomormhrelasikelompok = 2 ?
                                ";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor",
    "a.nama",
    "top"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "nama|Nama",
    "is_external||true",
	"top||true",
    "ppn||true",
    "ppn_prosentase||true",
	"top_terhitung||true",
    "email||true"
);
$browse["items_visible"]    = array(
    // "nomor",
    "nama",
    // "top"
);
$browse["items_selected"]   = array(
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
