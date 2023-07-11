<?php // watched
$browse["id"]               = "master_barang_customer_cylinder";
$browse["caption"]          = "Browse Barang Customer";
$browse["query"]            = " SELECT
                                    a.*, a.kode_custom as kode,
                                    a.width AS width,
                                    a.height AS height,
                                    a.nomor_md AS nomor_md,
                                    a.nama_barang_customer as nama_barang_customer,
                                    a.up_cilinder AS up,
                                    a.kepemilikan,
                                    a.sisi_cetak,
                                    (
                                        SELECT
                                            GROUP_CONCAT(
                                                DISTINCT CONCAT(
                                                    c.proses
                                                ) SEPARATOR ' / '
                                            )
                                            FROM tdbarangcustomer c
                                            WHERE c.nomorthbarang=a.nomor AND c.status_aktif > 0 
                                            ORDER BY c.nomor ASC
                                    ) AS proses_cilinder, 
                                    c.nomor as nomormhrelasi,
                                    c.nama as nama_customer,
                                    c.kode_alias as alias_customer,
                                    FORMAT(a.gramasi, 2) as gramasi
                                FROM
                                    thbarang a
                                JOIN mhrelasi c on c.nomor = a.nomormhrelasi
                                    WHERE a.status_aktif = 1 ? ";
$browse["query_order"]      = "a.kode";
$browse["query_search"]     = array(
    "a.kode",
    "a.nama_barang_customer",
    "a.nama_alias",
    "c.kode_alias"
);
$browse["param_input"]      = array();
$browse["param_output"]     = array();
$browse["items"]            = array(
    "nomor||true",
    "kode",
    "alias_customer||true",
    "gramasi||true",
    "nama_barang_customer|Barang",
    "width||true",
    "height||true",
    "up||true",
    "kepemilikan||true",
    "sisi_cetak||true",
    "proses_cilinder||true",
    "kode_cilinder||true",
    "nama_customer||true",
    "nomormhrelasi||true",
    "nomor_md||true",
    "nama_alias||true",
    "tahapan_proses||true"

);
$browse["items_visible"]    = array(
    "alias_customer", "nama_alias", "gramasi", "nama_barang_customer"
);
$browse["items_selected"]   = array(
    "alias_customer", "nama_alias", "gramasi", "nama_barang_customer"
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
