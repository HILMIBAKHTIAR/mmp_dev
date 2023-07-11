<?php
$browse["id"] 				= "permintaan_analisa_sample";
$browse["caption"] 			= "Browse Permintaan Analisa Sampel";
$browse["query"] 			= "SELECT
a.*, 
a.nomor AS nomor,
b.kode AS kodepas,
c.nama as jenispackaging,
b.customer_analisa as customer 
FROM tdpermintaananalisasample a
LEFT JOIN thpermintaananalisasample b ON a.nomorthpermintaananalisasample = b.nomor
JOIN mhjenispackaging c on a.nomormhjenispackaging = c.nomor
WHERE a.status_aktif = 1 AND b.`status_aktif`= 1 ?
									";
$browse["query_order"] 		= "a.nomor DESC";
$browse["query_search"] 	= array("a.produk");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "kodepas", "produk", "jenispackaging", "customer", "nomormhjenispackaging||true");
$browse["items_visible"]	= array("kodepas", "produk");
$browse["items_selected"]	= array("kodepas", "produk");
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
