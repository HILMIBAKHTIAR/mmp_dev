<?php // watched
$browse["id"]               = "master_barang_customer";
$browse["caption"]          = "Browse Barang Customer";
$browse["query"]            = " SELECT
                                    a.*, a.kode_custom as kode,
                                    a.width AS width,
                                    a.height AS height,
                                    a.up_cilinder AS up,
                                    c.nomor as nomormhrelasi,
                                    c.nama as nama_customer,
                                    CASE
                                        WHEN a.kepemilikan = 0 THEN 'mmp'
                                        ELSE 'customer'
                                    END AS kepemilikan_label,
                                    CASE
                                        WHEN CASE
                                                WHEN a.kepemilikan = 0 THEN 'mmp'
                                                ELSE 'customer'
                                            END = 'mmp' THEN 1
                                        WHEN CASE
                                                WHEN a.kepemilikan = 0 THEN 'mmp'
                                                ELSE 'customer'
                                            END = 'customer' THEN 0
                                        ELSE NULL
                                    END AS mmp,
                                    CASE
                                        WHEN CASE
                                                WHEN a.kepemilikan = 1 THEN 'customer'
                                                ELSE 'mmp'
                                            END = 'customer' THEN 1
                                        WHEN CASE
                                                WHEN a.kepemilikan = 1 THEN 'customer'
                                                ELSE 'mmp'
                                            END = 'mmp' THEN 0
                                        ELSE NULL
                                    END AS customer,
                                    CASE
                                        WHEN a.sisi_cetak = 0 THEN 'surface'
                                        ELSE 'reverse'
                                    END AS sisi_cetak,
                                    CASE
                                        WHEN CASE
                                                WHEN a.sisi_cetak = 0 THEN 'surface'
                                                ELSE 'reverse'
                                            END = 'surface' THEN 1
                                        WHEN CASE
                                                WHEN a.sisi_cetak = 0 THEN 'surface'
                                                ELSE 'reverse'
                                            END = 'reverse' THEN 0
                                        ELSE NULL
                                    END AS surface,
                                    CASE
                                        WHEN CASE
                                                WHEN a.sisi_cetak = 1 THEN 'reverse'
                                                ELSE 'surface'
                                            END = 'reverse' THEN 1
                                        WHEN CASE
                                                WHEN a.sisi_cetak = 1 THEN 'reverse'
                                                ELSE 'surface'
                                            END = 'surface' THEN 0
                                        ELSE NULL
                                    END AS reverse
                                FROM
                                    thbarang a
                                JOIN mhrelasi c on c.nomor = a.nomormhrelasi
                                    WHERE a.status_aktif = 1 ? ";
$browse["query_order"]      = "a.kode_custom";
$browse["query_search"]     = array(
    "a.kode_custom",
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
    "mmp||true",
    "nama_customer||true",
    "nomormhrelasi||true",
    "surface||true",
    "reverse||true"

);
$browse["items_visible"]    = array(
    "nama"
);
$browse["items_selected"]   = array(
    "nama"
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
