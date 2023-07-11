<?php
$browse["id"] 				= "master_satuan";
$browse["caption"] 			= "Browse satuan";
$browse["query"] 			= " SELECT a.*,
									a.nama,
									a.kode
								FROM mhsatuan a
								WHERE a.status_aktif = 1";
$browse["query_order"] 		= " a.nama";
$browse["query_search"] 	= array("a.nama");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "nama", "kode");
$browse["items_visible"]	= array("nama", "kode");
$browse["items_selected"]	= array("nama");
$browse["selected_url"] 	= "?m=master_satuan&f=header_grid&&sm=edit&a=view&no=";
$browse["new_url"] 			= "?m=master_satuan&f=header_grid&&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
