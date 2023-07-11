<?php
$browse["id"]               = "master_barang_subkategori";
$browse["caption"]          = "Browse Barang Kategori";
$browse["query"]            = "SELECT
                                            a.*,
                                            b.`nama` AS grup
                                            FROM
                                            mhbarangsubkategori a
                                            JOIN mhgrupteknik b
                                            ON b.nomor = a.`nomormhgrupteknik`
                                            WHERE a.status_aktif = 1
                                            ";

$browse["query_order"] 		= " a.nama";
$browse["query_search"] 	= array("a.nama");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "nama", "grup");
$browse["items_visible"]	= array("nama");
$browse["items_selected"]	= array("nama");
$browse["selected_url"]     = "?m=master_barang_subkategori&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"]          = "?m=master_barang_subkategori&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;

