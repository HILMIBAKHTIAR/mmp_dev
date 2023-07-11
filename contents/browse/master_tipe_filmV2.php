<?php // watched
$browse["id"]               = "master_tipe_filmV2";
$browse["caption"]          = "Browse Tipe Film V2";
$browse["query"]            = "SELECT a.*
                                FROM
                                mdbarangtipe a
                                JOIN mhbarangjenis b ON b.nomor = a.nomormhbarangjenis and b.status_aktif = 1
                                WHERE a.is_film = 1 and
                                a.status_aktif = 1
                                and a.tipe IN ('POLYPROPYLENE','ALU','CPP','LITHO','LLDPE','NYLON','OPP','PET','POLYTHYLENE','VMCPP','VMPET') 
                                ?";
$browse["query_order"]      = "a.nomor";
$browse["query_search"]     = array(
    "a.nomor",
    "a.tipe"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "tipe|Tipe"
);
$browse["items_visible"]    = array(
    "tipe"
);
$browse["items_selected"]   = array(
    "tipe"
);
$browse["selected_url"]     = "?m=master_jenis_film&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_jenis_film&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
