<?php
$browse["id"] 				= "permintaan_analisa_sample_penawaranharga";
$browse["caption"] 			= "Browse Permintaan Analisa Sampel";
$browse["query"] 			= "SELECT
a.*, 
a.nomor AS nomor,
a.customer_analisa as customer
FROM thpermintaananalisasample a
WHERE a.status_aktif = 1 ?
									";
$browse["query_order"] 		= "a.nomor DESC";
$browse["query_search"] 	= array("a.kode");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "kode", "customer");
$browse["items_visible"]	= array("kode", "customer");
$browse["items_selected"]	= array("kode", "customer");
$browse["selected_url"] 	= "?m=permintaan_analisa_sample&f=header_grid&&sm=edit&a=view&no=";
$browse["new_url"] 			= "?m=permintaan_analisa_sample&f=header_grid&&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
