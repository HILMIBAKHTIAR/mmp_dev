<?php // watched
$browse["id"]               = "master_alamat_pengiriman";
$browse["caption"]          = "Browse Alamat Pengiriman";
$browse["query"]            = " SELECT
                                a.*
                                FROM
                                mdrelasialamat a
                                join mhrelasi m on m.nomor = a.nomormhrelasi and m.status_aktif = 1
                                WHERE
                                a.status_aktif = 1 and m.nomormhrelasikelompok = 1 ? ";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.alamat"
);
$browse["param_input"] 		= array("m.nomor|nomor");
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "alamat"
);
$browse["items_visible"]    = array(
    "alamat"
);
$browse["items_selected"]   = array(
    "alamat"
);
$browse["selected_url"]     = "?m=master_customer&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_customer&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
