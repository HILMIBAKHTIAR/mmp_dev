<?php // watched
$browse["id"]               = "master_customer_po";
$browse["caption"]          = "Browse Customer";
$browse["query"]            = " SELECT
                                                a.*,
                                                c.`alamat` AS delivery,
                                                d.nama AS valuta,
                                                e.nama AS top
                                                FROM
                                                mhrelasi a
                                                JOIN mhgelar b
                                                ON a.nomormhgelar = b.nomor
                                                LEFT JOIN mdrelasialamat c ON a.`nomor` = c.`nomormhrelasi` AND jenis = 2
                                                JOIN mhvaluta d ON a.`nomormhvaluta` =  d.nomor
                                                JOIN mhtop e ON a.`nomormhtop` = e.`nomor`
                                                WHERE a.status_aktif = 1
                                                AND a.nomormhrelasikelompok = 1
                                 ? ";
$browse["query_order"]      = "a.nama";
$browse["query_search"]     = array(
    "a.kode",
    "a.nama"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "delivery||true",
    "kode",
    "nama",
    "top",
    "valuta",
    "nomormhvaluta||true",
    "nomormhtop||true"
);
$browse["items_visible"]    = array(
    "kode",
    "nama"
);
$browse["items_selected"]   = array(
    "kode",
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
