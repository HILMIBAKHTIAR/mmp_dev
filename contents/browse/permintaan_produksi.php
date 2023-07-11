<?php // watched
$browse["id"]               = "permintaan_produksi";
$browse["caption"]          = "Browse Permintaan Produksi";
$browse["query"]            = " SELECT
                                    a.*
                                    from thpermintaanbarang a
                                WHERE
                                a.status_aktif = 1 ?
                                     ";
$browse["query_order"]      = "a.kode";
$browse["query_search"]     = array(
    "a.kode"
);
$browse["param_input"] 		= array();
$browse["param_output"]     = array(); 
$browse["items"]            = array( 
    "nomor||true",
    "kode|Kode",
    "kategori|Kategori"
);
$browse["items_visible"]    = array(
    "nomor",
    "kategori"
);
$browse["items_selected"]   = array(
    "kode"
);
$browse["selected_url"]     = "?m=permintaan_produksi&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=permintaan_produksi&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
?>
