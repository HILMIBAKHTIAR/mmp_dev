<?php // watched
$browse["id"]               = "master_jenis";
$browse["caption"]          = "Browse Jenis";
$browse["query"]            = "SELECT
                                    a.*,
                                a.supplier_sj_nomor,
                                b.nama as supplier,
                                DATE_FORMAT(a.dibuat_pada,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_kedatangan
                                FROM
                                thbelinota a
                                join mhrelasi b on a.nomormhrelasi = b.nomor
                                where a.status_aktif > 0
                                ";
$browse["query_order"]      = "a.kode";
$browse["query_search"]     = array(
    "a.kode",
    "a.supplier_sj_nomor"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "supplier_sj_nomor|SJ",
    "supplier",
    "tanggal_kedatangan|tanggal kedatangan barang"
);
$browse["items_visible"]    = array(
    "supplier_sj_nomor"
);
$browse["items_selected"]   = array(
    "supplier_sj_nomor"
);
$browse["selected_url"]     = "?m=penerimaan_barang&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=penerimaan_barang&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"]             = "";
$browse["grid_editing"]     = "";
$browse["grid_val"]         = "";
$browse["grid_values"]      = array();
$browse["call_function"]    = "";
$browse["custom_function"]  = "";
$browse["debug"]            = 1;
