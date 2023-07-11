<?php
$browse["id"] 				= "customer_spesifikasi_produk";
$browse["caption"] 			= "Browse Spesifikasi Produk";
$browse["query"] 			= "
	SELECT
		(
			
		) 
FROM thspesifikasiproduk a
WHERE a.status_disetujui = 1 ?
									";
$browse["query_order"] 		= "a.nomor DESC";
$browse["query_search"] 	= array("a.customer");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "customer");
$browse["items_visible"]	= array("customer");
$browse["items_selected"]	= array("customer");
$browse["selected_url"] 	= "";
$browse["new_url"] 			= "";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
